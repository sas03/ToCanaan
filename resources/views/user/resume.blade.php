@extends('layouts.master') @section('title', 'Complétez votre CV' )

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Complétez votre CV</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('main_sous_menu')
  <div class="container">
    <div class="row row-sous-menu-fiche">
      <div class="col-lg-12">
        <ul>
          <li><a href="{{ route('user_index') }}" class="" title="Revenir au dashboard"><i class="icon ion-ios-home"></i></a></li>
          <li><a href="#resume-experiences" class="sous-menu-link text-uppercase">Expériences professionnelles</a></li>
          <li><a href="#resume-formations" class="sous-menu-link text-uppercase">Formations</a></li>
          <li><a href="#resume-centres" class="sous-menu-link text-uppercase">Centres d'intérêt</a></li>
          <li><a href="#resume-competences" class="sous-menu-link text-uppercase">Compétences</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('content')

{{----------------------- EXPERIENCES PROFESSIONNELLES -----------------------}}

<div class="row" id="resume-experiences">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-violet custom-card resume-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">
          Experiences professionnelles
          <a href="#" class="text-uppercase link-add-item-resume" type="button" name="button" data-toggle="modal" data-target="#modal-resume" resume-type="experience" title="Ajouter une expérience professionnelle"><i class="icon ion-plus-round"></i></a>
        </h4>

        @if (count($experiences) > 0)

          <div class="card-text">
            @foreach ($experiences as $experience)

              <div class="resume-data">
                <div class="resume-logo">
                  <img src="{{ asset('img/experience_default.png') }}" alt="Logo {{ $experience->etablissement_nom }}">
                </div>

                <p><strong class="resume-nom text-uppercase">{{ $experience->nom }}</strong></p>
                <p class="resume-etablissement text-uppercase">{{ $experience->etablissement_nom }}</p>
                <p class="resume-ville"><em>{{ $experience->ville }} - FRANCE</em></p>
                <p class="resume-date" date-debut="{{ $experience->date_debut }}" date-fin="{{ $experience->date_fin }}">
                  {{ date("M Y", strtotime($experience->date_debut)) }} -
                  @if ($experience->poste_actuel == 'oui')
                    Aujourd'hui
                  @else
                    {{ date("M Y", strtotime($experience->date_fin)) }}
                  @endif
                </p>

                <p class="resume-description"><?php echo nl2br("$experience->description"); ?></p>

                <a href="#" class="resume-edit" type="button" name="button" data-toggle="modal" data-target="#modal-edit-exp-{{ $experience->id }}" title="Modifier cette expérience professionnelle"><i class="icon ion-edit"></i></a>
              </div>

              @if (!$loop->last)
                <hr class="bg-vert">
              @endif


              <!-- Template de la Modal pour éditer une expérience -->
              <div class="modal modal-custom" id="modal-edit-exp-{{ $experience->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">

                  <div class="modal-header">
                    <h5 class="modal-title">EXPERIENCE PROFESSIONNELLE</h5>
                    <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-content">
                    <div class="modal-body box-form">
                      <form action="{{ route('user_edit_resume') }}" class="form-resume" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $experience->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group form-group-nom">
                          <label for="nom">Intitulé du poste *</label>
                          <input type="text" class="form-control" name="nom" value="{{ $experience->nom }}" required>
                        </div>

                        <div class="form-group form-group-etablissement">
                          <label for="etablissement_nom">Entreprise</label>
                          <input type="text" class="form-control" name="etablissement_nom" value="{{ $experience->etablissement_nom }}" required>
                        </div>

                        <div class="form-group">
                          <label for="ville">Lieu</label>
                          <input type="text" class="form-control" name="ville" value="{{ $experience->ville }}">
                        </div>

                        <div class="form-group">
                          <label for="date_debut">Début</label>
                          <input type="date" class="form-control" name="date_debut" value="{{ $experience->date_debut }}">
                        </div>

                        <div class="form-group">
                          <label for="date_fin">Fin</label>
                          <input type="date" class="form-control" name="date_fin" value="{{ $experience->date_fin }}">
                        </div>

                        <div class="form-group form-group-description">
                          <label for="description">Tâches</label>
                          <textarea class="form-control" rows="5" name="description">{{ $experience->description }}</textarea>
                        </div>

                        <div class="form-group form-group-poste">
                          <label for="poste_actuel">Poste actuel</label>
                          <input type="checkbox" class="form-check-input" name="poste_actuel" value="oui" @if ($experience->poste_actuel == 'oui') checked @endif>
                        </div>

                        <p><i class="icon ion-trash-a"></i> <a href="{{ route('user_delete_resume', ['id' => $experience->id]) }}">Supprimer cette expérience</a></p>
                        <br>

                        <input type="submit" class="btn-form bg-jaune" value="ENREGISTRER">
                      </form>

                    </div>
                  </div>
                </div>
              </div>
              {{-- Fin de la modal --}}

            @endforeach
          </div>

        @endif
        {{-- Fin du if($experiences) --}}

      </div>
    </div>

  </div>

