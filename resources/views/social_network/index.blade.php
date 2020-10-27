@extends('layouts.master_network') @section('title', 'Réseau social')

@section('content')

{{-- @include('social_network.layouts.header') --}}
<div class="header-user-outer-box">
  <div class="row row-header-dashboard-user">

    <img src="{{ asset('img/covers/' . Auth::user()->cover .'?' . time() . '>') }}" alt="Photo de couverture" class="photo-couverture-user">

    <div class="col-lg-12">

      <button type="button" name="button" data-toggle="modal" data-target="#modal-update-cover" class="btn-update-cover"><i class="icon ion-edit"></i> Modifier la photo de couverture</button>

      <!-- Template de la Modal pour éditer la cover -->
      <div class="modal modal-custom" id="modal-update-cover" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">

          <div class="modal-header">
            <h5 class="modal-title">CHANGEZ VOTRE COVER</h5>
            <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-content">
            <div class="modal-body box-form">
              <form action="{{ route('user_update_cover_in_network') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="file" class="form-control" name="cover">
                </div>
                <input type="submit" class="btn-form bg-jaune" value="Valider">
              </form>

            </div>
          </div>
        </div>
      </div>

      <div class="box-avatar-user">
        <img src="{{ asset('img/avatars/' . Auth::user()->avatar .'?' . time() . '>') }}" alt="Avatar de l'utilisateur" class="avatar-user">

        <button type="button" class="btn-update-avatar" name="button" data-toggle="modal" data-target="#modal-update-avatar"><i class="icon ion-edit"></i></button>

        <!-- Template de la Modal pour éditer l'avatar -->
        <div class="modal modal-custom" id="modal-update-avatar" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">

            <div class="modal-header">
              <h5 class="modal-title">CHANGEZ VOTRE AVATAR</h5>
              <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-content">
              <div class="modal-body box-form">

                <form action="{{ route('user_update_avatar_in_network') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="cropped_value" id="cropped_value" value="">
                  <div class="form-group">
                    <input type="file" class="form-control" name="avatar">
                  </div>
                  <input type="submit" class="btn-form bg-jaune" value="Valider">
                </form>

              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="box-user-name">
        <h4>{{ ucfirst(Auth::user()->prenom) }} {{mb_strtoupper(Auth::user()->nom) }}</h4>
        <hr>
        <em>Inscrit(e) depuis le {{ $user->created_at->format('d/m/Y') }}</em>
      </div>

    </div>
  </div>
</div>


<div class="row">

  <div class="col-lg-3 side-menu">
    @include('social_network.layouts.navbar_left')
  </div>

  <div class="col-lg-7">
    <div class="box-form box-form-societe">

      <form class="form-add-post" action="" method="post">
        {{ csrf_field() }}
        <div class="form-group form-group-description">
          <textarea class="form-control" data-provide="markdown" rows="3" name="content" placeholder="Poster un message"></textarea>
        </div>
        <input type="submit" name="btn-add-post" class="btn-add-post bg-jaune" value="Publier">
      </form>

    </div>

    <hr class="bg-jaune">

    <div class="posts-section">
      <div class="box-ajax-load">
        <span class="ajax-load text-center"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif"></span>
      </div>
      <div class="import-posts">

      </div>
    </div>
  </div>

  {{--------------------------------- STATS ---------------------------------}}
  <div class="col-lg-2">
    @include('social_network.layouts.stats')
  </div>

</div>

@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      let page = 1;

      // on charge les posts
      loadPostsAdmin(page, '');

      /***************** EVENT SCROLL pour charger + de posts *****************/
      let total_of_posts = $('.stats-posts').text();
      let number_of_posts_seen = $('.box-posts-user').length;

      $(window).scroll(function() {
        number_of_posts_seen = $('.box-posts-user').length;

        if($(window).scrollTop() == $(document).height() - $(window).height() && total_of_posts > number_of_posts_seen) {
          page++;
          loadPostsAdmin(page, 'append');
        }
      });

      /**************************** EVENT ADD POST ****************************/

      let urlAddPost = "{{ route('social_network_add_post') }}";

      $('.btn-add-post').click(function(e){
        e.preventDefault();

        let data = $(this).parent().serialize();

        // on retourne à la première page
        page = 1;

        addPost(urlAddPost, data, page);
      });



      /************************* EVENT SHOW COMMENTS *************************/

      $('body').on('click', '.btn-show-comments', function(e){
        e.preventDefault();

        let box = $(this).next().next();
        let post_id = $(this).attr('post');
        let arrow = $(this).children('.icon');
        let compteur = $(this).children('.nbr-of-comments');

        // s'il y a des commentaires
        if (compteur.text() > 0) {

          if (box.is(':visible')) {
            box.slideUp();
            arrow.removeClass('ion-arrow-up-b');
            arrow.addClass('ion-arrow-down-b');
          }
          else {
            loadComments(post_id, box, compteur);
            arrow.removeClass('ion-arrow-down-b');
            arrow.addClass('ion-arrow-up-b');
          }

        }
      });



      /************************** EVENT ADD COMMENT **************************/

      let urlAddComment = "{{ route('social_network_add_comment') }}";

      $('body').on('click', '.btn-add-comment', function(e){
        e.preventDefault();

        let box = $(this).parent().parent().prev();
        let post_id = $(this).attr('post');
        let compteur = $(this).parent().parent().prev().prev().prev().children('.nbr-of-comments');

        let data = $(this).parent().serialize();

        addComment(urlAddComment, data, post_id, box, compteur);
      });


      /****************************** EVENT LIKE ******************************/

      let urlLike = "{{ route('social_network_like_post') }}";

      $('body').on('click', '.btn-like-post', function(e){
        e.preventDefault();

        let btn = $(this);
        let compteur = $(this).prev();
        let data = $(this).parent().serialize();

        likePost(urlLike, data, btn, compteur);
      });




      /************************** AFFICHER EDIT POST **************************/

      $('body').on('click', '.box-edit-post span', function(e){
        // empêche la fermeture de la div lorsque l'on cliquesur les boutons
        e.stopPropagation();

        let buttons = $(this).next();

        if (buttons.is(':visible')) {
          buttons.hide();
        }
        else {
          buttons.show();
        }
      });

      // Ferme le menu "edit" lorsque l'on clique dans le body
      $(window).click(function() {
        $('.box-edit-post ul').hide();
      });


    });

</script>
@endsection
