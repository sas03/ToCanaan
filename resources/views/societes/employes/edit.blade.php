@extends('layouts.master') @section('title', 'Editer les informations de ' . $employe->prenom . ' ' . mb_strtoupper($employe->nom) )


@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Modifier les informations de <strong>{{ $employe->prenom }} {{ $employe->nom }}</strong></h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

  <div class="row justify-content-between">
    <div class="col-md-4">
      <a class="btn btn-default" href="{{ route('add_employe') }}" role="button">Ajouter un autre employé</a>
      <a class="btn btn-default @if (count($savoirsPoste) < 1) btn-disabled @endif" href="{{ route('edit_savoirs_employe', ['id' => $employe->id]) }}" role="button">Définir ses savoirs</a>
      <a class="btn btn-default @if (count($savoirFairePoste) < 1) btn-disabled @endif" href="{{ route('edit_savoir_faire_employe', ['id' => $employe->id]) }}" role="button">Définir ses savoir-faire</a>
      <a class="btn btn-default @if (count($savoirEtrePoste) < 1) btn-disabled @endif" href="{{ route('edit_savoir_etre_employe', ['id' => $employe->id]) }}" role="button">Définir ses savoir-être</a>
      <a class="btn btn-default" href="{{ route('fiche_employe', ['id' => $employe->id]) }}" role="button">Voir la fiche de cet employé</a>

      <a class="btn btn-default" href="{{ route('societe_index') }}" role="button">Retourner au dashboard de l'entreprise</a>
    </div>

    <div class="col-md-7 box-form box-form-societe">

      <h5>MODIFIER LES INFORMATIONS DE L'EMPLOYÉ</h5>
      <hr class="bg-jaune trait-sous-titre">
      <i class="icon ion-arrow-down-b text-jaune"></i>

      {{-- DIV pour afficher les erreurs --}}
      <div class="form-errors"> <ul></ul></div>

      <form class="form-horizontal" id='form-edit-employe' url-action="{{ route('update_employe', ['id' => $employe->id]) }}">
          {{ csrf_field() }}

          <input type="hidden" class="form-control" name="service_id" value="" required>

          <div class="form-group">
            <label for="nom" class="control-label">Nom *</label>
            <input type="text" class="form-control" name="nom" value="{{ $employe->nom }}" required autofocus>
          </div>

          <div class="form-group">
            <label for="prenom" class="control-label">Prénom *</label>
            <input type="text" class="form-control" name="prenom" value="{{ $employe->prenom }}">
          </div>

          <div class="form-group">
              <label for="niveau" class="control-label">Niveau d'études *</label>
              <select class="form-control" name="niveau" id="exampleFormControlSelect1">
                <option value="">Veuillez choisir un niveau</option>
                <option value="brevet" @if ($employe->niveau == 'brever') selected  @endif>Brevet</option>
                <option value="cap ou équivalent" @if ($employe->niveau == 'cap ou équivalent') selected  @endif>CAP ou équivalent</option>
                <option value="bac ou équivalent" @if ($employe->niveau == 'bac ou équivalent') selected  @endif>BAC ou équivalent</option>
                <option value="bac + 1" @if ($employe->niveau == 'bac + 1') selected  @endif>BAC + 1</option>
                <option value="bac + 2" @if ($employe->niveau == 'bac + 2') selected  @endif>BAC + 2</option>
                <option value="bac + 3" @if ($employe->niveau == 'bac + 3') selected  @endif>BAC + 3</option>
                <option value="bac + 4" @if ($employe->niveau == 'bac + 4') selected  @endif>BAC + 4</option>
                <option value="bac + 5" @if ($employe->niveau == 'bac + 5') selected  @endif>BAC + 5</option>
                <option value="bac + 6" @if ($employe->niveau == 'bac + 6') selected  @endif>BAC + 6</option>
                <option value="bac + 7" @if ($employe->niveau == 'bac + 7') selected  @endif>BAC + 7</option>
                <option value="bac + 8" @if ($employe->niveau == 'bac + 8') selected  @endif>BAC + 8</option>
                <option value="bac + 9 et plus" @if ($employe->niveau == 'bac + 9 et plus') selected  @endif>BAC + 9 et plus</option>
              </select>
          </div>

          <div class="form-group">
            <label for="poste_id" class="control-label">Poste occupé *</label>
            <select class="form-control list-metiers" name="poste_id" required>
              <option value="" class="first-option">Veuillez choisir un poste</option>
              @foreach ($postes as $poste)
                <option value="{{ $poste->id }}" @if ($employe->poste_id == $poste->id) selected @endif>{{ ucfirst($poste->nom) }}</option>
              @endforeach
            </select>
          </div>
      </form>

      <a href="" class="btn-form bg-jaune" id="edit-employe">ENREGISTRER LES MODIFICATIONS</a>
  </div>
</div>

@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {
      //Autocomplétion
      $('.autocomplete-users').autocomplete({

        source: function(request, response) {
          $.get("{{ route('autocomplete_users') }}" ,{term: request.term}, function(data){
              data = $.parseJSON(data).slice(0, 10); // on affiche seulement les 10 premiers résultats

              response($.map(data, function(object){

                return object.nom;
              }));
            });
        },
        minLength: 3
      });



      /*************************** UPDATE EMPLOYE ***************************/
      $('#edit-employe').click(function(e){
        e.preventDefault();

        // si le service n'a pas encore été sauvegardé
        if (!$(this).hasClass('saved')) {
          /* on vide la div des erreurs à chaque fois que l'utilisateur clique
            sur le bouton */
          $('.form-errors ul').html('');

          let url = $('#form-edit-employe').attr('url-action');
          let data = $('#form-edit-employe').serialize();

          editEmploye(url, data);

        }
      });

      function editEmploye(url, data)
      {
        $.ajax({
          url: url,
          type: "post",
          data: data
        })
        .done(function(data) {
          // s'il y a des erreurs dans les champs saisis
          if (data.error) {

            $.each(data.error, function(k, v){
              $('.form-errors').show();
              $('.form-errors ul').append('<li>• '+ v +'</li>')
            })

          }
          else {
            $('#edit-employe').text('MODIFICATIONS ENREGISTRÉES !');
            $('#edit-employe').addClass('saved');
            $('.form-errors').hide();
          }
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }

    });

</script>
@endsection
