

/*****************************************************************************
 ************************** FONCTIONS AUTOCOMPLÉTION *************************
 *****************************************************************************/

// Autocomplétion pour les métiers et les formations
function autocomplete(target, url)
{
  target.autocomplete({

    source: function( request, response ) {

      $.get(url ,{term: request.term}, function(data){
          data = $.parseJSON(data).slice(0, 10); // on affiche seulement les 10 premiers résultats

          response($.map(data, function(object){
              // on met la première lettre en majuscule
              return object.nom[0].toUpperCase() + object.nom.substring(1);
          }));
        });

    },
    minLength: 3
  });
}





/* Autocomplétion pour les métiers, les formations et les établissements avec un
  paramètre supplémentaire (secteur, niveau d'étude ou type d'établissement) */
function autocompleteWithExtraParam(target, url, param)
{
  target.autocomplete({

    source: function( request, response ) {

      $.get(url ,{term: request.term, param: param}, function(data){
          data = $.parseJSON(data).slice(0, 10); // on affiche seulement les 10 premiers résultats

          response($.map(data, function(object){
              // on met la première lettre en majuscule
              return object.nom[0].toUpperCase() + object.nom.substring(1);
          }));
        });

    },
    minLength: 3
  });
}





// Autocomplétion pour les sociétés (services, postes, employés, compétences)
function autocompleteSociete(target, url)
{
  let proposition = "";

  target.autocomplete({

    source: function( request, response ) {

      $.get(url ,{term: request.term}, function(data){
          data = $.parseJSON(data);

          response($.map(data, function(object){
            if (object != null) {
              if (object.prenom) {
                proposition = object.prenom + ' ' + object.nom.toUpperCase();
              }
              else {
                proposition = object.nom;
              }

              return proposition;
            }
            else {
              return null;
            }
          }));
        });

    },
    minLength: 3
  });
}


/*****************************************************************************
 ******************************* FONCTIONS USER ******************************
 *****************************************************************************/


/**************************** PARCOURS ****************************/

// Charger les parcours de l'utilisateur
function loadParcours(parcours_id, script_tooltip) {
  $.ajax({
    url: '?parcours=' + parcours_id,
    type: "get",
    beforeSend: function()
    {
      $('.ajax-load').show();
    }
  })
  .done(function(data) {
    // on importe le script des tooltips
    $.getScript(script_tooltip);

    $('.ajax-load').hide();
    $("#parcours-user-load").html(data.parcours);
    $(".box-parcours-metier").html(data.metier);
    $(".box-parcours-formations").html(data.formations);

  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log('server not responding...');
  });
}

function editParcours(urlUpdate, token, selected, metierId)
{
  $.ajax({
    url: urlUpdate,
    type: "post",
    data: {
      "_token": token,
      "array": selected,
      "metier_id": metierId
    }
  })
  .done(function(data) {

    let parcours_id = data.id;

    loadParcours(parcours_id, script_tooltip);

    $('.parcours-update-link').text('PARCOURS ENREGISTRÉ !');

    window.setTimeout(function(){
      $('.parcours-update-link').text('ENREGISTRER CE PARCOURS');
    }, 2500);
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log(thrownError);
  });
}


/***************************** RESUME *****************************/

// Éditer (ajouter/supprimer) des compétences dans le CV
function editCompetences(url, token, competences, type, redirectUrl)
{
  $.ajax({
    url: url,
    type: "post",
    data: {
    "_token": token,
    "competences": competences,
    'type': type
    }
  })
  .done(function(data) {
    window.location.href = redirectUrl;
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log(thrownError);
  });
}

// Charger les compétences dans la modal
function loadCompetencesInModal(competence_type) {
  $.ajax({
    url: '?competence_type=' + competence_type,
    type: "get",
    beforeSend: function()
    {
      $('.ajax-load').show();
    }
  })
  .done(function(data) {
    $('ajaw-load').hide();

    $('.form-group-competences-added').html(data.view);
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    alert('server not responding...');
  });
}


/**************************** FILTRES ****************************/

// Ajuster la taille des blocs des filtres temporaires (espace user)
function setBoxHeight(box)
{
  box.css('min-height', 'auto');

  let array = [];

  box.each(function(k, v){
    array.push($(v).height());
  });

  let heightMax = Math.max.apply(Math,array);

  box.css('min-height', heightMax);
}


// Ajoute un filtre temporaire à la session
function addToSession(url, token, type, input)
{
  $.ajax({
     url: url,
     type: 'post',
     data: {
     "_token": token,
       type: type,
       value: input
     }
  });
}


// Supprime un filtre temporaire de la session
function deleteFromSession(url, token, type, input)
{
  $.ajax({
     url: url,
     type: 'post',
     data: {
     "_token": token,
       type: type,
       value: input
     }
  });
}