</div>


{{-------------------------------- FORMATIONS --------------------------------}}
<div class="row" id="resume-formations">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-violet custom-card resume-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">
          Formations
          <a href="#" class="text-uppercase link-add-item-resume"  type="button" name="button" data-toggle="modal" data-target="#modal-resume" resume-type="formation" title="Ajouter une formation"><i class="icon ion-plus-round"></i></a>
        </h4>

        @if (count($formations) > 0)

          <div class="card-text">
            @foreach ($formations as $formation)
              <div class="resume-data">
                <div class="resume-logo">
                  <img src="{{ asset('img/formation_default.png') }}" alt="Logo {{ $formation->etablissement_nom }}">
                </div>

                <p><strong class="resume-etablissement text-uppercase">{{ $formation->etablissement_nom }}</strong></p>
                <p class="resume-nom">{{ $formation->nom }}</p>
                <p class="resume-date" date-debut="{{ $formation->date_debut }}" date-fin="{{ $formation->date_fin }}">
                  {{ date("M Y", strtotime($formation->date_debut)) }} - {{ date("M Y", strtotime($formation->date_fin)) }}
                </p>
                <p class="resume-description"><?php echo nl2br("$formation->description"); ?></p>

                <a href="#" class="resume-edit" type="button" name="button" data-toggle="modal" data-target="#modal-edit-formation-{{ $formation->id }}" title="Modifier cette formation"><i class="icon ion-edit"></i></a>
              </div>

              @if (!$loop->last)
                <hr class="bg-rose">
              @endif




              <!-- Template de la Modal pour éditer une expérience -->
              <div class="modal modal-custom" id="modal-edit-formation-{{ $formation->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">

                  <div class="modal-header">
                    <h5 class="modal-title">FORMATION</h5>
                    <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-content">
                    <div class="modal-body box-form">
                      <form action="{{ route('user_edit_resume') }}" class="form-resume" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $formation->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group form-group-nom">
                          <label for="nom">Intitulé de la formation *</label>
                          <input type="text" class="form-control" name="nom" value="{{ $formation->nom }}" required>
                        </div>

                        <div class="form-group form-group-etablissement">
                          <label for="etablissement_nom">École</label>
                          <input type="text" class="form-control" name="etablissement_nom" value="{{ $formation->etablissement_nom }}" required>
                        </div>

                        <div class="form-group">
                          <label for="ville">Lieu</label>
                          <input type="text" class="form-control" name="ville" value="{{ $formation->ville }}">
                        </div>

                        <div class="form-group">
                          <label for="date_debut">Début</label>
                          <input type="date" class="form-control" name="date_debut" value="{{ $formation->date_debut }}">
                        </div>

                        <div class="form-group">
                          <label for="date_fin">Fin</label>
                          <input type="date" class="form-control" name="date_fin" value="{{ $formation->date_fin }}">
                        </div>

                        <div class="form-group form-group-description">
                          <label for="description">Description</label>
                          <textarea class="form-control" rows="5" name="description">{{ $formation->description }}</textarea>
                        </div>

                        <p><i class="icon ion-trash-a"></i> <a href="{{ route('user_delete_resume', ['id' => $formation->id]) }}">Supprimer cette formation</a></p>
                        <br>

                        <input type="submit" class="btn-form bg-jaune" value="ENREGISTRER">
                      </form>

                    </div>
                  </div>
                </div>
              </div>
              {{-- Fin de la modal --}}

            @endforeach
          </div>

        @endif
        {{-- Fin du if($formations) --}}

      </div>
    </div>

  </div>

</div>

