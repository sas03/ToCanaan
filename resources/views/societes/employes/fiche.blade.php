@extends('layouts.master') @section('title', $employe->prenom . ' ' . mb_strtoupper($employe->nom ))

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
          {{ $employe->prenom }} {{ $employe->nom }}
          <a href="{{ route('edit_employe', ['id' => $employe->id]) }}" class="icon-edit-titre"><i class="icon ion-edit"></i></a>
        </h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

@if ($user)
  <div class="row">
    <div class="col-lg-6">

      <div class="card mb-4 bg-light-jaune custom-card card-description">
        <div class="card-body">
          <h4 class="card-title bg-jaune">Utilisateur</h4>
          <p class="card-text">
            @if ($user)
              <a href="{{ route('fiche_user', ['id' => $user->id]) }}">Voir son profil</a>
            @else
              Cet employé n'est pas inscrit sur notre site.
            @endif

          </p>
        </div>
      </div>
    </div>
  </div>

@endif

<div class="row">

  <div class="col-lg-6">

    <div class="card mb-4 bg-light-vert custom-card card-description">
      <div class="card-body">
        <h4 class="card-title bg-vert">Poste actuel</h4>
        <p class="card-text">
          @if ($poste)
            <a href="{{ route('fiche_poste', ['id' => $poste->id]) }}">{{ mb_strtoupper($poste->nom) }}</a>
          @else
            Cet employé n'occupe aucun poste.
          @endif

        </p>
      </div>
    </div>

  </div>

  <div class="col-lg-6">

    <div class="card mb-4 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Niveau d'études</h4>
        <p class="card-text">{{ mb_strtoupper($employe->niveau) }}</p>
      </div>
    </div>

  </div>

</div>

<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-rose custom-card card-description">
      <div class="card-body">
        <h4 class="card-title bg-rose">Savoirs</h4>
        @if (!$poste)
          <p class="card-text">Pour compléter les savoirs de cet employé, il faut d'abord lui attribuer un poste :
            <br><br>
            <a href="{{ route('edit_employe', ['id' => $employe->id]) }}" class="btn-link">ATTRIBUER UN POSTE À L'EMPLOYÉ</a>
            <a href="{{ route('add_poste') }}" class="btn-link">CRÉER UN NOUVEAU POSTE</a>
          </p>
        @elseif (count($savoirsPoste) == 0)
          <p class="card-text">Pour compléter les savoirs de cet employé, il faut d'abord définir les savoirs requises pour le poste qu'il occupe.
            <br><br>
            <a href="{{ route('edit_savoirs_poste', ['id' => $poste->id]) }}" class="btn-link">AJOUTER LES SAVOIRS DU POSTE <strong>{{ mb_strtoupper($poste->nom) }}</strong></a>
          </p>

        @elseif (count($savoirsBase) > 0 || count($savoirsSpe) > 0)

          <table class="table table-bordered table-recherche text-center table-competences-employe">
            <tbody>


              @foreach ($savoirsBase as $savoir)
                @if ($savoir->pivot->type == 'base')
                  @if ($loop->first)
                    <tr>
                      <th colspan="2">SAVOIRS DE BASE</th>
                    </tr>
                  @endif
                  <tr class="liste-recherche liste-savoir">
                    <td><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                    <td style="max-width:10px" class="competence-niveau-{{ $savoir->pivot->niveau }}"></td>
                  </tr>
                @endif
              @endforeach

              @foreach ($savoirsSpe as $savoir)
                @if ($savoir->pivot->type == 'spe')
                  @if ($loop->first)
                    <tr>
                      <th colspan="2">SAVOIRS SPÉCIFIQUES</th>
                    </tr>
                  @endif
                  <tr class="liste-recherche liste-savoir">
                    <td><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                    <td style="max-width:10px" class="competence-niveau-{{ $savoir->pivot->niveau }}"></td>
                  </tr>
                @endif
              @endforeach
            </tbody>
            <tr>
              <td colspan="2"><a href="{{ route('edit_savoirs_employe', ['id' => $employe->id]) }}">+ MODIFIER LES SAVOIRS DE CET EMPLOYÉ +</a></td>
            </tr>

          </table>
        @else
          <a href="{{ route('edit_savoirs_employe', ['id' => $employe->id]) }}" class="btn-form">+ AJOUTER LES SAVOIRS DE CET EMPLOYÉ +</a>
        @endif
      </div>

    </div>

  </div>

</div>



