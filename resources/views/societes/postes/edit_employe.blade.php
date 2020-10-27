@extends('layouts.master') @section('title', 'Ajouter un service')

@section('content')

<div class="row">

  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">Modification du poste <strong>{{ $poste->nom }}</strong> </h4>
  </div>

</div>

<hr class="bg-violet trait-titre">

<div class="row justify-content-between">
  <div class="col-md-4">
    <a class="btn btn-default" href="{{ route('add_poste') }}" role="button">Ajouter un autre poste</a>
    <a class="btn btn-default" href="{{ route('edit_service_poste', ['id' => $poste->id]) }}" role="button">Ajouter ce poste à un service</a>
    <a class="btn btn-default" href="{{ route('edit_employe_poste', ['id' => $poste->id]) }}" role="button">Attribuer ce poste à un employé</a>
    <a class="btn btn-default" href="{{ route('edit_competences_poste', ['id' => $poste->id]) }}" role="button">Définir les compétences</a>
    <a class="btn btn-default" href="{{ route('fiche_poste', ['id' => $poste->id]) }}" role="button">Voir la fiche de ce poste</a>
    <a class="btn btn-default" href="{{ route('societe_index') }}" role="button">Retourner au dashboard de l'entreprise</a>

    <a class="btn btn-default" href="{{ route('societe_index') }}" role="button">Retourner au dashboard de l'entreprise</a>
  </div>

  <div class="col-md-7 box-form box-form-societe">

    <h5>AJOUT D'EMPLOYÉS</h5>
    <hr class="bg-jaune trait-sous-titre">
    <i class="icon ion-arrow-down-b text-jaune"></i>

    <p>Nouvel employé : <a href="{{ route('add_employe') }}" class="text-jaune">Ajouter un employé</a></p>

    <p>Employé existant :</p>

    <form class="form-horizontal"url-action="">
        {{ csrf_field() }}

        <input type="hidden" class="form-control" name="poste_id" value="{{ $poste->id }}" required>

        <div class="row row-add-item-service">
          <div class="form-group col-lg-11">
            <select class="form-control list-employes" name="employe">

            </select>
          </div>
          <div class="col-lg-1">
            <button type="button" class="btn-add" id="btn-add-employe-poste"><i class="icon ion-plus-round"></i></button>
          </div>
        </div>

        <span class="span-message"> <em></em> </span>
    </form>

    <div class="box-list-item-services box-list-employes-postes">
      <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span>
    </div>
  </div>
</div>


@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      let token = "{{ csrf_token() }}";

      loadEmployes();

      $('body').on('change', '.list-employes', function(){
        let poste_selected = $('.list-employes option:selected').attr('poste');

        if (poste_selected != '') {
          $('.span-message em').text('Attention cet employé occupe déjà un poste !');
        }
        else {
          $('.span-message em').text('');
        }
      });


      $('body').on('click', '#btn-add-employe-poste', function(){
        let url = "{{ route('update_employe_poste') }}";
        let poste = "{{ $poste->id }}";
        let employe = $(this).parent().prev().children().val();

        updateEmploye(url, token, poste, employe);
      });

      $('body').on('click', '#btn-delete-employe-poste', function(){
        let url = "{{ route('update_employe_poste') }}";
        let poste = "";
        let employe = $(this).attr('employe');

        updateEmploye(url, token, poste, employe);
      });

    });

</script>
@endsection
