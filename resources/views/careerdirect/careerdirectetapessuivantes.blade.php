{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          Career Direct® – Etapes
        @else
          Profil de {{ ucfirst($user->prenom) }} {{mb_strtoupper($user->nom) }}
        @endif
        </h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Principe Fondamentaux</h4>

        <ul class="card-text">
          <p><?php echo $documents[126]->nodeValue, PHP_EOL ?></p>
          <p><?php echo $documents[127]->nodeValue, PHP_EOL ?></p>
          <ul>
          <li>• Vous avez un dessein unique qui ne peut être ignoré. Embrasser votre dessein est primordial afin de découvrir l’objectif de votre vie. Ignorer votre appel unique peut créer une sévère frustration, vous faire prendre de mauvaises décisions et même mettre en danger vos relations.
          </li>
          <li>• Votre vie au travail est un voyage relationnel qui se déroule au fur et à mesure, et non simplement une séries des événements ponctuels. Soyez sensible et ouvert(e) aux consultants et à l'accompagnement au cours de votre processus de questionnement et de réflexion.
          </li>
          <li>• Aligner votre dessein avec votre carrière est la responsabilité d’une vie entière. Alors que la vie change, souvent un temps vient où vous pouvez vous sentir déconnecté(e) des relations, du travail et de la vie. Cela indique généralement qu'il est temps de ré-évaluer et de répéter le processus de Career Direct.
          </li>
          <li>• Le succès de votre parcours va vous demander un dur travail, de la fidélité et de la ténacité. Etudier votre rapport et faire de la recherche sur des choix possibles de carrière sont des étapes requises. S'engager bénévolement dans un champs d’action qui s’aligne avec votre dessein peut être bénéfique.
          </li>
          <li>• Vous êtes sur le point de prendre une décision de carrière critique. Une fondation solide est essentielle afin d’éviter un désastre. La seule fondation pour un choix de carrière averti est:
          <ul>
            <li>• D'être sûr(e) que votre décision s'aligne avec votre design.&nbsp;
            </li>
            <li>• De prendre une décision qui honore votre Créateur.&nbsp;
              <ul>
                <li>• Evitez ces fausses fondations à tout prix!&nbsp;
                  <ul>
                    <li>• Prendre le premier travail offert ou le plus facile&nbsp;
                    </li>
                    <li>• L'argent comme motivation première&nbsp;
                    </li>
                    <li>• Le titre d'un poste ou le prestige&nbsp;
                    </li>
                    <li>• La sécurité, le pouvoir et le contrôle&nbsp;
                    </li>
                    <li>• Suivre des amis&nbsp;
                    </li>
                    <li>• Rechercher des métiers en vue&nbsp;
                    </li>
                    <li>• Suivre les pas des parents et accomplir leurs rêves
                    </li>
                    <li>• Prendre un travail seulement parce que vous pouvez le faire&nbsp;
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">étapes</h4>
  </div>

</div>

<hr class="bg-rose trait-titre mb-4">

<div class="row mb-4">
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Etapes 1</h4>

        <ul class="card-text">
          <ul>
          <li>
            Si vous n’avez pas de consultant(e) de Career direct®, demandez l’aide d’un coach ou d’un mentor, qui va étudier votre rapport avec vous et prier régulièrement concernant vos orientations futures. Si vous le désirez, <a href="https://careerdirect-ge.org/find-consultant/search" target="_blank">Contactez dès maintenant un consultant Career Direct®!</a>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Etapes 2</h4>

        <ul class="card-text">
          <ul>
          <li>         Revoyez les résultats de votre rapport détaillé<em>         Career Direct<span>  ®</span></em>    à nouveau.</li><li>         Notez les informations dans votre rapport<u>         qui pourraient ne pas&nbsp;</u>         s'appliquer à vous.Si vous êtes en désaccord avec quelque chose, demandez à votre consultant(e) ou votre coach de confirmer vos pensées. Une fois confirmées, notez ce qui ne s'applique pas.&nbsp;</li><li>         Soulignez les points clés que vous ou votre consultant(e) ont relevés dans le rapport. &nbsp;</li><li>         Notez les recommandations de carrière les plus élevées données par votre consultant(e). Si vous n'aviez pas fait une consultation Career Direct® vous n'avez pas ces recommandations.&nbsp;</li>

          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Etapes 3</h4>

        <ul class="card-text">
          <ul>
          <li>           Cliquez sur les liens désirés ou recommandés de Carreer Direct ci-dessous correspondant à vos 8 premiers groupes d’intérêts et continuez de faire des recherches afin de choisir un champ de carrière potentiel en accord avec votre personnalité, vos centres d’intérêts, vos compétences et vos valeurs. </li><li>           Chaque carrière demande une configuration de personnalité, de centre d’intérêt, de compétences et de valeurs spécifiques afin d’avoir du succès. Rappelez-vous que la profession que vous allez choisir doit s’aligner avec les quatre dimensions de votre design. Vous trouverez les informations nécessaires concernant votre personnalité, vos centres d’intérêts, vos compétences et vos valeurs en cliquant sur le lien de métier détaillé ci-dessous. </li><li>       Consultez&nbsp;<a href="https://careerdirect-ge.org/assets/resources/fr/job-sampler/JobSampler.pdf" target="_blank">       l'échantillonnage des métiers (téléchargez ici)</a>       pour une liste de professions plus complète dans vos centres spécifiques d'intérêt. &nbsp;</li>
          </ul>
          <div class="page-break"></div>

          <h4 class="cdreport-header cdreport-header-alt text-center">
          Huit groupes principaux de centres d'intérêts&nbsp;<br>           Liens vers les détails des métiers&nbsp;
          </h4>

          <ol>

          <li class="cdreport-careergroup-container mb-4"> Religieux
          <div class="container cdreport-container">
              <div class="row cdreport-horizontal-list ">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Religious%20educator" target="_blank">Educateur(trice) religieux(se)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Pastor" target="_blank">Pasteur(e)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Pastoral%20counselor" target="_blank">Conseiller(ère) pastoral(e)</a></div>

              </div>
              <div class="row">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Missionary" target="_blank">Missionnaire</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Rabbi" target="_blank">Rabbin</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Priest" target="_blank">Prêtre</a></div>

              </div>
              <div class="row">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Evangelist" target="_blank">Evangéliste</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Youth%20pastor" target="_blank">Pasteur(e) de jeunes</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Chaplain" target="_blank">Aumônier(ère)</a></div>

              </div>
          </div></li>

          <!-- <p>{rpt_dt-section-5.1.3-aditional-occupations}</p> -->

          <li class="cdreport-careergroup-container mb-4"> Conseil
          <div class="container cdreport-container">
              <div class="row cdreport-horizontal-list ">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=School/%20college%20counselor" target="_blank">Ecole/conseiller(ère) d'éducation</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Marriage/family%20therapist" target="_blank">Conseiller(ère) conjugal(e)/familial(e)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Psychologist" target="_blank">Psychologue</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Social%20worker" target="_blank">Travailleur(se) social(e)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Rehabilitation%20counselor" target="_blank">Conseiller(ère) en réhabilitation</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Psychiatrist" target="_blank">Psychiatre</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Minister/Priest/Rabbi" target="_blank">Pasteur(e)/Prêtre/Rabbin</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Employment%20counselor" target="_blank">Conseiller(ère) professionnel(le)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Pastoral%20counselor" target="_blank">Conseiller(ère) pastoral(e)</a></div>

              </div>
          </div></li>
          <!-- <p>{rpt_dt-section-5.1.3-aditional-occupations}</p> -->

          <li class="cdreport-careergroup-container mb-4"> Enseignement
          <div class="container cdreport-container">
              <div class="row cdreport-horizontal-list ">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Teacher" target="_blank">Enseignant(e)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Instructional%20coordinator" target="_blank">Coordinateur(trice) pédagogique</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=School%20principal/%20administrator" target="_blank">Directeur(trice) d'école/administrateur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Tutor" target="_blank">Tuteur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Vocational%20education%20teacher" target="_blank">Enseignant(e) en école professionnelle</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Adult%20education%20teacher" target="_blank">Enseignant(e) pour les adultes</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Speech%20education%20teacher" target="_blank">Orthophoniste</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Professor" target="_blank">Professeur</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Special%20education%20teacher" target="_blank">Professeur d'éducation spécialisée&nbsp;</a></div>

              </div>
          </div></li>
          <!-- <p>{rpt_dt-section-5.1.3-aditional-occupations}</p> -->

          <li class="cdreport-careergroup-container mb-4"> Gestion/Ventes
          <div class="container cdreport-container">
              <div class="row cdreport-horizontal-list ">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Marketing%20Representative" target="_blank">Représentant(e) en marketing</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Buyer" target="_blank">Acheteur(se)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Business%20executive" target="_blank">Cadre commercial</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Real%20Estate%20Agent/Realtor" target="_blank">Agent immobilier</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Retail%20store%20manager" target="_blank">Gérant(e) d'un magasin de détail</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Travel%20agent" target="_blank">Agent de voyage</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Insurance%20sales%20agent" target="_blank">Agent de vente en assurances</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Stockbroker" target="_blank">Agent de change/broker</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Manager" target="_blank">Manager</a></div>

              </div>
          </div></li>
          <!-- <p>{rpt_dt-section-5.1.3-aditional-occupations}</p> -->

          <li class="cdreport-careergroup-container mb-4"> Législation/Politique
          <div class="container cdreport-container">
              <div class="row cdreport-horizontal-list ">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Attorney" target="_blank">Avocat(e)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Paralegal" target="_blank">Assistant(e) d'avocat</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Political%20scientist" target="_blank">Politologue</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Arbitrator" target="_blank">Médiateur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Legislator" target="_blank">Législateur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Judge" target="_blank">Juge</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Senator" target="_blank">Sénateur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Campaign%20manager" target="_blank">Gérant(e) de campagne</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Political%20science%20teacher" target="_blank">Enseignant(e) en sciences politiques</a></div>

              </div>
          </div></li>
          <!-- <p>{rpt_dt-section-5.1.3-aditional-occupations}</p> -->

          <li class="cdreport-careergroup-container mb-4"> Prestation publique/Communication
          <div class="container cdreport-container">
              <div class="row cdreport-horizontal-list ">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Professional%20singer" target="_blank">Chanteur(se) professionnel(le)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Radio/TV%20Announcer" target="_blank">Journaliste TV/Radio</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Producer/director" target="_blank">Producteur(trice) / directeur(trice) artistique</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Training%20specialist" target="_blank">Spécialiste de la formation</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Talent%20director" target="_blank">Directeur(trice) artistique</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Reporter" target="_blank">Reporter</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Announcer" target="_blank">Annonceur(se)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Actor/Actress" target="_blank">Acteur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Musician%20Conductor" target="_blank">Chef d'orchestre</a></div>

              </div>
          </div></li>
          <!-- <p>{rpt_dt-section-5.1.3-aditional-occupations}</p> -->

          <li class="cdreport-careergroup-container mb-4"> Ecrit
          <div class="container cdreport-container">
              <div class="row cdreport-horizontal-list ">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Journalist" target="_blank">Journaliste</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Web%20content%20editor" target="_blank">Editeur(trice) de contenu sur le web</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Technical%20writer" target="_blank">Rédacteur(trice) technique</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Desktop%20publisher" target="_blank">Micro-éditeur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Editor" target="_blank">Editeur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Writer" target="_blank">Ecrivain(e)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Creative%20writer" target="_blank">Auteur créatif</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Advertising%20copy%20writer" target="_blank">Concepteur-rédacteur publicitaire/conceptrice-rédactrice publicitaire</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Reporter" target="_blank">Reporter</a></div>

              </div>
          </div></li>
          <!-- <p>{rpt_dt-section-5.1.3-aditional-occupations}</p> -->

          <li class="cdreport-careergroup-container mb-4"> International
          <div class="container cdreport-container">
              <div class="row cdreport-horizontal-list ">

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Foreign%20correspondent" target="_blank">Correspondant(e) à l'étranger</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Foreign%20Language%20Teacher" target="_blank">Professeur de langue étrangère</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Translator" target="_blank">Traducteur(trice)</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Foreign%20missionary" target="_blank">Missionnaire à l'étranger</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Diplomat" target="_blank">Diplomate</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Overseas%20travel%20guide" target="_blank">Guide touristique à l'étranger</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=International%20business%20executive" target="_blank">Cadre commercial international</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Interpreter" target="_blank">Interprète</a></div>

                <div class="col-md-4 cdreport-horizontal-list-item"><a href="http://online.onetcenter.org/find/result?s=Foreign%20service%20executive" target="_blank">Cadre dans un service diplomatique</a></div>

              </div>
          </div></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Etape 4</h4>

        <ul class="card-text">
          <ul>
          <li>          Remplissez <a href="https://careerdirect-ge.org/assets/resources/fr/action-plan/ActionPlan.pdf" target="_blank">        la feuille du plan d'action</a>          en utilisant les informations clés trouvées dans vos recherches ainsi que dans le rapport détaillé. Cette étape est critique avant d'accomplir les prochaines étapes! &nbsp;&nbsp;</li><li>          Gardez en mémoire les questions suivantes alors que vous travaillez votre plan d'action: <ul><li>          Quelles sont vos forces et motivations uniques qui vous permettront d'exceller sur le marché du travail?</li><li>         Quel est votre modèle, vos caractéristiques données par Dieu en lien avec le travail? </li><li>         Quels sont les champs professionnels ou les occupations spécifiques qui vous intéressent le plus? &nbsp;&nbsp;</li><li>         Quels sont les critères requis importants ainsi que les caractéristiques de ces occupations selon vos recherches?</li><li>         Quels champs d'actions de carrières ou d'occupations s'accordent le mieux avec votre design unique? </li><li>        Qu'allez-vous faire pour trouver du travail selon ces occupations et opportunités qui sont des bonnes combinaisons pour vous? &nbsp;&nbsp;<ul><li>     Observer les offres d'emploi actuelles? </li><li>        Faire du volontariat?&nbsp;</li><li>        Faire un stage?&nbsp;</li><li>        Parler avec des gens qui sont dans cette profession particulière?&nbsp;</li></ul></li></ul></li>

          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6 card-competences-metier">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Etape 5</h4>

        <ul class="card-text">
          <ul>
          <li>          Au travers de ce processus, soyez toujours en prière et cherchez le conseil de Dieu, parlez avec des gens qui sont dans les professions qui s’accordent avec votre design, et cherchez des opportunités dans ces champs. </li>

          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>


                <?php
                //loader un document html et ressortir un element(paragraph ici) du document
                /*
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile(route('career_direct_fiche'));// loads html file
                libxml_clear_errors();
                $documents = $doc->getElementById('para-perso');
                $documents_svg = $doc->getElementsByTagName('svg');
                $documents_parafac = $doc->getElementById('para-facteurs');

                $imagepaths = array();
                $documents_image = $doc->getElementsByTagName('img');
                foreach($documents_image as $tag) {
                    // pour regrouper toutes les sources d'images dans une liste
                    $imagepaths[]=$tag->getAttribute('src');
                }
                echo '<img src='.$imagepaths[1].'/>';

                echo $documents->nodeValue, PHP_EOL;//PHP_EOL garantit le correct retour de ligne
                echo $documents_image[0]->nodeValue, PHP_EOL;
                /*foreach($documents_svg as $document){
                  echo $document->nodeValue, PHP_EOL;//PHP_EOL garantit le correct retour de ligne
                }
                echo $documents_parafac->nodeValue, PHP_EOL;

                $xpath = new DOMXpath($doc);
                $bath = $xpath->query('//div[contains(@class, "highcharts-axis-labels highcharts-xaxis-labels")]'); //instance of DOMNodeList
                //echo $bath[0]->nodeValue, PHP_EOL;
                foreach($bath as $document){
                  echo $document->nodeValue, PHP_EOL;//PHP_EOL garantit le correct retour de ligne
                }*/
                ?>

<svg version="1.1" style="font-family:Dosis, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="938" height="172"><desc></desc></svg>
{{-- Fin du if($motivations) --}}

@endsection

@section('javascript')
  <script type="text/javascript">
      $('#personnalite').click(function(){
        $('#para-perso').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin").offset().top - 100
        }, 1000);
      }),
      $('#facteurs').click(function(){
        $('#para-facteurs').toggle();
        //$('#para-perso').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin1").offset().top - 100
        }, 1000);
      }),
      $('#facteurs_et_sousfacteurs').click(function(){
        $('#para-facteurs_et_sousfacteurs').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin2").offset().top - 100
        }, 1000);
      }),
      $('#pointsforts').click(function(){
        $('#para-pointsforts').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin3").offset().top - 100
        }, 1000);
      }),
      $('#pointsfaibles').click(function(){
        $('#para-pointsfaibles').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin4").offset().top - 100
        }, 1000);
      }),
      $('#crucial').click(function(){
        $('#para-crucial').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin5").offset().top - 100
        }, 1000);
      }),
      $(document).ready(function(){
        $('#Cinq').click(function(){
        $('#paragraph').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin6").offset().top - 100
        }, 1000);
      }),
      $('#Huit').click(function(){
        $('#paragraph1').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin7").offset().top - 100
        }, 1000);
      }),
      $('#Scores').click(function(){
        $('#paragraph2').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin8").offset().top - 100
        }, 1000);
      }),
      $('#PotentialOccupations').click(function(){
        $('#paragraph3').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin9").offset().top - 100
        }, 1000);
      }),
      $('#Critere').click(function(){
        $('#para').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin10").offset().top - 100
        }, 1000);
      }),
      $('#Domaines').click(function(){
        $('#para1').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin11").offset().top - 100
        }, 1000);
      }),
      $('#Eval').click(function(){
        $('#para2').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin12").offset().top - 100
        }, 1000);
      }),
      $('#Valeurs').click(function(){
        $('#para-val').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin13").offset().top - 100
        }, 1000);
      }),
      $('#Environnement').click(function(){
        $('#para-val1').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin14").offset().top - 100
        }, 1000);
      }),
      $('#Attentes').click(function(){
        $('#para-val2').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin15").offset().top - 100
        }, 1000);
      }),
      $('#Vie').click(function(){
        $('#para-val3').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin16").offset().top - 100
        }, 1000);
      }),
      $('#Conclusion').click(function(){
        $('#para-val4').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin17").offset().top - 100
        }, 1000);
      }),
      $('#ToCanaan').click(function(){
        $('#para-tocanaan').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin18").offset().top - 100
        }, 1000);
      }),
      $('#Ressources').click(function(){
        $('#para-ressources').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin19").offset().top - 100
        }, 1000);
      })
    })

    $(function () {
      $(".card-competences-metier .card-text").mCustomScrollbar();
    });
  </script>
@endsection