{{-- CENTRES D'INTERET --}}
<div class="row" id="resume-centres">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-violet custom-card resume-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">
          Centres d'intérêt
          <a href="#" class="text-uppercase link-add-item-resume"  type="button" name="button" data-toggle="modal" data-target="#modal-resume" resume-type="centre" title="Ajouter un centre d'intérêt"><i class="icon ion-plus-round"></i></a>
        </h4>

        @if (count($centres) > 0)

          <div class="card-text">
            @foreach ($centres as $centre)
              <div class="resume-data resume-data-centre">
                <p><strong class="resume-nom text-uppercase">{{ $centre->nom }}</strong></p>

                <p class="resume-description"><?php echo nl2br("$centre->description"); ?></p>

                <a href="#" class="resume-edit" type="button" name="button" data-toggle="modal" data-target="#modal-edit-centre-{{ $centre->id }}" title="Modifier ce centre d'intérêt"><i class="icon ion-edit"></i></a>
              </div>

              @if (!$loop->last)
                <hr class="bg-jaune">
              @endif


              <!-- Template de la Modal pour éditer une expérience -->
              <div class="modal modal-custom" id="modal-edit-centre-{{ $centre->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">

                  <div class="modal-header">
                    <h5 class="modal-title">CENTRE D'INTÉRÊT</h5>
                    <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-content">
                    <div class="modal-body box-form">
                      <form action="{{ route('user_edit_resume') }}" class="form-resume" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $centre->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group form-group-nom">
                          <label for="nom">Intitulé du centre d'intérêt</label>
                          <input type="text" class="form-control" name="nom" value="{{ $centre->nom }}" required>
                        </div>

                        <div class="form-group form-group-description">
                          <label for="description">Informations supplémentaires</label>
                          <textarea class="form-control" rows="5" name="description">{{ $centre->description }}</textarea>
                        </div>

                        <p><i class="icon ion-trash-a"></i> <a href="{{ route('user_delete_resume', ['id' => $centre->id]) }}">Supprimer ce centre d'intérêt</a></p>
                        <br>

                        <input type="submit" class="btn-form bg-jaune" value="ENREGISTRER">
                      </form>

                    </div>
                  </div>
                </div>
              </div>
              {{-- Fin de la modal --}}

            @endforeach
          </div>

        @endif
        {{-- Fin du if($centres) --}}

      </div>
    </div>

  </div>

</div>



<!-- Template de la Modal pour ajouter une ligne au CV -->
<div class="modal modal-custom" id="modal-resume" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-header">
      <h5 class="modal-title modal-title-add"></h5>
      <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-content">
      <div class="modal-body box-form">
        <form action="{{ route('user_add_resume') }}" class="form-resume form-resume-add" method="post">
          {{ csrf_field() }}

          <input type="hidden" name="user_id" value="{{ $user->id }}">
          <input type="hidden" name="type" value="">

          <div class="form-group form-group-nom">
            <label for="nom"></label>
            <input type="text" class="form-control" name="nom" required>
          </div>

          <div class="form-group form-group-etablissement">
            <label for="etablissement_nom"></label>
            <input type="text" class="form-control" name="etablissement_nom">
          </div>

          <div class="form-group form-group-ville">
            <label for="ville">Lieu</label>
            <input type="text" class="form-control" name="ville">
          </div>

          <div class="form-group form-group-date-debut">
            <label for="date_debut">Début</label>
            <input type="date" class="form-control" name="date_debut">
          </div>

          <div class="form-group form-group-date-fin">
            <label for="date_fin">Fin</label>
            <input type="date" class="form-control" name="date_fin">
          </div>

          <div class="form-group form-group-description">
            <label for="description">Tâches</label>
            <textarea class="form-control" rows="5" name="description"></textarea>
          </div>

          <div class="form-group form-group-poste">
            <label for="poste_actuel">Poste actuel</label>
            <input type="checkbox" class="form-check-input" name="poste_actuel" value="oui">
          </div>

          <input type="submit" class="btn-form bg-jaune" value="ENREGISTRER">
        </form>

      </div>
    </div>
  </div>
</div>



{{-------------------------- SAVOIRS / SAVOIR-FAIRE --------------------------}}

<div class="row" id="resume-competences">

  <div class="col-lg-12">
    <div class="card mb-4 bg-light-violet custom-card resume-competences-card add-competences-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">
          Compétences - savoirs / savoir-faire
          <a href="#" class="text-uppercase link-add-item-resume" type="button" name="button" data-toggle="modal" data-target="#modal-resume-competences" resume-type="savoir" title="Ajouter vos savoirs">
            @if (count($savoirs) > 0)
              <i class="icon ion-edit"></i>
            @else
              <i class="icon ion-plus-round"></i>
            @endif
          </a>
        </h4>


        @if (count($savoirs) > 0)

          <div class="card-text">
            @foreach ($savoirs as $savoir)
              <button class="bg-jaune competence-in-box link-add-item-resume" type="button" name="button" data-toggle="modal" data-target="#modal-resume-competences" resume-type="savoir" title="Modifier ce savoir">{{ $savoir->nom }}</button>
            @endforeach
          </div>

        @endif
        {{-- Fin du if($keywords) --}}

      </div>
    </div>
  </div>

</div>
{{-- Fin du row compétences savoirs / savoir-faire --}}


{{------------------------------- SAVOIR-ÊTRE -------------------------------}}

<div class="row">

  <div class="col-lg-12">
    <div class="card mb-4 bg-light-violet custom-card resume-competences-card add-competences-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">
          Compétences - savoir-être
          <a href="#" class="text-uppercase link-add-item-resume" type="button" name="button" data-toggle="modal" data-target="#modal-resume-competences" resume-type="savoirEtre" title="Modifier vos savoir-être">
            @if (count($savoirEtre) > 0)
              <i class="icon ion-edit"></i>
            @else
              <i class="icon ion-plus-round"></i>
            @endif
          </a>
        </h4>


        @if (count($savoirEtre) > 0)

          <div class="card-text">
            @foreach ($savoirEtre as $savoirE)
              <button class="bg-jaune competence-in-box link-add-item-resume" type="button" name="button" data-toggle="modal" data-target="#modal-resume-competences" resume-type="savoirEtre" title="Modifier ce savoir-être">{{ $savoirE->nom }}</button>
            @endforeach
          </div>

        @endif
        {{-- Fin du if($keywords) --}}

      </div>
    </div>
  </div>

</div>
{{-- Fin du row compétences savoir-être--}}



{{------------------------------- MOTIVATIONS -------------------------------}}

<div class="row">

  <div class="col-lg-12">
    <div class="card mb-4 bg-light-violet custom-card resume-competences-card add-competences-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">
          BATTEMENTS DE COEUR
          <a href="#" class="text-uppercase link-add-item-resume" type="button" name="button" data-toggle="modal" data-target="#modal-resume-competences" resume-type="motivation" title="Modifier vos battements de coeur">
            @if (count($motivations) > 0)
              <i class="icon ion-edit"></i>
            @else
              <i class="icon ion-plus-round"></i>
            @endif
          </a>
        </h4>


        @if (count($motivations) > 0)

          <div class="card-text">
            @foreach ($motivations as $motivation)
              <button class="bg-jaune competence-in-box link-add-item-resume" type="button" name="button" data-toggle="modal" data-target="#modal-resume-competences" resume-type="motivation" title="Modifier ce battement de coeur">{{ $motivation->nom }}</button>
            @endforeach
          </div>

        @endif
        {{-- Fin du if($keywords) --}}

      </div>
    </div>
  </div>

</div>
{{-- Fin du row motivations --}}



<!-- Template de la Modal pour ajouter une compétence -->
<div class="modal modal-custom" id="modal-resume-competences" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-header">
      <h5 class="modal-title"></h5>
      <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-content">
      <div class="modal-body box-form">
        <form class="form-resume form-resume-add-competences" method="post">
          {{ csrf_field() }}

          <input type="hidden" name="type" value="">
          <input type="hidden" name="user_id" value="{{ $user->id }}">

          <div class="form-group form-group-nom row">
            <input type="text" class="form-control col-lg-11 col-md-11" name="nom" id="autocomplete-competences-user" value="" placeholder="Ajouter une compétence">
            <button type="button" name="button" class="bg-jaune col-lg-1 col-md-1 btn-add-competence-user"><i class="icon ion-plus-round"></i></button>
          </div>

          <hr class="bg-jaune">

          <div class="form-group-competences-added">
            <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span>
          </div>


          <input type="submit" class="btn-form bg-jaune btn-validate-competence-user" value="VALIDER">
        </form>

      </div>
    </div>
  </div>
</div>
{{-- Fin de la modal --}}

<div class="spacer"></div>

@endsection


@section('javascript')
  <script type="text/javascript">

    $(function () {

      /************************ EVENT SUR LE BOUTON + ************************/

      $('.btn-add-competence-user').click(function(e){
        e.preventDefault();

        let append = $('.form-group-competences-added');
        let competence = $('.form-resume-add-competences input[name=nom]').val();
        let competences_added = [];

        $('.competence-added').each(function(k, v){
          competences_added.push($.trim($(v).text()));
        });

        if (competence != '' && $.inArray(competence, competences_added) < 0) {
          append.append('<button class="bg-jaune competence-added"> <i class="ion ion-close"></i> '+ competence +'</button>');
        }

        $('.form-resume-add-competences input[name=nom]').val('');
      });


      /********** SUPPRIMER UNE COMPÉTENCE À L'INTÉRIEUR DE LA MODAL **********/

      $('body').on('click', '.competence-added', function(e){
        e.preventDefault();

        $(this).fadeOut();
        $(this).remove();
      });


      /************* EVENT BOUTON POUR "VALIDER" LES COMPETENCES *************/
      let token = "{{ csrf_token() }}";
      let urlEdit = "{{ route('user_add_competences') }}";
      let redirectUrl = "{{ route('user_resume') }}";

      $('.btn-validate-competence-user').click(function(e){
        e.preventDefault();

        let competences = [];
        let type = $('.form-resume-add-competences input[name=type]').val();

        $('.competence-added').each(function(k, v){
          competences.push($.trim($(v).text()));
        });

        editCompetences(urlEdit, token, competences, type, redirectUrl);
      });


      let target = $('#autocomplete-competences-user');

      $('.link-add-item-resume').click(function(e){
        e.preventDefault();

        $('.form-resume-add input[type=text]').val('');
        $('.form-resume-add input[type=description]').val('');
        $('.form-resume-add input[type=date]').val('');

        let type = $(this).attr('resume-type');

        if (type == "experience") {
          $('.modal-title-add').text('EXPÉRIENCE PROFESSIONNELLE');
          $('.form-resume-add input[name=type]').val('experience professionnelle');
          $('.form-resume-add .form-group-nom label').text('Intitulé du poste *');
          $('.form-resume-add .form-group-etablissement label').text('Entreprise');
          $('.form-resume-add .form-group-description label').text('Tâches');
          $('.form-resume-add .form-group-etablissement').show();
          $('.form-resume-add .form-group-ville').show();
          $('.form-resume-add .form-group-date-debut').show();
          $('.form-resume-add .form-group-date-fin').show();
          $('.form-resume-add .form-group-poste').show();
        }

        if (type == "formation") {
          $('.modal-title-add').text('FORMATION');
          $('.form-resume-add input[name=type]').val('formation');
          $('.form-resume-add .form-group-nom label').text('Intitulé de la formation *');
          $('.form-resume-add .form-group-etablissement label').text('École');
          $('.form-resume-add .form-group-etablissement').show();
          $('.form-resume-add .form-group-ville').show();
          $('.form-resume-add .form-group-date-debut').show();
          $('.form-resume-add .form-group-date-fin').show();
          $('.form-resume-add .form-group-poste').hide();
        }

        if (type == "centre") {
          $('.modal-title-add').text('CENTRE D\'INTÉRÊT');
          $('.form-resume-add input[name=type]').val('centre interet');
          $('.form-resume-add .form-group-nom label').text('Intitulé du centre d\'intérêt *');
          $('.form-resume-add .form-group-description label').text('Informations supplémentaires');
          $('.form-resume-add .form-group-etablissement').hide();
          $('.form-resume-add .form-group-ville').hide();
          $('.form-resume-add .form-group-date-debut').hide();
          $('.form-resume-add .form-group-date-fin').hide();
          $('.form-resume-add .form-group-poste').hide();
        }

        if (type == "savoir") {
          $('.modal-title').text('COMPÉTENCES SAVOIRS / SAVOIR-FAIRE');
          $('.form-resume-add-competences input[name=type]').val('savoir');

          loadCompetencesInModal(type);
          autocomplete(target, "{{ route('autocomplete_savoirs_and_savoir_faire') }}");
        }

        if (type == "savoirEtre") {
          $('.modal-title').text('COMPÉTENCES SAVOIR-ÊTRE');
          $('.form-resume-add-competences input[name=type]').val('savoirEtre');

          loadCompetencesInModal(type);
          autocomplete(target, "{{ route('autocomplete_savoir_etre') }}");
        }

        if (type == "motivation") {
          $('.modal-title').text('BATTEMENTS DE COEUR');
          $('.form-resume-add-competences input[name=type]').val('motivation');

          loadCompetencesInModal(type);
          autocomplete(target, "{{ route('autocomplete_motivations') }}");
        }

      });

  });

</script>
@endsection
