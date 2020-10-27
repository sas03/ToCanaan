{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          RESSOURCES
        @else
          Profil de {{ ucfirst($user->prenom) }} {{mb_strtoupper($user->nom) }}
        @endif
        </h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection
@section('main_sous_menu')
  <div class="container">
    <div class="row row-sous-menu-fiche">
      <div class="col-lg-12">
        <ul>
          <li><a href="{{ route('career_direct', ['id' => Auth::id()]) }}"><img src="{{ asset('img/back.png') }}" style="height: 25px; width: 25px"></a></li>
          <li><a href="#details" class="sous-menu-link text-uppercase">RESSOURCES - DÉTAILS</a></li>
          <li><a href="#fichieraudio" class="sous-menu-link text-uppercase">FICHIER AUDIO</a></li>
          <li><a href="#audiofiles" class="sous-menu-link text-uppercase">AUDIO FILES FOR STUDENTS</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
@section('content')

<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier" id="details">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Ressources - Détails</h4>

        <ul class="card-text">
          <p>Cette section donne de précieuses ressources ainsi que des liens internet vers des ressources et des services qui vous aideront sur le chemin de l'accomplissement de votre carrière. &nbsp; &nbsp;</p>

          <li>
            <a href="https://careerdirect-ge.org/assets/resources/fr/pdf/GuideCollegeMajors.pdf" target="_blank">Guide des choix de filières universitaires et carrières (livre électronique, en anglais)</a>
            <p>• Le livre de références<em>          Guide des choix de filières universitaires et carrières&nbsp;</em>          donne des conseils pratique pour explorer les différentes filières d'études, et le document &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>          Choisir une filière universitaire/Ecole technique</em> dans les ressources en ligne vous aidera à trouver la filière d'étude correspondante à vos intérêts. &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            </p>
          </li>
          <li>
            <a href="https://careerdirect-ge.org/assets/resources/fr/pdf/ChoosingCollege-Tech.pdf" target="_blank">Choisir une Filière Universitaire ou Technique</a>
            <p>• Ce document présente un processus permettant de trouver les filières d'études universitaires our techniques correspondant à vos principaux champs de profession et carrière (identifiés dans votre Plan d'Action).
            </p>
          </li>
          <li>
            <a href="https://careerdirect-ge.org/assets/resources/fr/job-sampler/JobSampler.pdf" target="_blank">Echantillonnage des Métiers</a>
            <p>• L'<em>Echantillonnage des métiers</em>est conçu pour élargir votre vision des possibilités de métiers en relation avec les professions qui vous intéressent. Les neuf professions qui sont listées dans votre rapport pour chaque centre d'intérêt ne sont que des exemples. Cet <em>Echantillonnage des métiers</em>          Contient une liste complète des métiers qui peuvent être recherchés au travers de O*Net (cf. informations complémentaires ci-dessous) et des liens ci-dessous vers le livre des métiers.
            </p>
          </li>
          <li>
            <a href="http://online.onetcenter.org/" target="_blank">O*Net Online</a>
            <p>• O*Net Online &nbsp;est une base de données d'informations détaillées à propos de professions spécifiques, développée par le bureau des statistiques du travail américain. Cette ressource en ligne donne des informations sur tous les métiers listés dans l'Echantillonnage des métiers, ainsi que les compétences requises, la formation ou le niveau scolaire nécessaire, les responsabilités du métier, les activités du travail, le niveau de compétences, le salaire moyen, et bien plus. &nbsp;&nbsp;
            </p>
          </li>
          <li>
            <a href="http://www.bls.gov/oco/" target="_blank">Livre des Métiers&nbsp;</a>
            <p>• La base de données du Livre des métiers est également gérée par le bureau des statistiques du travail, et donne des descriptions détaillées des 260 métiers qui représentent 90% de tous les métiers occupés par les Américains.&nbsp;
            </p>
          </li>
          <li>
            <a href="http://www.crown.org/" target="_blank">Crown Financial Ministries</a>
            <p>• Crown Financial Ministries est l'organisation mère qui développe le Bilan de Compétence et d'Orientation Career Direct<span>   ®</span>   . C'est un ministère international et non-dénominationnel qui met à disposition des ressources pour les individus et les églises, des séminaires, quatre radios nationales, un site internet primé,&nbsp;Money Map Coaching, et des ressources de carrière qui enseignent aux gens la véritable liberté financière. Allez visiter notre page internet pour plus d'informations sur ce ministère dynamique.
            </p>
          </li>
          <li>
            <a href="http://store.crown.org/" target="_blank">La Boutique des Ressources de Crown Financial Ministries</a>
            <p>• Cliquez ici pour voir tous les produits et les services disponibles de Crown Financial Ministries.
            </p>
          </li>
          <li>
            <a href="http://www.pongoresume.com/index.cfm?affiliate=CareerDirectOnline" target="_blank">Le Service de Rédaction de Curriculum Vitae Pongo™</a>
            <p>• Dans le marché compétitif du travail d'aujourd’hui, un CV bien écrit est le facteur le plus important pour vous ouvrir la porte du monde de l'emploi et vous permettre d’obtenir le poste idéal. Le Resume<strong>       BUILDER</strong>        and <strong>       PUBLISHER</strong>      vous donne les outils pour créer, imprimer et envoyer votre CV par email ou par fax facilement, et tout cela en ligne! (notez que ce lien vous redirige vers un autre site web) &nbsp;&nbsp;
            </p>
          </li>
          <li>
            <a href="https://careerdirect-ge.org/assets/resources/fr/pdf/Questionnaire-Occupation.pdf" target="_blank">Inventaire personnel de carrière&nbsp;</a>
            <p>• Ce questionnaire vous aidera à résoudre des questions d'orientation de carrière importantes avant de compléter les étapes ci-dessous. Vous pouvez écrire et imprimer vos informations dans le PDF, mais cela ne sauvegardera pas vos informations.
            </p>
          </li>
          <li>
            <a href="https://careerdirect-ge.org/assets/resources/fr/pdf/Questionnaire-Education.pdf" target="_blank">Inventaire Personnel de Planification d'Etudes et de Carrière&nbsp;</a>
            <p>• Remplir ce petit questionnaire en ligne vous aidera à vous préparer à d'importantes prises de décision quant à votre carrière. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            </p>
          </li>
        </ul>
      </div>
    </div>
  </div>
  </div>
  <div class="row">

  	<div class="col-lg-12 box-titres" id="fichieraudio">
  		<h4 class="text-uppercase">Fichier Audio</h4>
  	</div>

  </div>

  <hr class="bg-rose trait-titre mb-4">
