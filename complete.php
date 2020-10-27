<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-violet custom-card">
      <div class="card-body card-competences-metier">
        <h4 class="card-title bg-jaune">
          Centres d'intérêt
        </h4>
          <div class="container mt-4">

            <a href="#Cinq" id="Cinq"><h5 name="Cinq">Partie 4: Valeurs</h5></a>

            <div id="paragraph" style="display: none">
            </div>
            <a href="#Cinq" id="Cinq"><h5 name="Cinq">1 Valeurs: Environnement de Travail</h5></a>

            <div id="paragraph" style="display: none">
            </div>
            <a href="#Cinq" id="Cinq"><h5 name="Cinq">2 Valeurs: Vos attentes vis-à-vis de votre travail</h5></a>

            <div id="paragraph" style="display: none">
            </div>
            <a href="#Cinq" id="Cinq"><h5 name="Cinq">3 Valeurs: Valeurs de Vie</h5></a>

            <div id="paragraph" style="display: none">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  //loader un document html et ressortir un element(paragraph ici) du document
  $doc = new DOMDocument();
  $doc->loadHTMLFile("hello.html");// loads html file
  $documents = $doc->getElementsByTagName('p');
  foreach($documents as $document){
    echo $document->nodeValue, PHP_EOL;//PHP_EOL garantit le correct retour de ligne
  }
  ?>
