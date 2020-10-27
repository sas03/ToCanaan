<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use GetStream\StreamLaravel\Facades\FeedManager;
use Carbon\Carbon;
use Validator;
use Image;

use App\User;
use App\Follow;
use App\Post;
use App\Comment;
use App\Message;

use App\Notifications\FollowNotification;
use App\Notifications\LikeNotification;
use App\Notifications\PrivateMessageNotification;

class SocialNetworkController extends Controller
{
  /**
   * Vérifie si l'utilisateur est l'utilisateur connecté
   *
   * @param int $id
   * @return boolean
   */
  private function isUserAuth($id)
  {
    if (Auth::id() == $id) {
      return true;
    }
    else {
      return false;
    }
  }





  /**
   * Affiche le dashboard de l'utilisateur
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function index($id, Request $request)
  {

    $user = Auth::user();

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();
    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;
    $followers = $user->followers;

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      // permet de mettre le temps en français
      Carbon::setLocale('fr');

      if ($request->input('type') == 'posts') {
        $posts = $user->postsWithPaginate();

        $view = view('social_network.ajax.posts', compact('user', 'posts'))->render();
      }

      if ($request->input('type') == 'comments') {
        $post = Post::find($request->input('post_id'));

        $comments = $post->comments->sortByDesc('created_at');

        $count = count($comments);

        $view = view('social_network.ajax.comments', compact('comments'))->render();
      }

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();

        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    $nbrOfPosts = $user->posts->count();

    return view('social_network.index', compact('user', 'following', 'followers', 'groupe', 'nbrOfPosts'));
  }





  /**
   * Affiche mes abonnements
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function showFollowing($id, Request $request)
  {
    $user = ($this->isUserAuth($id)) ? Auth::user() : User::find($id);

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();
    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "";

    $following = $user->following;
    $followers = $user->followers;

    $nbrOfPosts = $user->posts->count();

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    return view('social_network.following', compact('user', 'following', 'followers', 'groupe', 'nbrOfPosts'));
  }





  /**
   * Affiche les abonnés
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function showFollowers($id, Request $request)
  {
    $user = ($this->isUserAuth($id)) ? Auth::user() : User::find($id);

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();
    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;
    $followers = $user->followers;

    $nbrOfPosts = $user->posts->count();

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    return view('social_network.followers', compact('user', 'following', 'followers', 'groupe', 'nbrOfPosts'));
  }





  /**
   * Affiche les messages "likés"
   *
   * @param int $id
   * @param Request @request
   * @return \Illuminate\View\View
   */
  public function showLikes($id, Request $request)
  {
    $user = ($this->isUserAuth($id)) ? Auth::user() : User::find($id);

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();
    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;
    $followers = $user->followers;

    $nbrOfPosts = $user->posts->count();

    // on récupère les posts "likés" par l'utilisateur
    $posts = $user->likesWithPaginate();

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      // permet de mettre le temps en français
      Carbon::setLocale('fr');

      if ($request->input('type') == 'posts') {
        $view = view('social_network.ajax.posts_wall', compact('user', 'posts'))->render();
      }

      if ($request->input('type') == 'comments') {
        $post = Post::find($request->input('post_id'));

        $comments = $post->comments->sortByDesc('created_at');
        $count = count($comments);

        $view = view('social_network.ajax.comments', compact('comments'))->render();
      }

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    return view('social_network.likes', compact('user', 'following', 'followers', 'groupe', 'nbrOfPosts', 'posts'));
  }





