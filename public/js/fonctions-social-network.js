// Charger les notifications
function loadNotifications()
{
  $.ajax({
    url: "?type=notifications",
    type: "get"
  })
  .done(function(data) {
    $('.dropdown-menu-notifications').html(data.view);
    $('.dropdown-notifications .badge').text(data.count);
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log('server not responding...');
  });
}


// Suivre un utilisateur
function followUser(url, token, targetId, groupe, topButton, buttonSelected, parent)
{
  $.ajax({
    url: url,
    type: "post",
    data: {
      "_token": token,
      "target_id": targetId,
      'groupe' : groupe
    }
  })
  .done(function(data) {

    // suivant le groupe on change le bouton
    if (data.groupe == 'pere') {
      topButton.text('Père');
    }
    if (data.groupe == 'fils') {
      topButton.text('Fils');
    }
    if (data.groupe == 'ami') {
      topButton.text('Ami');
    }
    if (data.groupe == 'concurrent') {
      topButton.text('Concurrent');
    }
    if (data.groupe == 'connexion') {
      topButton.text('Connexion divine');
    }

    // on change le style du bouton principal
    $('.btn-choose-groupe').addClass('bg-jaune');
    $('.btn-choose-groupe').removeClass('btn-choose-groupe-selected');
    buttonSelected.addClass('btn-choose-groupe-selected');
    buttonSelected.removeClass('bg-jaune');
    topButton.addClass('btn-choose-groupe-selected');
    topButton.removeClass('bg-jaune');

    // on cache le sous-menu
    parent.hide();
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    alert('server not responding...');
  });
}



// Ajouter un post
function addPost(url, data, page)
{
  $.ajax({
    url: url,
    type: "post",
    data: data
  })
  .done(function(data) {
    // si l'input n'est pas vide
    if (data.length !== 0) {
      loadPostsAdmin(page, '');

      $('.form-add-post textarea').val('');
    }
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    alert('server not responding...');
  });
}


// Charger les posts de l'utilisateur connecté
function loadPostsAdmin(page, type)
{
  $.ajax({
    url: "?type=posts&page=" + page,
    type: "get",
    beforeSend: function()
    {
      $('.box-ajax-load').show();
    }
  })
  .done(function(data) {
    $('.box-ajax-load').hide();

    // si l'utilisateur scroll
    if (type == 'append') {
      // on ajoute les posts à la suite des autres
      $(".import-posts").append(data.view);
    }
    // sinon (lorsque l'utilisateur ajoute un post)
    else {
      // on recharge la première page des posts
      $(".import-posts").html(data.view);
    }
    $('.stats-posts').text(data.nbr_of_posts);
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log('server not responding...');
  });
}


// Charger les posts sur le profil d'un utilisateur
function loadPostsOfUser(page)
{
  $.ajax({
    url: "?type=posts&page=" + page,
    type: "get",
    beforeSend: function()
    {
      $('.box-ajax-load').show();
    }
  })
  .done(function(data) {
    $('.box-ajax-load').hide();

    $(".import-posts").append(data.view);
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log('server not responding...');
  });
}



// Ajouter un commentaire

function addComment(url, data, post_id, box, compteur)
{
  $.ajax({
    url: url,
    type: "post",
    data: data
  })
  .done(function(data) {

    // si l'input n'est pas vide
    if (data.length !== 0) {
      // on vide le textarea
      $('.form-add-comment textarea').val('');

      // on recharge les commentaires
      loadComments(post_id, box, compteur);
    }
  })
  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log('server not responding...');
  });
}

// Charger les commentaires postés sur les posts de l'utilisateur
function loadComments(post_id, box, compteur)
{
  $.ajax({
    url: "?type=comments&post_id=" + post_id,
    type: "get",
    beforeSend: function()
    {
      $('.box-ajax-load').show();
    }
  })
  .done(function(data) {
    $('.box-ajax-load').hide();

    box.slideDown();
    box.html(data.view);

    compteur.text(data.count);
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log('server not responding...');
  });
}

// Aimer un post
function likePost(url, data, btn, compteur)
{
  $.ajax({
    url: url,
    type: "post",
    data: data
  })
  .done(function(data) {

    // si le post est déjà liké
    if (btn.hasClass('liked')) {
      // on l'"unlike"
      btn.removeClass('liked');

      // on retire 1 au compteur de likes
      compteur.text(parseInt(compteur.text()) - 1);
      $('.stats-likes').text(parseInt($('.stats-likes').text()) - 1);
    }
    // si le post n'est pas encore "liké"
    else {
      // on le "like"
      btn.addClass('liked');

      // on ajoute 1 au compteur de likes
      compteur.text(parseInt(compteur.text()) + 1);
      $('.stats-likes').text(parseInt($('.stats-likes').text()) + 1);
    }
  })

  .fail(function(jqXHR, ajaxOptions, thrownError){
    console.log('server not responding...');
  });
}
