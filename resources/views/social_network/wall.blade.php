@extends('layouts.master_network') @section('title', 'Réseau social')

@section('content')

@include('social_network.layouts.header')

<div class="row">

  {{---------------------------------- MENU ----------------------------------}}

  <div class="col-lg-3 side-menu">
    @include('social_network.layouts.navbar_left')
  </div>


  {{-------------------------------- CONTENU --------------------------------}}

  <div class="col-lg-7">

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
      loadPostsOfUser(page);

      /***************** EVENT SCROLL pour charger + de posts *****************/

      $(window).scroll(function() {
          if($(window).scrollTop() == $(document).height() - $(window).height()) {
            page++;
            loadPostsOfUser(page);
          }
      });


      // EVENT SHOW COMMENTS
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

    });

</script>
@endsection