  /**
   * Affiche le CV d'un utilisateur
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function showResume($id, Request $request)
  {
    $user = User::find($id);

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();
    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;
    $followers = $user->followers;

    $nbrOfPosts = $user->posts->count();

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    $resume = $user->resume;

    if ($resume) {
      if (Auth::id() == $user->id || $user->isVisible('experiences')) {
        $experiences = $resume->where('type', 'experience professionnelle');
      }
      if (Auth::id() == $user->id || $user->isVisible('formations')) {
        $formations = $resume->where('type', 'formation');
      }
      if (Auth::id() == $user->id || $user->isVisible('centres')) {
        $centresInteret = $resume->where('type', 'centre interet');
      }
    }

    $savoirs = (Auth::id() == $user->id || $user->isVisible('savoirs')) ? $user->savoirs : NULL ;
    $savoirEtre = (Auth::id() == $user->id || $user->isVisible('savoir_etre')) ? $user->savoirEtre : NULL ;
    $motivations = (Auth::id() == $user->id || $user->isVisible('motivations')) ? $user->motivations : NULL ;

    return view('social_network.resume', compact('user', 'following', 'followers', 'groupe', 'nbrOfPosts', 'experiences', 'formations', 'centresInteret', 'savoirs', 'savoirEtre', 'motivations'));
  }





  /**
   * Afficher le mur (= tous les posts de mes abonnés)
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function showWall($id, Request $request)
  {
    $user = User::find($id);

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();
    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;
    $followers = $user->followers;

    if (count($following) > 0) {
      $posts = $following->map(function($item, $key){
        return $item->posts()->pluck('id')->toArray();
      });

      $postsId = [];
      foreach ($posts as $value) {
        if (!empty($value)) {
          foreach ($value as $post) {
              $postsId[] = 'id = ' . $post;
          }
        }
      }

      $where = implode(' OR ', $postsId);
      $posts = Post::whereRaw($where)->orderBy('created_at', 'desc')->paginate(5);
    }
    else {
      $posts = [];
    }
    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      // permet de mettre le temps en français
      Carbon::setLocale('fr');

      if ($request->input('type') == 'posts') {
        $view = view('social_network.ajax.posts_wall', compact('user', 'posts'))->render();
      }

      if ($request->input('type') == 'comments') {
        $post = Post::find($request->input('post_id'));

        $comments = $post->comments->sortByDesc('created_at');
        $count = count($comments);

        $view = view('social_network.ajax.comments', compact('comments'))->render();
      }

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    $nbrOfPosts = $user->posts->count();

    return view('social_network.wall', compact('user', 'following', 'followers', 'groupe', 'posts', 'nbrOfPosts'));
  }





  /**
   * Affiche les groupes
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function showGroupes($id, Request $request)
  {
    $user = ($this->isUserAuth($id)) ? Auth::user() : User::find($id);

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();
    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;

    $peres = $user->following()->where('groupe', 'pere')->get();
    $fils = $user->following()->where('groupe', 'fils')->get();
    $amis = $user->following()->where('groupe', 'ami')->get();
    $concurrents = $user->following()->where('groupe', 'concurrent')->get();
    $connexions = $user->following()->where('groupe', 'connexion')->get();

    $followers = $user->followers;

    $nbrOfPosts = $user->posts->count();


    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      if ($request->input('groupe') != '') {
        $groupes = $user->following()->where('groupe', $request->input('groupe'))->get();

        $view = view('social_network.ajax.groupes', compact('user', 'groupes'))->render();
      }

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view]);
    }

    return view('social_network.groupes', compact(
      'user',
      'following',
      'peres',
      'fils',
      'amis',
      'concurrents',
      'connexions',
      'followers',
      'groupe',
      'nbrOfPosts'
    ));
  }





  /**
   * Affiche les messages
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function showMessages($id, Request $request)
  {
    $user = ($this->isUserAuth($id)) ? Auth::user() : User::find($id);

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();

    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;
    $followers = $user->followers;

    $nbrOfPosts = $user->posts->count();

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }


    // permet de mettre le temps en français
    Carbon::setLocale('fr');

    $message = new Message;
    $messages = $message->getMessages(Auth::id(), $user->id);

    if ($messages) {
      $messages = $messages->sortByDesc('created_at');
    }

    return view('social_network.send_messages', compact(
      'user',
      'following',
      'followers',
      'groupe',
      'nbrOfPosts',
      'messages'
    ));
  }





  /**
   * Affiche les messages
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function showMessagesAuth($id, Request $request)
  {
    $user = Auth::user();

    if (!$user) {
      return redirect()->route('login');
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();

    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;
    $followers = $user->followers;

    $nbrOfPosts = $user->posts->count();

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    $recus = $user->messagesReceived()->get();
    $envoyes = $user->messagesSent()->get();
    $messages = $recus->concat($envoyes);
    $messages = $messages->groupBy('id');

    return view('social_network.messages', compact(
      'user',
      'following',
      'followers',
      'groupe',
      'nbrOfPosts',
      'messages'
    ));
  }





  /**
   * Rechercher un utilisateur
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function findPeople(Request $request)
  {
    $user = Auth::user();
    $users = app('UsersRepository')->findByName($request->get('q', ''));

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    return view('social_network.find_people', compact('users'));
  }





  /**
   * Afficher le profil d'un utilisateur
   *
   * @param int $id
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function profile($id, Request $request)
  {
    $user = User::find($id);

    if (!$user || !Auth::user()) {
      return redirect()->route('login');
    }

    $posts = $user->postsWithPaginate();

    /*************************** REQUETE AJAX ***************************/
    if ($request->ajax()) {
      $view = "";
      $count = "";

      // permet de mettre le temps en français
      Carbon::setLocale('fr');

      if ($request->input('type') == 'posts') {
        $posts = $user->postsWithPaginate();

        $view = view('social_network.ajax.posts', compact('user', 'posts'))->render();
      }

      if ($request->input('type') == 'comments') {
        $post = Post::find($request->input('post_id'));

        $comments = $post->comments->sortByDesc('created_at');
        $count = count($comments);

        $view = view('social_network.ajax.comments', compact('comments'))->render();
      }

      if ($request->input('type') == 'notifications') {
        $view = view('social_network.ajax.notifications')->render();
        $count = count(Auth::user()->unreadNotifications);
      }

      return response()->json(['view' => $view, 'count' => $count]);
    }

    $isFollowing = Auth::user()->following()->where('follow_id', $user->id)->first();

