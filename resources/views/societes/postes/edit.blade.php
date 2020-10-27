@extends('layouts.master') @section('title', 'Modifier le poste ' . $poste->nom)

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Modifier le poste {{ $poste->nom }}</h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')

  <div class="row justify-content-between">
    <div class="col-md-4">
      <a class="btn btn-default" href="{{ route('add_poste') }}" role="button">Ajouter un autre poste</a>
      <a class="btn btn-default" href="{{ route('edit_service_poste', ['id' => $poste->id]) }}" role="button">Ajouter ce poste à un service</a>
      <a class="btn btn-default" href="{{ route('edit_employe_poste', ['id' => $poste->id]) }}" role="button">Attribuer ce poste à un employé</a>
      <a class="btn btn-default" href="{{ route('edit_competences_poste', ['id' => $poste->id]) }}" role="button">Définir les compétences</a>
      {{-- <a class="btn btn-default" href="{{ route('edit_savoirs_poste', ['id' => $poste->id]) }}" role="button">Définir les savoirs requis</a>
      <a class="btn btn-default" href="{{ route('edit_savoir_faire_poste', ['id' => $poste->id]) }}" role="button">Définir les savoirs requis</a>
      <a class="btn btn-default" href="{{ route('edit_savoir_etre_poste', ['id' => $poste->id]) }}" role="button">Définir les savoir-être requis</a> --}}
      <a class="btn btn-default" href="{{ route('fiche_poste', ['id' => $poste->id]) }}" role="button">Voir la fiche de ce poste</a>
      <a class="btn btn-default" href="{{ route('societe_index') }}" role="button">Retourner au dashboard de l'entreprise</a>
    </div>

    <div class="col-md-7 box-form box-form-societe">

      <h5>MODIFICATION DU POSTE</h5>
      <hr class="bg-vert trait-sous-titre">
      <i class="icon ion-arrow-down-b text-vert"></i>

      {{-- DIV pour afficher les erreurs --}}
      <div class="form-errors"> <ul></ul></div>

      <form class="form-horizontal" id='form-edit-poste' url-action="{{ route('update_poste', ['id' => $poste->id]) }}">
        {{ csrf_field() }}

        <input type="hidden" class="form-control" name="societe_id" value="{{ Auth::guard('web_societe')->user()->id }}" required>

        <div class="form-group form-group-nom">
          <label for="nom" class="control-label">Intitulé du poste *</label>
          <input type="text" class="form-control" name="nom" value="{{ $poste->nom }}" required autofocus>
        </div>

        <div class="form-group form-group-description">
          <label for="description" class="control-label">Description du poste</label>
          <textarea class="form-control" rows="3" name="description" value="{{ $poste->description }}">{{ $poste->description }}</textarea>
        </div>
    </form>

    <a href="" class="btn-form bg-vert" id="edit-poste">ENREGISTRER LES MODIFICATIONS</a>

  </div>
</div>


@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      $('#edit-poste').click(function(e){
        e.preventDefault();

        // si le poste n'a pas encore été sauvegardé
        if (!$(this).hasClass('saved')) {
          $('.form-errors ul').html('');

          let url = $('#form-edit-poste').attr('url-action');
          let data = $('#form-edit-poste').serialize();
          editPoste(url, data);
        }
      });

    });

</script>
@endsection
