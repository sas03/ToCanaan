# -*- coding: utf-8 -*-
import nltk
import re
import numpy

from gensim.models import TfidfModel
from gensim.corpora import Dictionary

import spacy
nlp = spacy.load('fr_core_news_md')
from spacy.lang.fr.stop_words import STOP_WORDS

from nltk.tokenize import sent_tokenize, word_tokenize
from nltk.probability import FreqDist
from nltk.corpus import wordnet as wn
from nltk.stem import WordNetLemmatizer as lm
from nltk import RegexpTokenizer
from database import *
from collections import Counter, defaultdict

STOP_WORDS = (u"""à alors au aucun aussi autre avant avec avoir bon car ce cela ces ceux chaque ci comme comment d' dans de des du dedans dehors depuis devrait doit donc dos début elle elles en encore essai est et eu fait faites fois font hors ici il ils je juste l' la
voient vont votre vous vu ça étaient état étions été être""").split()

def preprocessingText(text):
        sentence = nlp(text)
        return [token.lemma_ for token in sentence if token.lemma_ not in STOP_WORDS and token.lemma_.isalpha()]

def getNotImportantTokens(careersCorpus, jobsCorpus):
        careerPostFilter, jobPostFilter = [], []
        dictionary = Dictionary([careersCorpus, jobsCorpus])
        corpus = [dictionary.doc2bow(line) for line in [careersCorpus, jobsCorpus]]
        tfidf = TfidfModel(corpus)
        careersVector = tfidf[corpus[0]]
        jobsVector = tfidf[corpus[1]]
        sorted_careersVector = sorted(careersVector, key=lambda w: w[1], reverse=True)
        sorted_jobsVector = sorted(jobsVector, key=lambda w: w[1], reverse=True)
        for word_id, word_count in sorted_careersVector[:30]:
            careerPostFilter.append(dictionary.get(word_id))
        for word_id, word_count in sorted_jobsVector[:30]:
                jobPostFilter.append(dictionary.get(word_id))
        return careerPostFilter, jobPostFilter

def getSimilarityScore(career, jobs):
        careerToken = nlp(career)
        y = [token.lemma_ for token in careerToken if token.lemma_ not in STOP_WORDS and token.lemma_.isalpha()]
        careerToken = nlp(u" ".join(y))
        results = []
        for job in jobs :
                tokens = nlp(job[0])
                y = [token.lemma_ for token in tokens if token.lemma_ not in STOP_WORDS and token.lemma_.isalpha()]
                token = nlp(u" ".join(y))
                x = careerToken.similarity(token)
                if x is not None:
                        if len(results) < 10:
                                results.append({"score": x, 'token':token, 'careerToken': careerToken, 'job': job[0], 'jobId': job[1]})
                        if x > min([result['score'] for result in results]):
                                results[-1] = {"score": x, 'token':token, 'careerToken': careerToken, 'job': job[0], 'jobId': job[1]}
                        results.sort(key=lambda x: x["score"], reverse=True)
        print('results')
        print(results)
        return results

def normalizeSimilary(results, careerPostFilter, jobPostFilter):
        normalizedByJob= []
        normalizedByCareer = []
        for result in results:
                token = [token.lemma_ for token in result['token'] if token.lemma_ not in jobPostFilter]
                if len(token) > 0:
                        result['token'] = nlp(u" ".join(token))
                        x = result['careerToken'].similarity(result['token'])
                        if x is not None:
                                normalizedByJob.append({result['token']: x})
        for result in results:
                token = [token.lemma_ for token in result['careerToken'] if token.lemma_ not in careerPostFilter]
                if len(token) > 0:
                        result['careerToken'] = nlp(u" ".join(token))
                        x = result['careerToken'].similarity(result['token'])
                        if x is not None:
                                normalizedByJob.append({result['token']: x})
        for result in results:
                token = [token.lemma_ for token in result['careerToken'] if token.lemma_ not in careerPostFilter]
                if len(token) > 0:
                        result['careerToken'] = nlp(u" ".join(token))
                        x = result['careerToken'].similarity(result['token'])
                        if x is not None:
                                normalizedByCareer.append({result['token']: x})
        print(normalizedByCareer, normalizedByJob)
        for result in results:
            result["score"] = result["score"] + normalizedByCareer[result['token']] + normalizedByJob[result['token']] / 3
        return results.sort(key=lambda x: x["score"], reverse=True)

def getFinestMatch(results, jobPostFilter):
        finalResults = []
        for result in results:
                token = [token.lemma_ for token in result['token'] if token.lemma_ not in jobPostFilter]
                if len(token) > 0:
                        result['token'] = nlp(u" ".join(token))
                        x = result['careerToken'].similarity(result['token'])
                        if x is not None:
                                finalResults.append({"score": x, 'token':result['token'], 'careerToken': result['careerToken'], 'job': result['job'], 'jobId': result['jobId']})
        finalResults.sort(key=lambda x: x["score"], reverse=True)
        return finalResults[0]['job'], finalResults[0]['jobId']

def initDataset():
        jobs = []
        careers = []
        jobsText = ""
        careersText = ""

        cur.execute("SELECT nom, id FROM metiers")
        jobsDict = cur.fetchall()
        for jobDict in jobsDict:
                jobs.append([jobDict['nom'], jobDict['id']])
                jobsText += " " + jobDict['nom']
                print(jobDict['nom'])
                cur.execute("SELECT title FROM careerDirectJobs")
                careersDict = cur.fetchall()
        for careerDict in careersDict:
                careers.append(careerDict['title'])
                careersText += " " + careerDict['title']

        careersCorpus = preprocessingText(careersText)
        jobsCorpus = preprocessingText(jobsText)
        careerPostFilter, jobPostFilter = getNotImportantTokens (careersCorpus, jobsCorpus)
        return [jobs,jobsText, careers, careersText, careerPostFilter, jobPostFilter]

def insertNewCareer(career, jobs, jobPostFilter):
        results = getSimilarityScore(career, jobs)
        finalResult = getFinestMatch(results, jobPostFilter)
        print(finalResult, career)
        #cur.execute("INSERT INTO careerDirectJobs SET similarity = %s, similarityId = %s ON DUPLICATE KEY UPDATE similarity=VALUES(similarity) WHERE title = %s", [finalResult[0], finalResult[1], career])

def insertAllDB():
        jobs,jobsText, careers, careersText, careerPostFilter, jobPostFilter = initDataset()
        for career in careers:
                insertNewCareer(career, jobs, [])

insertAllDB()
""" HOW TO USE""""""
from similarityDataset import *

For new db item
jobs, jobsText, careers, careersText, careerPostFilter, jobPostFilter = initDataset()
insertNewCareer(career, jobs, jobPostFilter)

For all db
insertAllDB()
"""