<div class="row mb-4">
    <div class="col-lg-6 card-competences-metier">

      <div class="card mb-6 bg-light-rose custom-card">
        <div class="card-body">
          <h4 class="card-title bg-rose">Message Audio #1</h4>

          <ul class="card-text">
            <div class="header-list-audio-file">
              <p><strong>   Message Audio #1 – "Les principes d'accomplissement de carrière"</strong><em>       (28 minutes)</em></p><p>      Ce message donne des encouragements et la sagesse afin d'avoir réellement du succès dans votre vie et votre carrière. &nbsp;</p>
            </div>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/Principles_Session1.mp3" target="_blank" style="color: skyblue">Session Une:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/Principles_Session1.mp3" type="audio/mpeg">
              </audio>
              </p><ul>
                <li>•      Dieu est l'instigateur du Travail</li><li>      Chaque travail a du sens et de la dignité&nbsp;</li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/Principles_Session2.mp3" target="_blank" style="color: skyblue">Session Deux:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/Principles_Session2.mp3" type="audio/mpeg">
              </audio>
              </p><ul>
                <li>•     Votre appel - Le plan de Dieu pour votre vie&nbsp;</li><li>     Le travail est une plateforme pour le ministère et le témoignage</li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/Principles_Session3.mp3" target="_blank" style="color: skyblue">Session Trois:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/Principles_Session3.mp3" type="audio/mpeg">
              </audio>
              </p><ul>
                <li>•      L'excellence dans le travail</li><li>      Dieu a le dernier mot</li>
              </ul>
            <p></p>
          </ul>
        </div>
      </div>
  </div>
  <div class="col-lg-6 card-competences-metier">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Message Audio #2</h4>

        <ul class="card-text">
          <div class="header-list-audio-file">
            <p><strong>      Message Audio #2 – "Comment retirer le maximum de Career Direct®"</strong><em>       (36 minutes)</em></p><p>      Ce message donne des instructions détaillées sur comment retirer le maximum de votre évaluation Career Direct<span>   ®</span>   . </p>
          </div>

          <p>
            <a href="https://careerdirect-ge.org/assets/resources/fr/audio/BestResults_Session1.mp3" target="_blank" style="color: skyblue">Session Une:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/BestResults_Session1.mp3" type="audio/mpeg">
              </audio>
            </p><ul>
              <li>•      Les changements dans le monde du travail durant la dernière génération&nbsp;</li>
            </ul>
          <p></p>
          <p>
            <a href="https://careerdirect-ge.org/assets/resources/fr/audio/BestResults_Session2.mp3" target="_blank" style="color: skyblue">Session Deux:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/BestResults_Session2.mp3" type="audio/mpeg">
              </audio>
            </p><ul>
              <li>•      Dix tendances dans le monde du travail actuel</li>
            </ul>
          <p></p>
          <p>
            <a href="https://careerdirect-ge.org/assets/resources/fr/audio/BestResults_Session3.mp3" target="_blank" style="color: skyblue">Session Trois:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/BestResults_Session3.mp3" type="audio/mpeg">
              </audio>
            </p><ul>
              <li>• Trouvez les professions correspondantes à votre profil</li>
            </ul>
          <p></p>
          <p>
            <a href="https://careerdirect-ge.org/assets/resources/fr/audio/BestResults_Session4.mp3" target="_blank" style="color: skyblue">Session Quatre:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/BestResults_Session4.mp3" type="audio/mpeg">
              </audio>
            </p><ul>
              <li>• Les bénéfices d'une perspective biblique dans un choix de carrière </li>
            </ul>
          <p></p>
        </ul>
      </div>
    </div>