function addCompetenceToForme(urlAddToForme, urlDeleteFromSession, token, type, input, appendTo, parent, br)
{
  $.ajax({
    url: urlAddToForme,
    type: "post",
    data: {
    "_token": token,
    "type": type,
    "nom": input
    }
  })
  .done(function(data) {
    // on ajoute le filtre à la suite des filtres déjà enregistrées dans le FORME
    appendTo.append('<div class="form-check form-check-inline"><label class="form-check-label"><input class="form-check-input position-static" type="checkbox" value="'+ data.id +'" name="'+type+'[]" checked> '+ input +'</label></div><br>');

    // on supprime le filtre temporaire
    parent.remove();
    br.remove();

    // on ajuste la hauteur des box temporaires
    setBoxHeight($('.box-filtres-checkbox-added'));

    // on supprime le filtre temporaire de la session
    deleteFromSession(urlDeleteFromSession, token, type, input);
  })
  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log(thrownError);
  });
}


/* AFFICHAGE RESULTATS FILTRES */

/* Afficher premier niveau (= liste ou blocs secteur/niveaux) */
function showFirstLevelResults(category_nom) {
  $.ajax({
    url: "?category=" + category_nom,
    type: "get"
  })
  .done(function(data) {

    /* On ajoute la vue au bon endroit.
       Si l'utilisateur regarde directement les listes, on affiche
       la liste entière de métiers ou de formations.
       Si l'utilisateur cherche par "niveaux d'études" ou par "secteurs"
       on affiche les blocs. */
    $('.row-categories-keywords .col-lg-12').html(data.view);
    $('.row-listing-keywords .col-lg-12').html("");

    let top = $('.row-categories-keywords').offset().top - 50;

    // smooth scroll jusqu'aux résultats
    $('html, body').animate({
      scrollTop: top
    }, 1000);


    // si l'utilisateur cherche par "niveaux d'études" ou par "secteurs"
    // lorqu'il clique sur un bloc "niveau" ou un bloc "secteur"
    $('.link-keywords-search-by-category').click(function(e){
      e.preventDefault();

      let liste = $(this).attr('liste'); // metiers ou formations
      let category = $(this).attr('category');

      // on charge le "second niveau" des résultats = liste des métiers ou des formations
      showSecondLevelResults(liste, category);

    });

  })
  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log(thrownError);
  });
}


// Afficher la liste des formations ou des métiers
function showSecondLevelResults(liste, category)
{
  $.ajax({
    url: "?liste=" + liste + '&category=' + category,
    type: "get"
  })
  .done(function(data) {
    $('.row-listing-keywords .col-lg-12').html(data.view);

    let top = $('.row-listing-keywords').offset().top - 50;

    // smooth scroll jusqu'aux résultats
    $('html, body').animate({
      scrollTop: top
    }, 1000);
  })
  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log(thrownError);
  });
}



