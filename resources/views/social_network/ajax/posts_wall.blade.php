@foreach ($posts as $post)

<div class="box-posts-user">

  <div class="title-section">
    <a href="{{ route('social_network_profile', ['id' => $post->user->id]) }}">
      <img src="{{ asset('img/avatars/' . $post->user->avatar) }}" alt="Avatar de l'utilisateur" class="avatar-user">
      <h5>{{ ucfirst($post->user->prenom) }} {{mb_strtoupper($post->user->nom) }} - <em>{{ $post->created_at->diffForHumans() }}</em></h5>
    </a>

    <form class="form-like-post" action="" method="post">
      {{ csrf_field() }}

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
    @if (count($post->comments) == 0)
      <p>0 commentaires</p>
    @else
      <a href="#" class="btn-show-comments" post="{{ $post->id }}">
        <span class="nbr-of-comments">{{ count($post->comments) }}</span> commentaire(s) <i class="icon ion-arrow-down-b"></i>
      </a>
    @endif

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