</div>
</div>

<div class="row mb-4">
    <div class="col-lg-6 card-competences-metier">

      <div class="card mb-6 bg-light-rose custom-card">
        <div class="card-body">
          <h4 class="card-title bg-rose">Message Audio #3</h4>

          <ul class="card-text">
            <div class="header-list-audio-file">
              <p><strong>  Message Audio #3 – "Comprendre votre dessein venant de Dieu/interpréter votre rapport Career Direct"</strong><em>         (55 minutes)</em></p><p>  Ce message souligne les bases de notre dessein unique créé par Dieu. Il nous a donné des talents spéciaux et les compétences nécessaires afin d'atteindre notre plein potentiel. Le rapport Career Direct vous donne un éclairage sur votre profil unique.&nbsp;</p>
            </div>

            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess1.mp3" target="_blank" style="color: skyblue">Session Une:</a>
                <audio controls="controls" style="width: 250px; height: 17px">
                  <source src="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess1.mp3" type="audio/mpeg">
                </audio>
              </p><ul>
                <li>•       Bonnes et mauvaises approches pour sélectionner une carrière&nbsp;</li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess2.mp3" target="_blank" style="color: skyblue">Session Deux:</a>
                <audio controls="controls" style="width: 250px; height: 17px">
                  <source src="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess2.mp3" type="audio/mpeg">
                </audio>
              </p><ul>
                <li>•     Relisez votre rapport- Section Personnalité </li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess3.mp3" target="_blank" style="color: skyblue">Session Trois:</a>
                <audio controls="controls" style="width: 250px; height: 17px">
                  <source src="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess3.mp3" type="audio/mpeg">
                </audio>
              </p><ul>
                <li>•       Relisez votre rapport- Les Points Forts de Votre personnalité &nbsp;</li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess4.mp3" target="_blank" style="color: skyblue">Session Quatre:</a>
                <audio controls="controls" style="width: 250px; height: 17px">
                  <source src="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess4.mp3" type="audio/mpeg">
                </audio>
              </p><ul>
                <li>•       Relisez votre rapport – Les forces de votre Personnalité/les points faibles et les implications de carrière &nbsp;</li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess5.mp3" target="_blank" style="color: skyblue">Session Cinq:</a>
                <audio controls="controls" style="width: 250px; height: 17px">
                  <source src="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess5.mp3" type="audio/mpeg">
                </audio>
              </p><ul>
                <li>•      Relisez votre rapport – Vos intérets, les groupes de professions généraux, comprendre vos scores&nbsp;</li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess6.mp3" target="_blank" style="color: skyblue">Session Six:</a>
                <audio controls="controls" style="width: 250px; height: 17px">
                  <source src="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess6.mp3" type="audio/mpeg">
                </audio>
              </p><ul>
                <li>•       Relisez votre rapport – Compétences et Capacités</li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess7.mp3" target="_blank" style="color: skyblue">Session Sept:</a>
                <audio controls="controls" style="width: 250px; height: 17px">
                  <source src="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess7.mp3" type="audio/mpeg">
                </audio>
              </p><ul>
                <li>•       Relisez votre rapport – Vos valeurs concernant l'environnement de travail, vos attentes vis-à-vis du travail, vos valeurs de vie&nbsp;</li>
              </ul>
            <p></p>
            <p>
              <a href="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess8.mp3" target="_blank" style="color: skyblue">Session Huit:</a>
                <audio controls="controls" style="width: 250px; height: 17px">
                  <source src="https://careerdirect-ge.org/assets/resources/fr/audio/God-Given%20Design_Sess8.mp3" type="audio/mpeg">
                </audio>
              </p><ul>
                <li>•       Scores élevés ou faibles dans la section Centres d'Intérêts&nbsp;</li>
              </ul>
            <p></p>
          </ul>
        </div>
      </div>
  </div>
  <div class="col-lg-6 card-competences-metier">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Message Audio #4</h4>

        <ul class="card-text">
          <div class="header-list-audio-file">
            <p><strong>          Message Audio #4 – "Un plan d'action pour le futur"</strong><em>           (9 minutes)</em></p><p>          Ce message donne des instructions spécifiques pour compléter votre plan d'action personnalisé pour le futur.&nbsp;</p>
          </div>

          <p>
            <a href="https://careerdirect-ge.org/assets/resources/fr/audio/Action%20Plan%20-%20Work%20-%20PDF.mp3" target="_blank" style="color: skyblue">Session Une:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/Action%20Plan%20-%20Work%20-%20PDF.mp3" type="audio/mpeg">
              </audio>
            </p><ul>
              <li>•         Comment remplir le plan d'action et l'utiliser pour votre choix de carrière&nbsp;</li>
            </ul>
          <p></p>
        </ul>
      </div>
    </div>