/*****************************************************************************
 ***************************** FONCTIONS MÉTIERS ****************************
 *****************************************************************************/

 // Enregistrer un nouveau parcours
 function addParcours(url, token, selected, metier_id)
 {
   $.ajax({
     url: url,
     type: "post",
     data: {
       "_token": token,
       "array": selected,
       "metier_id": metier_id
     }
   })
   .done(function(data) {
     console.log(data);

     $('.save-parcours').text('PARCOURS ENREGISTRÉ !');

     window.setTimeout(function(){
       $('.save-parcours').text('ENREGISTRER CE PARCOURS');
     }, 2500);
   })

   .fail(function(jqXHR, ajaxOptions, thrownError){
     console.log(thrownError);
   });
 }





 /* Charger les formations et les établissements lorsque l'utilisateur utilise
    les filtres */
 function loadMoreData(script_tooltip, page, statut, localisation, rythmes) {
   $.ajax({
     url: '?page=' + page + '&statut=' + statut + '&localisation=' + localisation + '&rythme=' + rythmes,
     type: "get",
     beforeSend: function()
     {
       $('.ajax-load').show();
     }
   })
   .done(function(data) {

     console.log('test');

     if(data.html == " "){
         $('.ajax-load').html("No more records found");
         return;
     }

     // on importe le script des tooltips
     $.getScript(script_tooltip);


     let numero_page = $('.page-num');

     $.each(numero_page, function(k, v){
       if (parseInt($(v).attr('num_page')) == page) {
         $('.page-num').removeClass('active');
         $(v).addClass('active');
       }
     });

     $('.pagination .i').text(page);
     $('.pagination .last-page').text(data.lastPage);
     $('.total').text(data.total);

     // on change le css des flèches en fonction de numéro de la page
     if (page <= 1) {
       $('#page-prev').css({'opacity': 0.2, 'cursor': 'default'});
       $('#page-first').css({'opacity': 0.2, 'cursor': 'default'});
     }
     else {
       $('#page-prev').css({'opacity': 1, 'cursor': 'pointer'});
       $('#page-first').css({'opacity': 1, 'cursor': 'pointer'});
     }

     if (page >= data.lastPage) {
       $('#page-next').css({'opacity': 0.2, 'cursor': 'default'});
       $('#page-last').css({'opacity': 0.2, 'cursor': 'default'});
     }
     else {
       $('#page-next').css({'opacity': 1, 'cursor': 'pointer'});
       $('#page-last').css({'opacity': 1, 'cursor': 'pointer'});
     }

     $('.ajax-load').hide();
     $("#etablissement-data").html(data.etablissements);
     $("#formations-data").html(data.formations);

   /********* AFFICHAGE DES FORMATIONS LIÉES À UN ÉTABLISSEMENT *********/
     $('.liste-etablissements-afficher').on('click', function(){
       let count = $(this).attr('count');
       let formations = $(this).parent().nextAll('tr:lt('+count+')');
       let fleche = $(this).children('i');

       $(formations).toggle();
       $(fleche).toggleClass('ion-arrow-up-b');
     });
   })

   .fail(function(jqXHR, ajaxOptions, thrownError){
     console.log('server not responding...');
   });
 }




 /*****************************************************************************
  **************************** FONCTIONS FORMATIONS ***************************
  *****************************************************************************/

  // Charger les établissements sur les fiches formations
  function loadEtablissements(page, statut, localisation) {
    $.ajax({
      url: '?page=' + page + '&statut=' + statut + '&localisation=' + localisation,
      type: "get",
      beforeSend: function()
      {
        $('.ajax-load').show();
      }
    })
    .done(function(data) {
      // on rempli la pagination
      $('.pagination .i').text(page);
      $('.pagination .last-page').text(data.lastPage);
      $('.total').text(data.total);

      // on change le css des flèches en fonction de numéro de la page
      if (page <= 1) {
        $('#page-prev').css({'opacity': 0.2, 'cursor': 'default'});
        $('#page-first').css({'opacity': 0.2, 'cursor': 'default'});
      }
      else {
        $('#page-prev').css({'opacity': 1, 'cursor': 'pointer'});
        $('#page-first').css({'opacity': 1, 'cursor': 'pointer'});
      }

      if (page >= data.lastPage) {
        $('#page-next').css({'opacity': 0.2, 'cursor': 'default'});
        $('#page-last').css({'opacity': 0.2, 'cursor': 'default'});
      }
      else {
        $('#page-next').css({'opacity': 1, 'cursor': 'pointer'});
        $('#page-last').css({'opacity': 1, 'cursor': 'pointer'});
      }

      // on cache le gif de chargement
      $('.ajax-load').hide();

      // on charge la liste des établissements au bon endroit
      $("#etablissements").html(data.etablissements);
    })

    .fail(function(jqXHR, ajaxOptions, thrownError){
      alert('server not responding...');
    });
  }



  /*****************************************************************************
   ***************************** FONCTIONS SOCIÉTÉ ****************************
   *****************************************************************************/


  /*************************** EMPLOYÉS ***************************/

  /* Mettre à jour les informations d'un employé */
  function updateEmploye(url, token, type, employe)
  {
    $.ajax({
      url: url,
      type: "post",
      data: {
      "_token": token,
      "type": type,
      "employe" : employe
      }
    })
    .done(function(data) {
      loadEmployes();
    })

    .fail(function(jqXHR, ajaxOptions, thrownError){
      alert('server not responding...');
    });
  }


  /* Charger tous les employés */
  function loadEmployes()
  {
    $.ajax({
      type: "get",
      beforeSend: function()
      {
        $('.ajax-load').show();
      }
    })
    .done(function(data) {
      $('.ajax-load').hide();
      $(".box-list-item-services").html(data.view_liste_employes);
      $(".list-employes").html(data.view_liste_employes_global);
    })

    .fail(function(jqXHR, ajaxOptions, thrownError){
      alert('server not responding...');
    });
  }


  /*************************** POSTES ***************************/

  /* Mettre à jour un poste */
  function editPoste(url, data)
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
          $('.form-errors ul').html('<li>• '+ v +'</li>')
        })
      }
      else {
        $('#edit-poste').text('MODIFICATIONS ENREGISTRÉES !');
        $('#edit-poste').addClass('saved');
        $('.btn-default').removeClass('btn-disabled');
        $('.form-errors').hide();
      }
    })

    .fail(function(jqXHR, ajaxOptions, thrownError){
      console.log(thrownError);
    });
  }


  /* Mettre à jour le service du poste */
  function updateServiceOfPoste(url, token, service, poste)
  {
    $.ajax({
      url: url,
      type: "post",
      data: {
      "_token": token,
      "service": service,
      'poste' : poste
      }
    })
    .done(function(data) {
      loadPostesInService();
    })

    .fail(function(jqXHR, ajaxOptions, thrownError){
      alert('server not responding...');
    });
  }

  /* Charger tous les postes du service */
  function loadPostesInService()
  {
    $.ajax({
      type: "get",
      beforeSend: function()
      {
        $('.ajax-load').show();
      }
    })
    .done(function(data) {
      $('.ajax-load').hide();
      $(".box-list-postes-services").html(data.view_liste_postes_service);
      $(".list-postes").html(data.view_liste_postes);
    })

    .fail(function(jqXHR, ajaxOptions, thrownError){
      alert('server not responding...');
    });
  }


  /************************* SERVICES *************************/