    $groupe = ($isFollowing) ? $isFollowing->pivot->groupe : "" ;

    $following = $user->following;
    $followers = $user->followers;

    $nbrOfPosts = $user->posts->count();

    return view('social_network.profile', compact('user', 'posts', 'following', 'followers', 'groupe', 'nbrOfPosts'));
  }





  /**
   * Suivre une personne
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function follow(Request $request)
	{
		$user = Auth::user();

    $follow = $user->following()->where('follow_id', $request['target_id'])->exists();

		if (!$follow) {
      $user->following()->attach($request['target_id'], ['groupe' => $request['groupe']]);

      // on envoie une notification à l'utilisateur
      $userToNotify = User::find($request['target_id']);
      $userToNotify->notify(new FollowNotification($user));
		}
    else {
      $user->following()->updateExistingPivot($request['target_id'], ['groupe' => $request['groupe']]);
      // $user->following()->detach($request['target_id']);
    }

		return $request;
	}





  /**
   * Ajouter un post
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function addPost(Request $request)
  {
    $req = $request->all();

    if ($req['content']) {

      // on supprime les tag HTML du message
      $content = strip_tags(htmlspecialchars_decode($req['content']));

      $post = new Post;
      $post->user_id = Auth::id();
      $post->content = $content;
      $post->save();
    }
    else {
      $post = [];
    }

		return $post;
  }





  /**
   * Modifier un post
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function editPost(Request $request)
  {
    $req = $request->all();

    if ($req['content']) {

      // on supprime les tag HTML du message
      $content = strip_tags(htmlspecialchars_decode($req['content']));

      $post = Post::find($req['post_id']);
      $post->content = $content;
      $post->save();
    }
    else {
      $post = [];
    }

		return redirect()->back();
  }





  /**
   * Supprimer un post
   *
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function deletePost($id)
  {
    $post = Post::find($id);

    if ($post) {
      $post->delete();
    }

		return redirect()->back();
  }





  /**
   * Ajouter un commentaire
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function addComment(Request $request)
  {
    $req = $request->all();

    if ($req['comment']) {

      // on supprime les tag HTML du message
      $comment = strip_tags(htmlspecialchars_decode($req['comment']));

      $add = new Comment;
      $add->user_id = Auth::id();
      $add->post_id = $req['post_id'];
      $add->comment = $comment;
      $add->save();
    }
    else {
      $comment = [];
    }

		return $comment;
  }





  /**
   * Ajouter un like
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function likePost(Request $request)
  {
    $req = $request->all();

    if ($req['post_id']) {
      $isLiked = Auth::user()->likes()->where('post_id', $req['post_id'])->exists();

      if ($isLiked) {
        Auth::user()->likes()->detach($req['post_id']);
      }
      else {
        Auth::user()->likes()->attach($req['post_id']);

        // on envoie une notification à l'utilisateur
        // $post = Post::find($request['post_id']);
        $userToNotify = User::find($request['user_id']);
        $userToNotify->notify(new LikeNotification(Auth::user()));
      }
    }

		return $req;
  }





  /**
   * Envoyer un message
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function sendMessage(Request $request)
  {
    $req = $request->all();

    if ($req['message']) {
      Auth::user()->messagesSent()->attach($req['receiver_id'], ['message' => $req['message']]);

      // on envoie une notification à l'utilisateur
      $userToNotify = User::find($request['receiver_id']);
      $userToNotify->notify(new PrivateMessageNotification(Auth::user()));
    }

    return redirect()->route('social_network_messages', ['id' => $req['receiver_id']]);
  }





  /**
   * Met à jour l'avatar de l'utilisateur
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function updateAvatar(Request $request)
  {
    if ($request->hasFile('avatar')) {
      $user = Auth::user();
      $nomUser = str_replace(' ', '_', $user->nom) . '_' . str_replace(' ', '_', $user->prenom);

      $filename = $nomUser . '.' . $request->file('avatar')->getClientOriginalExtension();

      // $avatar = Image::make($request->file('avatar'))->resize(null, 150, function ($constraint) {
      //     $constraint->aspectRatio();
      // });

      $avatar = Image::make($request->file('avatar'))->fit(150);
      $avatar->save(public_path('img/avatars/' . $filename));

      $user->avatar = $filename;
      $user->save();
    }

    return redirect()->back();
  }





  /**
   * Met à jour l'image de couverture de l'utilisateur
   *
   * @param Request $request
   * @return \Illuminate\View\View
   */
  public function updateCover(Request $request)
  {
    if ($request->hasFile('cover')) {
      $user = Auth::user();
      $nomUser = str_replace(' ', '_', $user->nom) . '_' . str_replace(' ', '_', $user->prenom);

      $filename = $nomUser . '.' . $request->file('cover')->getClientOriginalExtension();

      $cover = Image::make($request->file('cover'))->save(public_path('img/covers/' . $filename));

      $user->cover = $filename;
      $user->save();
    }

    return redirect()->back();
  }

}
