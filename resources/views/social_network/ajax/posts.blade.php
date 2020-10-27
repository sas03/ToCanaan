@foreach ($posts as $post)

<div class="box-posts-user">

  <div class="title-section">
    <a href="{{ route('social_network_profile', ['id' => $user->id]) }}">
      <img src="{{ asset('img/avatars/' . $user->avatar) }}" alt="Avatar de l'utilisateur" class="avatar-user">
      <h5>
        {{ ucfirst($user->prenom) }} {{mb_strtoupper($user->nom) }} - <em>{{ $post->created_at->diffForHumans() }}</em>
      </h5>
    </a>

    @if ($user->id == Auth::id())
      <div class="box-edit-post">
        <span class="btn-show-edit-post"><i class="icon ion-gear-a"></i> <i class="icon ion-arrow-down-b"></i></span>
        <ul>
          <li><a href="#" class="btn-edit-post" data-toggle="modal" data-target="#modal-edit-post-{{ $post->id }}">Éditer</a></li>
          <li><a href="{{ route('social_network_delete_post', ['id' => $post->id]) }}">Supprimer</a></li>
        </ul>
      </div>


      <!-- Template de la Modal pour éditer la cover -->
      <div class="modal modal-custom" id="modal-edit-post-{{ $post->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">

          <div class="modal-header">
            <h5 class="modal-title">MODIFIER VOTRE POST</h5>
            <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-content">
            <div class="modal-body box-form">
              <form action="{{ route('social_network_edit_post') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                  <textarea class="form-control" rows="5" name="content">{{ $post->content }}</textarea>
                </div>
                <input type="submit" class="btn-form bg-jaune" value="Valider">
              </form>

            </div>
          </div>
        </div>
      </div>
    @endif

    <form class="form-like-post" action="" method="post">
      {{ csrf_field() }}

      <input type="hidden" name="user_id" value="{{ $user->id }}">
      <input type="hidden" name="post_id" value="{{ $post->id }}">

      <label>{{ count($post->likes) }}</label>
      <button type="submit" name="btn_like_post" class="btn-like-post @if (Auth::user()->like($post->id)) liked @endif"><i class="icon ion-heart"></i></button>
    </form>

  </div>

  <div class="content-section">
    <p><?php echo nl2br("$post->content"); ?></p>
  </div>

  <hr class="bg-blanc">

  <div class="comments-section">
    <a href="#" class="btn-show-comments" post="{{ $post->id }}">
      <span class="nbr-of-comments">{{ count($post->comments) }}</span> commentaire(s) <i class="icon ion-arrow-down-b"></i>
    </a>

    <hr class="bg-blanc">

    <div class="comments-section-show">

    </div>

    <div class="comments-section-form box-form box-form-societe">
      <a href="{{ route('social_network_profile', ['id' => $user->id]) }}">
        <img src="{{ asset('img/avatars/' . $user->avatar) }}" alt="Avatar de l'utilisateur" class="avatar-user">
      </a>
      <form class="form-add-comment" action="" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="form-group form-group-description">
          <textarea class="form-control" rows="1" name="comment" placeholder="Poster un commentaire"></textarea>
        </div>

        <input type="submit" name="btn-add-comment" class="btn-add-comment bg-jaune" post="{{ $post->id }}" value="Poster">
      </form>
    </div>
  </div>
</div>

@endforeach