<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-rose custom-card card-description">
      <div class="card-body">
        <h4 class="card-title bg-rose">Savoir-faire</h4>
        @if (!$poste)
          <p class="card-text">Pour compléter les savoir-faire de cet employé, il faut d'abord lui attribuer un poste :
            <br><br>
            <a href="{{ route('edit_employe', ['id' => $employe->id]) }}" class="btn-link">ATTRIBUER UN POSTE À L'EMPLOYÉ</a>
            <a href="{{ route('add_poste') }}" class="btn-link">CRÉER UN NOUVEAU POSTE</a>
          </p>
        @elseif (count($savoirFairePoste) == 0)
          <p class="card-text">Pour compléter les savoir-faire de cet employé, il faut d'abord définir les savoir-faire requis pour le poste qu'il occupe.
            <br><br>
            <a href="{{ route('edit_savoir_faire_poste', ['id' => $poste->id]) }}" class="btn-link">AJOUTER LES SAVOIR-FAIRE DU POSTE <strong>{{ mb_strtoupper($poste->nom) }}</strong></a>
          </p>

        @elseif (count($savoirFaireBase) > 0 || count($savoirFaireSpe) > 0)

          <table class="table table-bordered table-recherche text-center table-competences-employe">
            <tbody>

              @foreach ($savoirFaireBase as $savoir)
                @if ($loop->first)
                  <tr>
                    <th colspan="2">SAVOIR-FAIRE DE BASE</th>
                  </tr>
                @endif
                <tr class="liste-recherche liste-savoir">
                  <td><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                  <td style='width:10px' class="competence-niveau-{{ $savoir->pivot->niveau }}"></td>
                </tr>
              @endforeach

              @foreach ($savoirFaireSpe as $savoir)
                @if ($loop->first)
                  <tr>
                    <th colspan="2">SAVOIR-FAIRE SPÉCIFIQUES</th>
                  </tr>
                @endif
                <tr class="liste-recherche liste-savoir">
                  <td><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                  <td style='width:10px' class="competence-niveau-{{ $savoir->pivot->niveau }}"></td>
                </tr>
              @endforeach

            </tbody>
            <tr>
              <td colspan="2"><a href="{{ route('edit_savoir_faire_employe', ['id' => $employe->id]) }}">+ MODIFIER LES SAVOIR-FAIRE DE CET EMPLOYÉ +</a></td>
            </tr>

          </table>
        @else
          <a href="{{ route('edit_savoir_faire_employe', ['id' => $employe->id]) }}" class="btn-form">+ AJOUTER LES SAVOIR-FAIRE DE CET EMPLOYÉ +</a>
        @endif
      </div>

    </div>

  </div>

</div>


<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-rose custom-card card-description">
      <div class="card-body">
        <h4 class="card-title bg-rose">Savoir-être</h4>
        @if (!$poste)
          <p class="card-text">Pour compléter les savoir-être de cet employé, il faut d'abord lui attribuer un poste :
            <br><br>
            <a href="{{ route('edit_employe', ['id' => $employe->id]) }}" class="btn-link">ATTRIBUER UN POSTE À L'EMPLOYÉ</a>
            <a href="{{ route('add_poste') }}" class="btn-link">CRÉER UN NOUVEAU POSTE</a>
          </p>
        @elseif (count($savoirEtrePoste) == 0)
          <p class="card-text">Pour compléter les savoir-être de cet employé, il faut d'abord définir les savoir-être requis pour le poste qu'il occupe.
            <br><br>
            <a href="{{ route('edit_savoir_etre_poste', ['id' => $poste->id]) }}" class="btn-link">AJOUTER LES SAVOIR-ÊTRE DU POSTE <strong>{{ mb_strtoupper($poste->nom) }}</strong></a>
          </p>

        @elseif (count($savoirEtre) > 0)

          <table class="table table-bordered table-recherche text-center table-competences-employe">
            <tbody>
              @foreach ($savoirEtre as $savoir)
                <tr class="liste-recherche liste-competence">
                  <td><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                  <td style='width:10px' class="competence-niveau-{{ $savoir->pivot->niveau }}"></td>
                </tr>
              @endforeach
            </tbody>
            <tr>
              <td colspan="2"><a href="{{ route('edit_savoir_etre_employe', ['id' => $employe->id]) }}">+ MODIFIER LES SAVOIR-ETRE DE CET EMPLOYÉ +</a></td>
            </tr>

          </table>
        @else
          <a href="{{ route('edit_savoir_etre_employe', ['id' => $employe->id]) }}" class="btn-form">+ AJOUTER LES SAVOIR-ÊTRE DE CET EMPLOYÉ +</a>
        @endif
      </div>

    </div>

  </div>

</div>

@endsection
