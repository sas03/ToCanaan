@extends('layouts.master')

@section('title', 'Accueil')

@section('homepage')

		{{-- ----------------- LOGO EN HAUT DE LA PAGE ----------------- --}}

		<div class="row">
			<img src="{{ asset('img/logo.png') }}" alt="Bienvenue sur ToCanaan" id="logo-home" class="mx-auto d-block">
		</div>

		{{-- ----------------- METIERS + FORMATIONS ----------------- --}}

		<div class="row row-mosaique">
			<div class="col-lg-6 bg-rose text-center">
				<a href="{{ route('formations_index') }}">
					<img src="{{ asset('img/formations.png') }}" alt="Chercher une formation" class="mx-auto d-block img-home">
					<h2>Formations</h2>
					<p>Bien choisir sa formation pour exercer le métier qui vous correspond !</p>
					<p class="text-violet-fonce">Rechercher une formation</p>
				</a>
			</div>
			<div class="col-lg-6 bg-vert text-center">
				<a href="{{ route('metiers_index') }}">
					<img src="{{ asset('img/metiers.png') }}" alt="Chercher un métier" class="mx-auto d-block img-home">
					<h2>Métiers</h2>
					<p>Choisissez un métier en phase avec votre personnalité et vos capacités…</p>
					<p class="text-violet-fonce">Rechercher un métier</p>
				</a>
			</div>

    <?php
		$command = escapeshellcmd('.\..\scripts\firstAlgo.py');
    	$output = utf8_encode(shell_exec($command));
			echo "<p style='font-weight: bold;'>Tests</p>";
    	echo "<p style='color: white'>".$output."</p>";
    ?>
		</div>

		{{-- ----------------- CONSEILS ----------------- --}}

		<div class="row row-conseils">

			<div class="container-fluid">

				<div class="row">
					<div class="col-lg-3">
						<div class="card custom-card card-home">
							<div class="card-body">
								<h4 class="card-title text-jaune">ORIENTATION</h4>
								<p class="card-text">Un outil moderne et collaboratif d’orientation et d’accompagnement pour les étudiants et professionnels</p>
							</div>
						</div>

					</div>
					<div class="col-lg-3">
						<div class="card custom-card card-home">
							<div class="card-body">
								<h4 class="card-title text-jaune">ACCOMPAGNEMENT</h4>
								<p class="card-text">Accompagnement personnalisé tout au long du parcours pour un épanouissement personnel et professionnel</p>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3">
						<div class="card custom-card card-home">
							<div class="card-body">
								<h4 class="card-title text-jaune">CONSEIL</h4>
								<p class="card-text">Découverte des différents parcours possibles et envisageables d’études vers un métier !</p>
							</div>
						</div>

					</div>
					<div class="col-lg-3">

						<div class="card custom-card card-home">
							<div class="card-body">
								<h4 class="card-title text-jaune">DIRECTION</h4>
								<p class="card-text">Exploration interactive des filières (vidéos, documentations, études, témoignages, géolocalisation, etc.)</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		{{-- ----------------- MOSAIQUE ----------------- --}}

		<div class="row row-mosaique">

			<div class="col-lg-3 col-md-6">
					<div class="card custom-card bg-rouge">
						<img src="{{ asset('img/metiers.png') }}" alt="" class="mx-auto d-block small-img-home img-fluid">
						<h6 class="card-title">Quelle formation choisir ? Je souhaite devenir...</h6>
						<p class="text-violet-fonce">Parcours sur-mesure</p>
					</div>
				</a>

				<a href="{{ route('orientation_index') }}">
					<div class="card custom-card bg-jaune">
						<img src="{{ asset('img/test.png') }}" alt="" class="mx-auto d-block small-img-home img-fluid">
						<h6 class="card-title">Je suis perdu(e). Je ne sais pas quels études et métiers faire...</h6>
						<p class="text-violet-fonce">Test d'orientation</p>
					</div>
				</a>
			</div>

			<div class="col-lg-3 col-md-6 col-text">
				<p>ToCANAAN vous propose des outils pertinents pour choisir un parcours et un métier correspondant à vos aspirations profondes
					!</p>
			</div>

			<div class="col-lg-3 col-md-6">
				<a href="">
					<div class="card custom-card bg-violet">
						<img src="{{ asset('img/forum.png') }}" alt="" class="mx-auto d-block small-img-home img-fluid">
						<h6 class="card-title">J’aimerais échanger avec un conseiller, un professionnel...</h6>
						<p class="text-violet-fonce">Forum d'échange</p>
					</div>
				</a>

				<a href="">
					<div class="card custom-card bg-rouge">
						<img src="{{ asset('img/formations.png') }}" alt="" class="mx-auto d-block small-img-home img-fluid">
						<h6 class="card-title">J’ai choisi une orientation qui ne me convient pas...</h6>
						<p class="text-violet-fonce">Accompagnement</p>
					</div>
				</a>
			</div>

			<div class="col-lg-3 col-md-6">
				@if (Auth::guard('web')->user())
					<a href="{{ route('social_network_index', ['id' => Auth::id()]) }}">
				@else
					<a href="{{ route('login') }}">
				@endif
					<div class="card custom-card bg-orange">
						<img src="{{ asset('img/discussions.png') }}" alt="" class="mx-auto d-block small-img-home img-fluid">
						<h6 class="card-title">J’aimerais discuter avec un professionnel ou un étudiant ? </h6>
						<p class="text-violet-fonce">Réseau personnalisé</p>
					</div>
				</a>

				<a href="">
					<div class="card custom-card bg-jaune">
						<img src="{{ asset('img/parents.png') }}" alt="" class="mx-auto d-block small-img-home img-fluid">
						<h6 class="card-title">Je souhaite aider mon enfant, comment faire ? </h6>
						<p class="text-violet-fonce">Conseils et outils</p>
					</div>
				</a>
			</div>

		</div>

		{{-- ----------------- TEMOIGNAGES ----------------- --}}

		<div class="row row-temoignages">
			<div class="container">
				<h4 class="text-center text-violet-fonce">36% des étudiants en premières années d’études supérieures ont eu des difficultés au moment de faire des choix d’orientation.</h4>
			</div>
		</div>

		{{-- ----------------- STATISTIQUES ----------------- --}}

		<div class="row row-statistiques bg-violet justify-content-center">
			<div class="col-lg-4">
				<p>85,4%
					<span class="text-violet-fonce">d’étudiants ont fait des recherches autonomes</span>
				</p>

				<p>46.3%
					<span class="text-violet-fonce">se sont fait aider de leur famille</span>
				</p>
			</div>

			<div class="col-lg-7">
				<div class="barre">
					<p>Soi-même</p>
					<span>
						<span class="jauge" style="width:80%"></span>
					</span>
				</div>
				<div class="barre">
					<p>Famille</p>
					<span>
						<span class="jauge" style="width:50%"></span>
					</span>
				</div>
				<div class="barre">
					<p>Amis</p>
					<span>
						<span class="jauge" style="width:30%"></span>
					</span>
				</div>
				<div class="barre">
					<p>Professeurs</p>
					<span>
						<span class="jauge" style="width:35%"></span>
					</span>
				</div>
				<div class="barre">
					<p>Salon</p>
					<span>
						<span class="jauge" style="width:20%"></span>
					</span>
				</div>
				<div class="barre">
					<p>Professionnels de l'orientation</p>
					<span>
						<span class="jauge" style="width:17%"></span>
					</span>
				</div>
				<div class="barre">
					<p>Autres</p>
					<span>
						<span class="jauge" style="width:5%"></span>
					</span>
				</div>
			</div>
		</div>

		{{-- ----------------- CONTACT ----------------- --}}

		<div class="row row-contact justify-content-center">
			<div class="col-lg-12">
				<h2 class="text-center text-jaune">Pour en savoir plus sur l’avancement de la plateforme ToCanaan, contactez-nous !</h2>
			</div>
			<div class="col-lg-4 col-md-8">

				<div class="box-form">
					<form id="form-contact">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="nom" class="control-label">Nom</label>

							<input id="nom" type="text" class="form-control" name="nom">

						</div>

						<div class="form-group">
							<label for="prenom" class="control-label">Prénom</label>

							<input id="prenom" type="text" class="form-control" name="prenom">

						</div>

						<div class="form-group">
							<label for="email" class="control-label">Adresse mail</label>

							<input id="email" type="email" class="form-control" name="email">

						</div>

						<div class="form-group">
							<label for="message" class="control-label">Message</label>

							<textarea class="form-control" id="message" rows="3" name="message"></textarea>

						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary bg-jaune" id="submit-contact">
								Envoyer
							</button>
						</div>
					</form>
				</div>

			</div>
		</div>

		<!-- <object type="text/html" data="https://careerdirect.org/" width="400" height="400">
  			<a href="https://careerdirect.org/">un lien vers l'URL en question si la page n'est pas chargée</a>
		</object> -->

	@endsection

	@section('javascript')

	<script>
		$(function(){

      $(window).scroll(function() {
          var scroll = $(window).scrollTop();

          // le menu "normal" apparaît après 300px de scroll
          if (scroll >= 300) {
              $(".navbar-brand").css("visibility", 'visible');
              $(".nav-metiers").css("visibility", 'visible');
              $(".nav-formations").css("visibility", 'visible');
          } else {
              $(".navbar-brand").css("visibility", 'hidden');
              $(".nav-metiers").css("visibility", 'hidden');
              $(".nav-formations").css("visibility", 'hidden');
          }
      });

      $('#submit-contact').click(function(e){
        e.preventDefault();

				let url = "{{ config('app.url') }}" + '/contact';
				$.post(url, $('#form-contact').serialize())
					.done(function(response){
						$('#form-contact').fadeOut(400);
						$('.box-form').html("<p class=\"text-center\">Votre message a bien été envoyé !</p>")
				})
      });
    })
	</script>

	@endsection
