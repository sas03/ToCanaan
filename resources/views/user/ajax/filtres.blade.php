<div class="row row-filtres-keywords">
  <div class="col-lg-12">

    <div class="card mb-4 bg-light-jaune custom-card filtres-card filtres-keywords-card">
      <div class="card-body">
        {{-- <h4 class="card-title bg-jaune">Compétences</h4> --}}

        <form method="post" action="{{ route('process_keywords') }}" class="box-form-search card-text">
          {{ csrf_field() }}

          <div class="row row-filtres">

            <div class="col-lg-4 mb-4">

              <h5>Savoirs / Savoir-faire :</h5>
              <hr class="bg-jaune">


              <div class="box-filtres-checkbox">
                @if (count($savoirs) > 0)
                  @foreach ($savoirs as $savoir)

                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input position-static" type="checkbox" value="{{ $savoir->id }}" name="savoir[]"
                        @if ($keywords != null && in_array($savoir->id, $keywords)) checked @endif > {{ ucfirst($savoir->nom) }}
                      </label>
                    </div>
                    <br>

                  @endforeach
                @endif
              </div>

              <hr class="bg-jaune last-hr">

              <p>Filtres temporaires :</p>


              <div class="box-filtres-checkbox-added">
                @if (!empty($savoirsAdded))

                  @foreach ($savoirsAdded as $keyword)
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input form-check-input-added position-static" type="checkbox" value="{{ $keyword }}" name="savoir_added[]"
                          @if ($savoirsAddedChecked != null && in_array($keyword, $savoirsAddedChecked)) checked @endif> {{ $keyword }}
                        <a href="#" class="btn-add-to-resume" title="Ajouter à votre CV" filtre-type="savoir"><i class="icon ion-arrow-up-a"></i></a>
                        <a href="#" class="btn-delete-filtre-added" title="Supprimer"><i class="icon ion-close"></i></a>
                      </label>
                    </div>
                    <br>
                  @endforeach

                @endif
              </div>

              <div class="form-check form-check-inline form-check-add-filtre">
                <input type="text" name="new_filter" id="autocomplete-savoirs-filtres" value="" placeholder="Ajouter un filtre">
                <button type="button" name="button" class="btn bg-jaune btn-add-filtre" filtre-type="savoir">+</button>
              </div>

            </div>



            <div class="col-lg-4 mb-4">

              <h5>Savoir-être :</h5>
              <hr class="bg-jaune">

              <div class="box-filtres-checkbox">

                @if (count($savoirEtre) > 0)
                  @foreach ($savoirEtre as $savoirE)

                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input position-static" type="checkbox" value="{{ $savoirE->id }}" name="savoirEtre[]"
                        @if ($keywords != null && in_array($savoirE->id, $keywords)) checked @endif > {{ ucfirst($savoirE->nom) }}
                      </label>
                    </div>
                    <br>

                  @endforeach
                @endif

              </div>

              <hr class="bg-jaune last-hr">

              <p>Filtres temporaires :</p>


              <div class="box-filtres-checkbox-added">
                @if (!empty($savoirEtreAdded))

                  @foreach ($savoirEtreAdded as $keyword)
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input form-check-input-added position-static" type="checkbox" value="{{ $keyword }}" name="savoirEtre_added[]"
                        @if ($savoirEtreAddedChecked!= null && in_array($keyword, $savoirEtreAddedChecked)) checked @endif> {{ $keyword }}
                        <a href="#" class="btn-add-to-resume" title="Ajouter à votre CV" filtre-type="savoirEtre"><i class="icon ion-arrow-up-a"></i></a>
                        <a href="#" class="btn-delete-filtre-added" title="Supprimer"><i class="icon ion-close"></i></a>
                      </label>
                    </div>
                    <br>
                  @endforeach

                @endif
              </div>


              <div class="form-check form-check-inline form-check-add-filtre">
                <input type="text" name="new_filter" id="autocomplete-savoir-etre-filtres" value="" placeholder="Ajouter un filtre">
                <button type="button" name="button" class="btn bg-jaune btn-add-filtre" filtre-type="savoirEtre">+</button>
              </div>

            </div>




            <div class="col-lg-4 mb-4">

              <h5>Battements de coeur :</h5>
              <hr class="bg-jaune">

              <div class="box-filtres-checkbox">

                @if (count($motivations) > 0)
                  @foreach ($motivations as $motivation)

                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input position-static" type="checkbox" value="{{ $motivation->id }}" name="motivation[]"
                        @if ($keywords != null && in_array($motivation->id, $keywords)) checked @endif > {{ ucfirst($motivation->nom) }}
                      </label>
                    </div>
                    <br>

                  @endforeach
                @endif

              </div>

              <hr class="bg-jaune last-hr">

              <p>Filtres temporaires :</p>


              <div class="box-filtres-checkbox-added">
                @if (!empty($motivationsAdded))

                  @foreach ($motivationsAdded as $keyword)
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input form-check-input-added position-static" type="checkbox" value="{{ $keyword }}" name="motivation_added[]"
                        @if ($motivationsAddedChecked != null && in_array($keyword, $motivationsAddedChecked)) checked @endif> {{ $keyword }}
                        <a href="#" class="btn-add-to-resume" title="Ajouter à votre CV" filtre-type="motivation"><i class="icon ion-arrow-up-a"></i></a>
                        <a href="#" class="btn-delete-filtre-added" title="Supprimer"><i class="icon ion-close"></i></a>
                      </label>
                    </div>
                    <br>
                  @endforeach

                @endif
              </div>

              <div class="form-check form-check-inline form-check-add-filtre">
                <input type="text" name="new_filter" id="autocomplete-motivations-filtres" value="" placeholder="Ajouter un filtre">
                <button type="button" name="button" class="btn bg-jaune btn-add-filtre" filtre-type="motivation">+</button>
              </div>

            </div>

          </div> {{-- Fin du row des filtres--}}

          <button type="submit" name="button" class="btn bg-jaune btn-filtrer-competences">CHERCHER</button>
        </form>

      </div>
    </div>

  </div>
</div>
