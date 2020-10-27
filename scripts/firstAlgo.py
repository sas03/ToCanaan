# -*- coding: utf-8 -*-
import nltk
nltk.download('punkt')
nltk.download('stopwords')
nltk.download('wordnet')
import re
import numpy
from matplotlib import pyplot as plt
from pylab import *

from nltk.tokenize import sent_tokenize, word_tokenize
from nltk.probability import FreqDist
from nltk.corpus import wordnet as wn
from nltk.stem import WordNetLemmatizer
from nltk import RegexpTokenizer
from database import *
from nltk.stem.porter import *

lemmatizer = WordNetLemmatizer()
stemmer = PorterStemmer()

cur.execute("SELECT nom FROM metiers")
jobs = cur.fetchall()

def tokenizeCorpus(text):
        return word_tokenize(text,language='french')
def filterCorpus(text):
        stopwords = nltk.corpus.stopwords.words('french')
        return [w for w in text if w.lower() not in stopwords]

def lemma(arr):
        output = []
        for el in arr:
                output.append(stemmer.stem(lemmatizer.lemmatize(el)))
        return output

def getClosestJob(sentence):
        bagOfWords = lemma(filterCorpus(sentence))
        print(bagOfWords)
        output = {"name": "name", "weight": 0}
        outputArray = []
        counts = {}
        for job in jobs:
                jobArray = lemma(filterCorpus(tokenizeCorpus(job['nom'].lower())))
                for w in jobArray:
                        if w not in counts:
                                counts[w] = 0
                        counts[w] += 1
        for job in jobs:
                weight = 0
                jobArray = lemma(filterCorpus(tokenizeCorpus(job['nom'].lower())))
                for eli in jobArray:
                        for elj in bagOfWords:
                                if eli == elj:
                                        weight += 1 / (float(counts[eli]) * max(len(jobArray), len(bagOfWords)))
                if weight > output["weight"]:
                        output["weight"] = weight
                        output["name"] = job['nom']
                t = (job['nom'], weight)
                outputArray.append(t)
        outputArray = sorted(outputArray, key=lambda x: x[1])
        if(len(outputArray) > 0):
                 print(outputArray[len(outputArray) - 1])

jobList = ["formateurs"]
#jobList = ["Guide touristique"]
#jobList = ["Enseignants en communication, enseignement supérieur"]
#jobList = ["Danseurs"]
#jobList = ["Éditeurs"]
#jobList = ["Reporters et correspondants"]
#jobList = ["Guides touristiques", "Forces spéciales", "Troupes d'infanterie", "Officiers d'infanterie", "Pompiers"]
#jobList = ["Sous-titreur", "Secrétaires de direction et assistants administratifs", "Assistants des ressources humaines", "à l'exception de la gestion des salaires et de la gestion des horaires", "Agents administratifs du service des polices d'assurance"]
for item in jobList:
        getClosestJob(tokenizeCorpus(item.lower()))
        #getClosestJob(tokenizeCorpus(item.decode(encoding='UTF-8',errors='strict').lower()))