</div>
</div>
<div class="row">

  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">Audio Files for Students</h4>
  </div>

</div>

<hr class="bg-vert trait-titre mb-4">
<div class="row mb-4">
  <div class="col-lg-6 card-competences-metier" id="audiofiles">

    <div class="card mb-6 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Plan d'Action pour le Futur - Educationnel</h4>

        <ul class="card-text">
          <div class="header-list-audio-file">
            <p><strong> "Plan d'Action pour le Futur - Educationnel"</strong><em> (17 minutes)</em></p><p>Ce message donne des instructions spécifiques pour remplir votre plan d'action personnalisé pour le futur. </p>
          </div>
          <p>
            <a href="https://careerdirect-ge.org/assets/resources/fr/audio/Action%20Plan%20-%20Edu%20-%20PDF1.mp3" target="_blank" style="color: skyblue">Session Une:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/Action%20Plan%20-%20Edu%20-%20PDF1.mp3" type="audio/mpeg">
              </audio>
            </p><ul>
              <li>•         Comment remplir le plan d'action et l'utiliser pour une direction de carrière&nbsp;</li>
            </ul>
          <p></p>

          <p>
            <a href="https://careerdirect-ge.org/assets/resources/fr/audio/Action%20Plan%20-%20Edu%20-%20PDF2.mp3" target="_blank" style="color: skyblue">Session Deux:</a>
              <audio controls="controls" style="width: 250px; height: 17px">
                <source src="https://careerdirect-ge.org/assets/resources/fr/audio/Action%20Plan%20-%20Edu%20-%20PDF2.mp3" type="audio/mpeg">
              </audio>
            </p><ul>
              <li>•        Choisir une université ou un chemin de carrière&nbsp;</li>
            </ul>
          <p></p>
        </ul>
      </div>
    </div>
