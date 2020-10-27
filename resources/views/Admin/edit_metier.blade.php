@extends('Admin.layout') @section('title', 'Modification d\'un métier') @section('content')

<a href="{{ route('admin_metiers') }}" class="btn-return-back bg-jaune">< Retourner aux métiers</a>

<br>
<h3 class="text-center">
	@if (!empty($metier->id))
		Modification de <strong>{{ $metier->nom }}</strong>
	@else
		Ajout d'un nouveau métier
	@endif
</h3>
</h3>
<br> @if ($errors->any())
<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
<br> @endif
<form method="POST">
	{{ csrf_field() }}
	<div class="row justify-content-lg-center">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="nom">Libellé</label>
				<input type="text" class="form-control" id="nom" name="nom" value="{{ $metier->nom }}">
			</div>
			<div class="form-group">
				<label for="code_rome">Code ROME</label>
				<input type="text" class="form-control" id="code_rome" name="code_rome" value="{{ $metier->code_rome }}">
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Secteur</label>
				<select class="form-control" id="exampleFormControlSelect1" name="secteur_id">
          @foreach($secteurs as $secteur)
            <option value="{{ $secteur->id }}" @if ($secteur->id == $metier->secteur_id) selected="true" @endif>{{ $secteur->nom }}</option>
          @endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="description">Description du métier</label>
				<textarea class="form-control" id="description" name="description" rows="6">{{ $metier->description }}</textarea>
			</div>

			<div class="form-group">
				<label for="niveau_requis">Niveau Requis</label>
				<select class="form-control" id="niveau_requis" name="niveau_requis">
					<option value="brevet" @if ($metier->niveau_requis == 'brevet') selected @endif>Brevet</option>
					<option value="CAP ou équivalent" @if ($metier->niveau_requis == 'CAP ou équivalent') selected @endif>CAP</option>
					<option value="bac ou équivalent" @if ($metier->niveau_requis == 'bac ou équivalent') selected @endif>Bac</option>
					<option value="bac + 1" @if ($metier->niveau_requis == 'bac + 1') selected @endif>Bac + 1</option>
					<option value="bac + 2" @if ($metier->niveau_requis == 'bac + 2') selected @endif>Bac + 2</option>
					<option value="bac + 3" @if ($metier->niveau_requis == 'bac + 3') selected @endif>Bac + 3</option>
					<option value="bac + 4" @if ($metier->niveau_requis == 'bac + 4') selected @endif>Bac + 4</option>
					<option value="bac + 5" @if ($metier->niveau_requis == 'bac + 5') selected @endif>Bac + 5</option>
					<option value="bac + 6" @if ($metier->niveau_requis == 'bac + 6') selected @endif>Bac + 6</option>
					<option value="bac + 7" @if ($metier->niveau_requis == 'bac + 7') selected @endif>Bac + 7</option>
					<option value="bac + 8" @if ($metier->niveau_requis == 'bac + 8') selected @endif>Bac + 8</option>
					<option value="bac + 9 et plus" @if ($metier->niveau_requis == 'bac + 9 et plus') selected @endif>Bac + 9</option>
				</select>
			</div>
			<div class="form-group">
				<label for="codes_rome_proches">Codes ROME Proches</label>
				<input type="text" class="form-control" id="codes_rome_proches" name="codes_rome_proches" value="{{ $metier->codes_rome_proches }}">
			</div>
			<div class="form-group">
				<label for="video">Lien playlist de vidéo</label>
				<input type="text" class="form-control" id="video" name="video" value="{{ $metier->video }}">
			</div>
			<div class="form-group">
				<label for="pre_requis">Pré-requis</label>
				<textarea class="form-control" id="pre_requis" name="pre_requis" rows="5">{{ $metier->pre_requis }}</textarea>
			</div>
		</div>
	</div>
	<div class="row justify-content-sm-center">
		<button type="submit" class="btn btn-primary">Envoyer</button>
		<a class="btn btn-danger ml-2" href="{{ route('admin_metiers') }}" role="button">Annuler</a>
	</div>
</form>
<br> @endsection
