$(function () {

// Si des formations sont déjà sélectionnées, on remplit, au préalable, les input correspondant dans le formulaire d'enregistrement du parcours
  let selectedGlobal = $('.liste-formations').find('.selected');
  let niveauGlobal;
  let inputGlobal;

  // Pour chaque élément déjà sélectionné
  $.each(selectedGlobal, function(k, v) {
    // on récupère le niveau correspondant
    niveauGlobal = $(v).parent().parent().parent().parent().attr('id').slice(6);

    // on récupère l'id du tooltip correpondant
    inputGlobal = '#parcours-save-' + niveauGlobal;

    if(niveauGlobal == 'cap' || niveauGlobal == 'brevetPro') {
      inputGlobal = '#parcours-save-bac_moins_1';
    }

    if(niveauGlobal == 'bacGeneral' || niveauGlobal == 'bacPro') {
      inputGlobal = '#parcours-save-bac';
    }

    if(niveauGlobal == 'licences' || niveauGlobal == 'licencesPro') {
      inputGlobal = '#parcours-save-bacPlus3';
    }

    if(niveauGlobal == 'masters' || niveauGlobal == 'mastersPro' || niveauGlobal == 'diplomesEcole') {
      inputGlobal = '#parcours-save-bacPlus5';
    }

    if(niveauGlobal == 'ApresBacPlus4' || niveauGlobal == '3Cycle' || niveauGlobal == 'bacPlus6') {
      inputGlobal = '#parcours-save-bacPlus6';
    }

    // on remplit le tooltip avec les informations de la formation correpondante
    $(inputGlobal).val($(v).text());
    $(inputGlobal).next().val($(v).attr('dbId'));
    $(inputGlobal).next().next().val($(v).parent().parent().parent().parent().attr('id').slice(6));
  });


/****************************** SECTION TOOLTIP ******************************/

  /* dans le parcours, lorsqu'on clique sur un point (= circle) ou
     sur le texte à l'intérieur du point (= .svg-count) */
  $('circle, .svg-count').on('click', function(e){

    let niveau = $(this).attr('niveau');
    let circleId = '#circle-' + niveau;
    let textId = '#text-' + niveau;
    let tooltipId = '#tooltip-' + niveau;
    let count = parseInt($(textId).text()); // nombre de formations qui est écrit dans le rond

    // on affiche le tooltip s'il y a des formations OU si c'est la dernière formation (cas possible seulement sur les fiches formations)
    if (count > 0 || $(this).attr('id') == 'circle-default') {

      // si le tooltip sélectionne est déjà ouvert
      if($(tooltipId).is(':visible')) {
        // on le cache
        $(tooltipId).hide();
      }
      // sinon
      else {
        // on cache tous les autres tooltip (potentiellement ouverts)
        $('.tooltip-card').hide();
        // on affiche le tooltip sélectionné
        $(tooltipId).show();
      }

      // on ajoute le tooltip après la div ".card-svg"
      $(tooltipId).appendTo('.card-svg');
    }

    // on paramètre l'emplacement du tooltip grâce aux coordonnées du point sur lequel on clique
    // ATTENTION : Il y a un problème en version mobile, le tooltip ne se place pas bien
    let x = parseInt($(this).attr('cx')) - 125;
    let y = parseInt($(this).attr('cy')) + 25;

    // on attribue les coordonnées au tooltip
    $(tooltipId).css({
      'top': y,
      'left': x
    });

/************************ EVENTS INTERIEUR DU TOOLTIP ************************/

    let listeId = '#liste-' + niveau; // id de la liste à afficher
    let liste = $(listeId).find('.lien-formation'); // on sélectionne les éléments de la liste (les <li>)

    let link = $(tooltipId).find('.tooltip-link-formation'); // lien <a> du tooltip sélectionné
    let url = $(liste).eq(0).attr('href'); // href du 1er lien de la liste

    let total = $(tooltipId + ' .total'); // nombre total de formations
    let compteur = $(tooltipId + ' .i'); // numéro de la page

    let selected = $(listeId).find('.selected');

    if ($(liste).hasClass('last-formation')) {
      $(tooltipId + ' .tooltip-bloc-icons').hide();
    }

    // on initialise le sélecteur de la flèche droite du tooltip sélectionné
    let rightArrow = tooltipId + ' .ion-arrow-right-b';
    // on initialise le sélecteur de la flèche gauche du tooltip sélectionné
    let leftArrow = tooltipId + ' .ion-arrow-left-b';

    // si aucune formation n'a été sélectionnée
    if($(selected).length == 0) {

      // on itinialise le premier lien
      $(link).text($(liste).eq(0).text());
      $(link).attr('href', url);
      $(compteur).text('1');

    }
    // sinon
    else {
      // on récupère les infos de la formation sélectionnée
      $(link).text($(selected).text());
      $(link).attr('href', $(selected).attr('href'));
      $(compteur).text($(selected).parent().prev().text());

      // on applique les différents styles aux icônes du tooltip
      $(selected).parent().next().children('.btn-pin').addClass('btn-warning');
      $(tooltipId).children().children('.btn-pin-tooltip').addClass('text-jaune');
      $(leftArrow).css({'pointer-events': 'none', 'opacity': '0.2'});
      $(rightArrow).css({'pointer-events': 'none', 'opacity': '0.2'});
    }

    // on ajoute le nombre total de formations dans le span .total du tooltip sélectionné
    $(total).text(count);

    let i = $(compteur).text();


/**************************** EVENT FLECHE DROITE ****************************/

    // lorque l'on clique sur la flèche qui pointe vers le bas
    $(rightArrow).off().on('click', function(){

      /* on vérifie que l'utilisateur est pas connecté
         s'il ne l'est pas, il ne peut pas cliquer */
      if (!$(this).parent().hasClass('tooltip-bloc-icons-disabled')) {

        // si i est inférieur ou égal au nombre de formations
        if(i <= count) {
          $(link).text($(liste).eq(i).text()); // on ajoute le texte dans le lien
          url = $(liste).eq(i).attr('href');

          i++;
        }

        // si i est supérieur au nombre de formations
        if(i > count) {
          $(link).text($(liste).eq(0).text());// on affiche la première formation
          url = $(liste).eq(0).attr('href');

          i = 1; // et on réinitinialise le i
        }

        $(link).attr('href', url);

        // le compteur se met à jour au fur et à mesure qu'on clique
        $(compteur).text(i);

        // on met à jour l'id des liens
        linkId = 'link-' + niveau + '-' + $(compteur).text();
        $(link).attr('id', linkId);

      }
    });

/**************************** EVENT FLECHE GAUCHE ****************************/

    // lorque l'on clique sur la flèche qui pointe vers le haut
    $(leftArrow).off().on('click', function(){

      if (!$(this).parent().hasClass('tooltip-bloc-icons-disabled')) {

        if(i => 1) {
          $(link).text($(liste).eq(i-2).text());
          url = $(liste).eq(i-2).attr('href');

          i--;
        }

        if(i < 1) {
          $(link).text($(liste).eq(count-1).text()); // on affiche la dernière formation
          url = $(liste).eq(count-1).attr('href');

          i = count; // et on réinitinialise le i
        }

        // le compteur et le lien se met à jour au fur et à mesure qu'on clique
        $(link).attr('href', url);
        $(compteur).text(i);

        // on met à jour l'id des liens
        linkId = 'link-' + niveau + '-' + $(compteur).text();
        $(link).attr('id', linkId);

      }
    });

/**************************** EVENT BOUTON LISTE ****************************/

    $(tooltipId + ' .ion-navicon').click(function(){

      // si l'utilisateur est connecté
      if (!$(this).parent().hasClass('tooltip-bloc-icons-disabled')) {
        $('#modal-parcours').modal('show'); // on affiche la modal
        $(listeId).appendTo('#modal-parcours .modal-body'); // on ajoute la liste dans le corps de la modal
        $('.liste-formations').hide(); // on cache toutes les listes
        $(listeId).show(); // et on affiche seulement la liste demandée
      }

    });


/**************************** EVENT BOUTONS PIN ****************************/

    let formationNumber;
    let formationSelected;
    let firstPin = tooltipId + ' .btn-pin-tooltip';
    let secondPin = listeId + ' .btn-pin';
    let dbId;
    let input = '#parcours-save-' + niveau;
    let niveaux = [niveau];

    if(niveau == 'cap' || niveau == 'brevetPro') {
      input = '#parcours-save-bac_moins_1';
      niveaux = ['cap', 'brevetPro'];
    }

    if(niveau == 'bacGeneral' || niveau == 'bacPro') {
      input = '#parcours-save-bac';
      niveaux = ['bacGeneral', 'bacPro'];
    }

    if(niveau == 'licences' || niveau == 'licencesPro') {
      input = '#parcours-save-bacPlus3';
      niveaux = ['licences', 'licencesPro'];
    }

    if(niveau == 'masters' || niveau == 'mastersPro' || niveau == 'diplomesEcole') {
      input = '#parcours-save-bacPlus5';
      niveaux = ['masters', 'mastersPro', 'diplomesEcole'];
    }

    if(niveau == 'ApresBacPlus4' || niveau == '3Cycle' || niveau == 'bacPlus6') {
      input = '#parcours-save-bacPlus6';
      niveaux = ['ApresBacPlus4', '3Cycle', 'bacPlus6'];
    }

    $('.btn-pin-tooltip, .btn-pin').off().on('click', function(e){
        e.preventDefault();

        // si l'utilisateur est connecté
        if (!$(this).parent().hasClass('tooltip-bloc-icons-disabled')) {

          // si une formation est déjà sélectionnée
          if($(this).hasClass('btn-warning') || $(this).hasClass('text-jaune')) {

            // on remet les boutons, le cercle et les flèches à leur état initial
            $(liste).removeClass('selected');
            $(firstPin).removeClass('text-jaune');
            $(secondPin).removeClass('btn-warning');
            $(circleId).css('fill', 'white');
            $(textId).css('fill', 'black');
            $(leftArrow).css({'pointer-events': 'auto', 'opacity': '1'});
            $(rightArrow).css({'pointer-events': 'auto', 'opacity': '1'});
            $(input).val('');
            $(input).next().val('');
            $(input).next().next().val('');

            $.each(niveaux, function(k, v) {
              if(niveau != v) {
                $('#liste-' + v + ' .lien-formation').removeClass('selected');
              }
            });

          }
          // sinon, aucune formation n'a été sélectionnée
          else {

            // si on clique sur le PREMIER BOUTON PIN
            if($(this).hasClass('btn-pin-tooltip')) {

              if ($(selected).length == 1) {
                $(selected).removeClass('selected');
              }

              $(this).addClass('text-jaune');

              formationNumber = $(this).prevAll().eq(2).children('.i').text();
              formationSelected = $(tooltipId).find('.tooltip-link-formation');

              $.each($(listeId).find('.colNum'), function(k, v){
                if($(v).text() == formationNumber) {
                  $(v).next().children().addClass('selected');
                  $(v).nextAll().eq(1).children().addClass('btn-warning');

                  dbId = $(v).next().children().attr('dbid');
                }
              });
            }

            // si on clique sur le DEUXIEME BOUTON PIN (à l'intérieur de la modal)
            if($(this).hasClass('btn-pin')) {

              if ($(selected).length == 1) {
                $(selected).removeClass('selected');
              }

              $(secondPin).removeClass('btn-warning');
              $(this).addClass('btn-warning');
              $(firstPin).addClass('text-jaune');

              formationNumber = $(this).parent().prev().prev().text();
              formationSelected = $(this).parent().prev().children();

              if ($(formationSelected).length == 1) {
                $(liste).removeClass('selected');
              }
              // on ajoute la classe "selected" à l'élément de la liste qui a été sélectionné
              $(formationSelected).addClass('selected');

              $(link).text($(formationSelected).text());
              $(link).attr('href', $(formationSelected).attr('href'));

              $(compteur).text(formationNumber);
              i = formationNumber;

              dbId = $(formationSelected).attr('dbid');
            }

            // on change le style du cercle et des flèches
            $(circleId).css('fill', 'green');
            $(textId).css('fill', 'green');
            $(leftArrow).css({'pointer-events': 'none', 'opacity': '0.2'});
            $(rightArrow).css({'pointer-events': 'none', 'opacity': '0.2'});

            // ENREGISTREMENT DU PARCOURS --------------------------------------

            $(input).val($(formationSelected).text());
            $(input).next().val(dbId);
            $(input).next().next().val(niveau);

            $.each(niveaux, function(k, v) {
              if(niveau != v) {
                $('#liste-' + v + ' .lien-formation').removeClass('selected');
                $('#tooltip-'+ v +' .text-jaune').removeClass('text-jaune');
                $('#liste-'+ v +' .btn-warning').removeClass('btn-warning');
                $('#circle-'+ v).css('fill', 'white');
                $('#text-'+ v).css('fill', 'black');
                $('#tooltip-'+ v +' .ion-arrow-left-b').css({'pointer-events': 'auto', 'opacity': '1'});
                $('#tooltip-'+ v +' .ion-arrow-right-b').css({'pointer-events': 'auto', 'opacity': '1'});
              }
            });
        } // fin du else

      }
    });

/**************************** STOP PROPAGATION ****************************/

    e.stopPropagation();
    $(tooltipId).click(function(e){ e.stopPropagation(); });
    $('#modal-parcours').click(function(e){ e.stopPropagation(); });

  }); // Fin de l'event click sur le cercle

  $('html').click(function() {
    $('.tooltip-card').hide();
  });

})