</div>
<div class="col-lg-6 card-competences-metier">

  <div class="card mb-6 bg-light-vert custom-card">
    <div class="card-body">
      <h4 class="card-title bg-vert">Un Message pour les Parents</h4>

      <ul class="card-text">
        <div class="header-list-audio-file">
          <p><strong> "Un Message pour les Parents"</strong><em> (18 minutes)</em></p><p>  Note: Pères et Mères – Vous devriez écouter cette section afin de guider vos enfants de la meilleure manière possible. </p>
        </div>

        <p>
          <a href="https://careerdirect-ge.org/assets/resources/fr/audio/MessagetoParents_Session1.mp3" target="_blank" style="color: skyblue">Session Une:</a>
            <audio controls="controls" style="width: 250px; height: 17px">
              <source src="https://careerdirect-ge.org/assets/resources/fr/audio/MessagetoParents_Session1.mp3" type="audio/mpeg">
            </audio>
          </p><ul>
            <li>•        La gestion englobe plus que l'argent&nbsp;</li>
          </ul>
        <p></p>

        <p>
          <a href="https://careerdirect-ge.org/assets/resources/fr/audio/MessagetoParents_Session2.mp3" target="_blank" style="color: skyblue">Session Deux:</a>
            <audio controls="controls" style="width: 250px; height: 17px">
              <source src="https://careerdirect-ge.org/assets/resources/fr/audio/MessagetoParents_Session2.mp3" type="audio/mpeg">
            </audio>
          </p><ul>
            <li>•        Votre rôle en tant que coach de carrière de votre étudiant&nbsp;</li>
          </ul>
        <p></p>
      </ul>
    </div>
  </div>
</div>
</div>

            <!-- bootstrap -->
            <script src="./Career Direct® _ Rapport détaillé - Emmanuel MORDIVA LANDU_files/bootstrap.min.js.téléchargement"></script>
            <!-- Highcharts -->
            <script data-cfasync="false" src="./Career Direct® _ Rapport détaillé - Emmanuel MORDIVA LANDU_files/highcharts.js.téléchargement"></script>
            <script data-cfasync="false" src="./Career Direct® _ Rapport détaillé - Emmanuel MORDIVA LANDU_files/highcharts-more.js.téléchargement"></script>
            <script data-cfasync="false" src="./Career Direct® _ Rapport détaillé - Emmanuel MORDIVA LANDU_files/grid-light.js.téléchargement"></script>
            <script data-cfasync="false" src="./Career Direct® _ Rapport détaillé - Emmanuel MORDIVA LANDU_files/custom_charts.js.téléchargement"></script>
            <script data-cfasync="false" type="text/javascript">
              $(document).ready(function() {
                //UTILITIES
                //Smooth scroll
                $('.scroll-to').click(function() {
                  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                    $('html,body').animate({
                      scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                    }
                  }
                });

                //$('a[href^="http"]').attr("target","_blank");

                              $('.career-implications').each(function(){
                                  if($(this).children('.cdreport-horizontal-list').html() == undefined){
                                       var listCareerImplications = '';
                                       $(this).children('.report-list-item').each(function() {
                                          listCareerImplications +='<div class="col-md-4 cdreport-horizontal-list-item"><span class="report-list-item"> '+$(this).text()+'</span></div>';
                                          $(this).remove();
                                       });
                                       $(this).append('<div class="row cdreport-horizontal-list">'+listCareerImplications+'</div>');
                                  }
                              });

                              $('#select-format-letter ul li span').on('click', function(){
                                  $('#select-format-letter a span').text($(this).text());
                                  $('#input-format-letter').val($(this).parents('li').attr('data-value'));
                              });
              });

                 /* file download pdf*/
                var fileDownloadCheckTimer;
              $(document).on("submit", "form.pdfDownloadForm", function (e) {
                $("body").append('<div id="spinner-loading-pdf"><img src="/app/plugins/reports/images/loading.gif"></div>');
                $("#download_token_value_id").val();

                $.fileDownload($(this).prop("action"), {
                  httpMethod: "POST",
                  data: $(this).serialize(),
                  failCallback: function () {
                    $('#pdf_generation_failed').modal('show');
                  }
                });
                var tokenDownload = $("token_download_file_id").val();
                fileDownloadCheckTimer = window.setInterval(function () {
                  var cookieValue = $.cookie("token_download_file");
                  if (cookieValue == tokenDownload){
                  window.clearInterval(fileDownloadCheckTimer);
                  $.removeCookie("token_download_file");
                  $("#spinner-loading-pdf").remove();
                  }
                }, 5000);
                e.preventDefault();
              });
            </script>
            <div class="modal fade " id="pdf_generation_failed" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Fermer</span></button>
                  <h3 class="modal-title">
                    Erreur!
                  </h3>
                </div>
                <div class="modal-body">
                  Nous n'avons pas pu générer votre PDF. Veuillez SVP réessayer plus tard.
                </div>

              </div>
            </div>
          </div>

          </div>
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
