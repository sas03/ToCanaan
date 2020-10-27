<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// HTTPS forcé pour sécuriser le site
if (App::environment('production')) {
  URL::forceScheme("https");
}

// Homepage
Route::get('/', 'HomeController@index')->name('home');

// Tocanaan TV
Route::get('tocanaantv', 'TocanaantvController@index')->name('tocanaantv');

// Formulaire de contact
Route::post('/contact', 'HomeController@contact')->name('contact');

Route::get('search', 'GlobalController@search')->name('search_global');
Route::get('process', 'GlobalController@processForm')->name('search_global_process_form');
Route::get('competences/search', 'CompetencesController@processForm')->name('search_competences_process_form');


Route::prefix('autocomplete')->group(function () {
  Route::get('/', 'GlobalController@autocomplete')->name('autocomplete_global');
  Route::get('competences', 'CompetencesController@autocompleteAllCompetences')->name('autocomplete_competences');
  Route::get('codes', 'CodesController@autocompleteCodes')->name('autocomplete_codes');
  Route::get('metiers', 'MetiersController@autocomplete')->name('autocomplete_metiers');
  Route::get('secteurs', 'SecteursController@autocomplete')->name('autocomplete_secteurs');
  Route::get('formations', 'FormationsController@autocomplete')->name('autocomplete_formations');
  Route::get('etablissements', 'EtablissementsController@autocomplete')->name('autocomplete_etablissements');

  Route::get('users/with-mail', 'UserController@autocompleteWithMail')->name('autocomplete_users_with_mail');
  Route::get('users/without-mail', 'UserController@autocompleteWithoutMail')->name('autocomplete_users_without_mail');

  Route::get('savoirs', 'SavoirsController@autocomplete')->name('autocomplete_savoirs');
  Route::get('savoir-faire', 'SavoirFaireController@autocomplete')->name('autocomplete_savoir_faire');
  Route::get('savoir-etre', 'SavoirEtreController@autocomplete')->name('autocomplete_savoir_etre');
  Route::get('motivations', 'MotivationsController@autocomplete')->name('autocomplete_motivations');
  Route::get('savoirs-and-savoir-faire', 'SavoirsController@autocompleteSavoirsAndSavoirFaire')->name('autocomplete_savoirs_and_savoir_faire');
});

// Auths
Auth::routes();


Route::post('careerdirectparam', 'CareerdirectparamController@store')->middleware('auth')->name('careerdirectparam');
Route::get('showFromNotification/{notification}', 'CareerdirectparamController@showFromNotification')->name('showFromNotification');

// Section Orientations
Route::prefix('orientation')->group(function(){
    Route::get('/', 'OrientationController@index')->name('orientation_index');
    //--Route::post('/', 'OrientationController@insert')->name('orientation_insert');//

    Route::get('careerdirectsignin/{id?}', 'OrientationController@careerdirectsignin')->name('careerdirectsignin');//
    Route::post('careerdirectsignin/{id?}', 'OrientationController@careerdirectsignin')->name('careerdirectsignin');//

    Route::get('careerdirectzone/{id?}', 'OrientationController@careerdirectzone')->name('careerdirectzone');

    Route::get('orientation_test/{id?}', 'OrientationController@test')->name('orientation_test');
    Route::get('orientation_test/test_motivation/{id?}', 'OrientationController@testMotivation')->name('orientation_test_motivation');
    Route::get('orientation_test/test_interetpro/{id?}', 'OrientationController@testInteretpro')->name('orientation_test_interetpro');
    Route::get('orientation_test/test_personalite/{id?}', 'OrientationController@testPersonalite')->name('orientation_test_personalite');

    Route::post('orientation_test/test_motivation/{id?}', 'OrientationController@testMotivation')->name('orientation_test_motivation');
    Route::post('orientation_test/test_interetpro/{id?}', 'OrientationController@testInteretpro')->name('orientation_test_interetpro');
    Route::post('orientation_test/test_personalite/{id?}', 'OrientationController@testPersonalite')->name('orientation_test_personalite');
    Route::post('orientation_test/checkformulaire/{id?}', 'OrientationController@checkformulaire')->name('orientation_checkformulaire');
    //Route::match(['get','post'], 'orientation_test/checkformulaire/{id?}', 'OrientationController@checkformulaire')->name('orientation_checkformulaire');
    // A voir
});

// Section Métiers
Route::prefix('metiers')->group(function () {
    Route::get('/', 'MetiersController@index')->name('metiers_index');
    Route::get('search', 'MetiersController@search')->name('metiers_search');
    Route::match(['get', 'post'], 'fiche/{id}', 'MetiersController@fiche')->name('fiche_metier');
    Route::get('secteur/{id}', 'MetiersController@ficheSecteur')->name('fiche_secteur');
});

// Section Formations
Route::prefix('formations')->group(function () {
    Route::get('/', 'FormationsController@index')->name('formations_index');
    Route::get('search', 'FormationsController@search')->name('formations_search');
    Route::match(['get', 'post'], 'fiche/{id}', 'FormationsController@fiche')->name('fiche_formation');
    Route::match(['get', 'post'], 'niveau_etudes/{niveau}', 'FormationsController@ficheNiveauEtudes')->name('fiche_niveau_etudes');
});

// Section Etablissements
Route::prefix('etablissements')->group(function () {
    Route::get('fiche/{id}', 'EtablissementsController@fiche')->name('fiche_etablissement');
    Route::match(['get', 'post'], 'type/{type}', 'EtablissementsController@ficheTypeEtablissement')->name('fiche_types_etablissements');
});

//Section Parcours
Route::prefix('parcours')->group(function(){
    Route::post('add', 'ParcoursController@add')->name('add_parcours');
    Route::get('delete/{id?}', 'ParcoursController@delete')->name('delete_parcours');
});

// Section Careerdirect
Route::get('careerdirect/{id}', 'CareerdirectController@careerdirect')->name('career_direct');
Route::get('careerdirect_fiche/{id}', 'CareerdirectController@careerdirect_fiche')->name('career_direct_fiche');
Route::prefix('careerdirect')->group(function(){
    Route::get('personnalite/{id}', 'CareerdirectController@personnalite')->name('career_direct_personnalite');
    Route::get('personnalite/sixfacteurs/{id}', 'CareerdirectController@sixfacteurspersonnalite')->name('career_direct_sixfacteurspersonnalite');
    Route::get('personnalite/facteurssousfacteurs/{id}', 'CareerdirectController@facteurssousfacteurspersonnalite')->name('career_direct_facteurssousfacteurspersonnalite');
    Route::get('personnalite/pointsforts/{id}', 'CareerdirectController@pointsfortspersonnalite')->name('career_direct_pointsfortspersonnalite');
    Route::get('personnalite/pointsfaibles/{id}', 'CareerdirectController@pointsfaiblespersonnalite')->name('career_direct_pointsfaiblespersonnalite');
    Route::get('personnalite/questionscruciales/{id}', 'CareerdirectController@questionscrucialespersonnalite')->name('career_direct_questionscrucialespersonnalite');

    Route::get('interetpro/{id}', 'CareerdirectController@interetpro')->name('career_direct_interetpro');
    Route::get('interetpro/interetprohuit/{id}', 'CareerdirectController@interetprohuit')->name('career_direct_interetprohuit');
    Route::get('interetpro/scorescombines/{id}', 'CareerdirectController@scorescombines')->name('career_direct_scorescombines');
    Route::get('interetpro/metierspotentiels/{id}', 'CareerdirectController@metierspotentiels')->name('career_direct_metierspotentiels');

    Route::get('compcap/{id}', 'CareerdirectController@compcap')->name('career_direct_compcap');
    Route::get('compcap/quatredomaines/{id}', 'CareerdirectController@compcapquatredomaines')->name('career_direct_compcapquatredomaines');
    Route::get('compcap/evaluez/{id}', 'CareerdirectController@compcapevaluez')->name('career_direct_compcapevaluez');

    Route::get('valeurs/{id}', 'CareerdirectController@valeurs')->name('career_direct_valeurs');
    Route::get('valeurs/environnementtravail/{id}', 'CareerdirectController@valeursenvironnementtravail')->name('career_direct_valeursenvironnementtravail');
    Route::get('valeurs/attentes/{id}', 'CareerdirectController@valeursattentes')->name('career_direct_valeursattentes');
    Route::get('valeurs/vie/{id}', 'CareerdirectController@valeursvie')->name('career_direct_valeursvie');
    Route::get('valeurs/conclusion/{id}', 'CareerdirectController@valeursconclusion')->name('career_direct_valeursconclusion');
    Route::get('valeurs/sommaire/{id}', 'CareerdirectController@valeurssommaire')->name('career_direct_valeurssommaire');

    Route::get('etapessuivantes/{id}', 'CareerdirectController@etapessuivantes')->name('career_direct_etapessuivantes');
    Route::get('ressources/{id}', 'CareerdirectController@ressources')->name('career_direct_ressources');
});

// Section User
Route::prefix('user')->group(function () {
    Route::get('dashboard', 'UserController@index')->name('user_index');
    Route::get('fiche/{id}', 'UserController@fiche')->name('fiche_user');

    // add careerdirect
    //--Route::get('careerdirect/{id}', 'UserController@careerdirect')->name('career_direct');
    //--Route::get('careerdirect_fiche', 'UserController@careerdirect_fiche')->name('career_direct_fiche');

    Route::get('parametres', 'UserController@parametres')->name('user_parametres');

    Route::get('edit', function(){
      return view('user.edit_profil');
    })->name('edit_profil');
    Route::post('update', 'UserController@update')->name('update_profil');


    Route::get('visibilite', 'UserController@showVisibilite')->name('user_visibilite');
    Route::post('visibilite/edit', 'UserController@editVisibilite')->name('edit_visibilite');

    Route::post('update_avatar', 'UserController@updateAvatar')->name('user_update_avatar');
    Route::post('update_cover', 'UserController@updateCover')->name('user_update_cover');

    Route::get('password', function(){
      return view('user.edit_password');
    })->name('edit_password');
    Route::post('password_update', 'UserController@updatePassword')->name('update_password');

    Route::get('resume', 'UserController@resume')->name('user_resume');
    Route::post('resume/add', 'ResumesController@add')->name('user_add_resume');
    Route::post('resume/edit', 'ResumesController@edit')->name('user_edit_resume');
    Route::get('resume/delete/{id}', 'ResumesController@delete')->name('user_delete_resume');

    Route::post('competences/add', 'UserController@addCompetences')->name('user_add_competences');
    Route::post('competences/add_from_filtres', 'UserController@addCompetencesFromFiltres')->name('user_add_competences_from_filtres');
    Route::get('competence/delete/{id}-{type}', 'UserController@deleteCompetence')->name('user_delete_competence');
});

// Section Keywords
Route::prefix('keywords')->group(function(){
    Route::match(['get', 'post'], 'index', 'KeywordsController@index')->name('keyword_index');
    Route::post('process_keywords', 'KeywordsController@processKeywords')->name('process_keywords');
    Route::post('put_in_session', 'KeywordsController@putInSession')->name('put_in_session');
    Route::post('delete_from_session', 'KeywordsController@deleteFromSession')->name('delete_from_session');

});

/* Routes pour le réseau social */
Route::prefix('social-network')->group(function () {
    Route::get('/{id}', 'SocialNetworkController@index')->name('social_network_index');
    Route::get('/following/{id}', 'SocialNetworkController@showFollowing')->name('social_network_following');
    Route::get('/followers/{id}', 'SocialNetworkController@showFollowers')->name('social_network_followers');
    Route::get('/wall/{id}', 'SocialNetworkController@showWall')->name('social_network_wall');
    Route::get('/resume/{id}', 'SocialNetworkController@showResume')->name('social_network_resume');
    Route::get('/likes/{id}', 'SocialNetworkController@showLikes')->name('social_network_likes');
    Route::get('/groupes/{id}', 'SocialNetworkController@showGroupes')->name('social_network_groupes');
    Route::get('/messages/{id}', 'SocialNetworkController@showMessages')->name('social_network_messages');
    Route::get('/messages/auth/{id}', 'SocialNetworkController@showMessagesAuth')->name('social_network_messages_auth');

    Route::match(['get', 'post'], '/results', 'SocialNetworkController@findPeople')->name('social_network_find_people');
    Route::get('/profil/{id}', 'SocialNetworkController@profile')->name('social_network_profile');

    Route::post('update_avatar', 'SocialNetworkController@updateAvatar')->name('user_update_avatar_in_network');
    Route::post('update_cover', 'SocialNetworkController@updateCover')->name('user_update_cover_in_network');

    Route::post('/follow/{id}/notify', 'SocialNetworkController@notify')->name('notify');
    Route::post('/follow/add', 'SocialNetworkController@follow')->name('social_network_follow');

    Route::post('/post/add', 'SocialNetworkController@addPost')->name('social_network_add_post');
    Route::post('/post/edit', 'SocialNetworkController@editPost')->name('social_network_edit_post');
    Route::get('/post/delete/{id}', 'SocialNetworkController@deletePost')->name('social_network_delete_post');

    Route::post('/post/like', 'SocialNetworkController@likePost')->name('social_network_like_post');

    Route::post('/comment/add', 'SocialNetworkController@addComment')->name('social_network_add_comment');
    Route::post('/message/send', 'SocialNetworkController@sendMessage')->name('social_network_send_message');
});

Route::get('/markAsRead', function(){
  Auth::user()->unreadNotifications->markAsRead();
})->name('mark_as_read');

/****************************** Section Societe ******************************/

Route::group(['middleware' => 'societe_guest'], function() {
  Route::get('societe_register', 'SocieteAuth\RegisterController@showRegistrationForm')->name('societe_register');
  Route::post('societe_register', 'SocieteAuth\RegisterController@register');
  Route::get('societe_login', 'SocieteAuth\LoginController@showLoginForm')->name('societe_login');
  Route::post('societe_login', 'SocieteAuth\LoginController@login');

  //Password reset routes
  Route::get('societe_password/reset', 'SocieteAuth\ForgotPasswordController@showLinkRequestForm');
  Route::post('societe_password/email', 'SocieteAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::get('societe_password/reset/{token}', 'SocieteAuth\ResetPasswordController@showResetForm');
  Route::post('societe_password/reset', 'SocieteAuth\ResetPasswordController@reset');
});

//Only logged in societes can access or send requests to these pages
Route::group(['middleware' => 'societe_auth'], function(){

  Route::prefix('societe')->group(function(){
    Route::get('index', 'SocietesController@index')->name('societe_index');

    Route::get('search', 'SocietesController@search')->name('societe_search');

    Route::match(['get', 'post'], 'edit', 'SocietesController@edit')->name('societe_edit');
    Route::match(['get', 'post'], 'edit/password', 'SocietesController@editPassword')->name('societe_edit_password');
    Route::post('update_logo', 'SocietesController@updateLogo')->name('societe_update_logo');

    Route::post('logout', 'SocieteAuth\LoginController@logout')->name('societe_logout');

    //Section Services
    Route::prefix('service')->group(function(){
      Route::get('fiche/{id?}', 'ServicesController@fiche')->name('fiche_service');
      Route::get('liste', 'ServicesController@liste')->name('liste_services');

      Route::get('add', 'ServicesController@add')->name('add_service');
      Route::post('create', 'ServicesController@create')->name('create_service');

      Route::match(['get', 'post'], 'edit/{id}', 'ServicesController@edit')->name('edit_service');

      Route::get('delete/{id}', 'ServicesController@delete')->name('delete_service');

      Route::get('poste/edit/{id?}', 'ServicesController@editPoste')->name('edit_poste_service');
      Route::post('poste/service/update', 'PostesController@updateService')->name('update_poste_service');

      Route::get('employe/edit/{id?}', 'ServicesController@editEmploye')->name('edit_employe_service');
      Route::post('employe/service/update', 'EmployesController@updateService')->name('update_employe_service');

      Route::get('autocomplete', 'ServicesController@autocomplete')->name('autocomplete_services');
    }); // Fin prefix service

    //Section Postes
    Route::prefix('poste')->group(function(){
      Route::get('fiche/{id?}', 'PostesController@fiche')->name('fiche_poste');
      Route::get('liste', 'PostesController@liste')->name('liste_postes');

      Route::get('add', 'PostesController@add')->name('add_poste');
      Route::post('create', 'PostesController@createPoste')->name('create_poste');

      Route::get('edit/{id}', 'PostesController@edit')->name('edit_poste');
      Route::post('update/{id}', 'PostesController@updatePoste')->name('update_poste');

      Route::get('delete/{id}', 'PostesController@delete')->name('delete_poste');

      Route::get('service/edit/{id?}', 'PostesController@editService')->name('edit_service_poste');
      Route::post('service/service/update', 'ServicesController@updatePoste')->name('update_service_poste');

      Route::get('employe/edit/{id?}', 'PostesController@editEmploye')->name('edit_employe_poste');
      Route::post('employe/service/update', 'EmployesController@updatePoste')->name('update_employe_poste');

      Route::get('autocomplete', 'PostesController@autocomplete')->name('autocomplete_postes');

      Route::prefix('competences')->group(function(){
        Route::get('edit/{id?}', 'PostesController@editCompetences')->name('edit_competences_poste');
      }); // Fin prefix competences

      Route::prefix('savoirs')->group(function(){
        Route::get('edit/{id?}', 'PostesController@editSavoirs')->name('edit_savoirs_poste');
        Route::post('add', 'SavoirsController@addInPoste')->name('add_savoir_poste');
        Route::post('update', 'SavoirsController@updateInPoste')->name('update_savoir_poste');
        Route::post('update_name', 'SavoirsController@updateNameInPoste')->name('update_savoir_name_poste');
        Route::post('delete', 'SavoirsController@deleteInPoste')->name('delete_savoir_poste');
      }); // Fin prefix competences

      Route::prefix('savoir_faire')->group(function(){
        Route::get('edit/{id?}', 'PostesController@editSavoirFaire')->name('edit_savoir_faire_poste');
        Route::post('add', 'SavoirFaireController@addInPoste')->name('add_savoir_faire_poste');
        Route::post('update', 'SavoirFaireController@updateInPoste')->name('update_savoir_faire_poste');
        Route::post('update_name', 'SavoirFaireController@updateNameInPoste')->name('update_savoir_faire_name_poste');
        Route::post('delete', 'SavoirFaireController@deleteInPoste')->name('delete_savoir_faire_poste');
      }); // Fin prefix savoir_faire

      Route::prefix('savoir_etre')->group(function(){
        Route::get('edit/{id?}', 'PostesController@editSavoirEtre')->name('edit_savoir_etre_poste');
        Route::post('add', 'SavoirEtreController@addInPoste')->name('add_savoir_etre_poste');
        Route::post('update', 'SavoirEtreController@updateInPoste')->name('update_savoir_etre_poste');
        Route::post('update_name', 'SavoirEtreController@updateNameInPoste')->name('update_savoir_etre_name_poste');
        Route::post('delete', 'SavoirEtreController@deleteInPoste')->name('delete_savoir_etre_poste');
      }); // Fin prefix savoir_etre

    }); // Fin prefix employe

    //Section Employés
    Route::prefix('employe')->group(function(){
      Route::get('fiche/{id?}', 'EmployesController@fiche')->name('fiche_employe');
      Route::get('liste', 'EmployesController@liste')->name('liste_employes');

      Route::get('add', 'EmployesController@add')->name('add_employe');
      Route::post('create', 'EmployesController@create')->name('create_employe');

      Route::get('edit/{id}', 'EmployesController@edit')->name('edit_employe');
      Route::post('update/{id}', 'EmployesController@updateEmploye')->name('update_employe');

      Route::get('delete/{id}', 'EmployesController@delete')->name('delete_employe');

      Route::get('autocomplete', 'EmployesController@autocomplete')->name('autocomplete_employes');

      Route::prefix('savoirs')->group(function(){
        Route::get('edit/{id?}', 'EmployesController@editSavoirs')->name('edit_savoirs_employe');
        Route::post('update', 'SavoirsController@updateInEmploye')->name('update_savoir_employe');
      }); // Fin prefix savoris

      Route::prefix('savoir_faire')->group(function(){
        Route::get('edit/{id?}', 'EmployesController@editSavoirFaire')->name('edit_savoir_faire_employe');
        Route::post('update', 'SavoirFaireController@updateInEmploye')->name('update_savoir_faire_employe');
      }); // Fin prefix savoir_faire

      Route::prefix('savoir_etre')->group(function(){
        Route::get('edit/{id?}', 'EmployesController@editSavoirEtre')->name('edit_savoir_etre_employe');
        Route::post('update', 'SavoirEtreController@updateInEmploye')->name('update_savoir_etre_employe');
      }); // Fin prefix savoir_etre

    }); // Fin prefix employe


    Route::prefix('competences')->group(function(){
      Route::get('fiche/{id}', 'CompetencesController@fiche')->name('fiche_competence');
      Route::get('autocomplete_disponible', 'CompetencesController@autocompleteCompetencesDisponibles')->name('autocomplete_competences_disponibles');
      Route::get('autocomplete_requise', 'CompetencesController@autocompleteCompetencesRequises')->name('autocomplete_competences_requises');
    }); // Fin prefix savoirs


  }); // Fin prefix societe

}); // Fin middleware socied_auth



// Section École
//Logged in users/seller cannot access or send requests these pages
Route::group(['middleware' => 'ecole_guest'], function() {
  Route::get('ecole_register', 'EcoleAuth\RegisterController@showRegistrationForm')->name('ecole_register');
  Route::post('ecole_register', 'EcoleAuth\RegisterController@register');
  Route::get('ecole_login', 'EcoleAuth\LoginController@showLoginForm')->name('ecole_login');
  Route::post('ecole_login', 'EcoleAuth\LoginController@login');

  //Password reset routes
  Route::get('ecole_password/reset', 'EcoleAuth\ForgotPasswordController@showLinkRequestForm');
  Route::post('ecole_password/email', 'EcoleAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::get('ecole_password/reset/{token}', 'EcoleAuth\ResetPasswordController@showResetForm');
  Route::post('ecole_password/reset', 'EcoleAuth\ResetPasswordController@reset');
});

Route::group(['middleware' => 'ecole_auth'], function() {

}); // Fin middleware ecole_auth

//--------------------------- Section admin ------------------------------

Route::group(['prefix' => 'admin',  'middleware' => 'admin'],function () {
    Route::get('/', 'AdminController@index')->name('admin_dashboard');

    // UTILISATEURS
    Route::get('users', 'AdminController@showUsers')->name('admin_users');
    Route::match(['get', 'post'], 'user/edit/{id?}', 'AdminController@editUser')->name('admin_edit_user');
    Route::get('user/delete/{id?}', 'AdminController@deleteUser')->name('admin_delete_user');

    // METIERS
    Route::get('metiers', 'AdminController@showMetiers')->name('admin_metiers');
    Route::match(['get', 'post'], 'metier/edit/{id?}', 'AdminController@editMetier')->name('admin_edit_metier');
    Route::get('metier/delete/{id}', 'AdminController@deleteMetier')->name('admin_delete_metier');

    // SECTEURS
    Route::get('secteurs', 'AdminController@showSecteurs')->name('admin_secteurs');
    Route::match(['get', 'post'], 'secteur/edit/{id?}', 'AdminController@editSecteur')->name('admin_edit_secteur');
    Route::get('secteur/delete/{id}', 'AdminController@deleteSecteur')->name('admin_delete_secteur');

    // FORMATIONS
    Route::get('formations', 'AdminController@showFormations')->name('admin_formations');
    Route::match(['get', 'post'], 'formations/edit/{id?}', 'AdminController@editFormation')->name('admin_edit_formation');
    Route::get('formation/delete/{id}', 'AdminController@deleteFormation')->name('admin_delete_formation');

    Route::get('formation/{id}/etablissements', 'AdminController@showFormationEtablissements')->name('admin_formation_etablissements');
    Route::post('formation/etablissement/add', 'AdminController@addEtablissementToFormation')->name('admin_formation_etablissement_add');

    // ETABLISSEMENTS
    Route::get('etablissements', 'AdminController@showEtablissements')->name('admin_etablissements');
    Route::match(['get', 'post'], 'etablissement/edit/{id?}', 'AdminController@editEtablissement')->name('admin_edit_etablissement');
    Route::get('etablissement/delete/{id}', 'AdminController@deleteEtablissement')->name('admin_delete_etablissement');

    Route::get('etablissement/{id}/formations', 'AdminController@showEtablissementFormations')->name('admin_etablissement_formations');
    Route::post('etablissement/formation/add', 'AdminController@addFormationToEtablissement')->name('admin_etablissement_formation_add');

    // CODES
    Route::get('codes', 'AdminController@showCodes')->name('admin_codes');
    Route::match(['get', 'post'], 'code/edit/{id?}', 'AdminController@editCode')->name('admin_edit_code');
    Route::get('code/delete/{id}', 'AdminController@deleteCode')->name('admin_delete_code');

    Route::get('code/{id}/formations', 'AdminController@showCodeFormations')->name('admin_code_formations');
    Route::post('code/formation/add', 'AdminController@addFormationToCode')->name('admin_code_formation_add');

    Route::get('code/{id}/metiers', 'AdminController@showCodeMetiers')->name('admin_code_metiers');
    Route::post('code/metier/add', 'AdminController@addMetierToCode')->name('admin_code_metier_add');

    // SAVOIRS
    Route::get('savoirs', 'AdminController@showSavoirs')->name('admin_savoirs');
    Route::match(['get', 'post'], 'savoir/edit/{id?}', 'AdminController@editSavoir')->name('admin_edit_savoir');
    Route::get('savoir/delete/{id}', 'AdminController@deleteSavoir')->name('admin_delete_savoir');

    Route::get('savoir/{id}/codes', 'AdminController@showSavoirCodes')->name('admin_savoir_codes');
    Route::get('savoir/code/add', 'AdminController@addCodeToSavoir')->name('admin_savoir_code_add');

    // SAVOIR-FAIRE
    Route::get('savoir-faire', 'AdminController@showSavoirFaire')->name('admin_savoir_faire');
    Route::match(['get', 'post'], 'savoir-faire/edit/{id?}', 'AdminController@editSavoirFaire')->name('admin_edit_savoir_faire');
    Route::get('savoir-faire/delete/{id}', 'AdminController@deleteSavoirFaire')->name('admin_delete_savoir_faire');

    Route::get('savoir-faire/{id}/codes', 'AdminController@showSavoirFaireCodes')->name('admin_savoir_faire_codes');
    Route::get('savoir-faire/code/add', 'AdminController@addCodeToSavoirFaire')->name('admin_savoir_faire_code_add');

    // SAVOIR-ÊTRE
    Route::get('savoir-etre', 'AdminController@showSavoirEtre')->name('admin_savoir_etre');
    Route::match(['get', 'post'], 'savoir-etre/edit/{id?}', 'AdminController@editSavoirEtre')->name('admin_edit_savoir_etre');
    Route::get('savoir-etre/delete/{id}', 'AdminController@deleteSavoirEtre')->name('admin_delete_savoir_etre');

    Route::get('savoir-etre/{id}/metiers', 'AdminController@showSavoirEtreMetiers')->name('admin_savoir_etre_metiers');
    Route::get('savoir-etre/metier/add', 'AdminController@addMetierToSavoirEtre')->name('admin_savoir_etre_metier_add');

    // MOTIVATIONS
    Route::get('motivations', 'AdminController@showMotivations')->name('admin_motivations');
    Route::match(['get', 'post'], 'motivation/edit/{id?}', 'AdminController@editMotivation')->name('admin_edit_motivation');
    Route::get('motivation/delete/{id}', 'AdminController@deleteMotivation')->name('admin_delete_motivation');

    Route::get('motivation/{id}/metiers', 'AdminController@showMotivationMetiers')->name('admin_motivation_metiers');
    Route::get('motivation/metier/add', 'AdminController@addMetierToMotivation')->name('admin_motivation_metier_add');

    // CAREERDIRECT - PARAMS    
    Route::get('careerdirectparam', 'AdminController@showCareerdirectparams')->name('admin_careerdirectparam');
    Route::match(['get', 'post'], 'careerdirectparam/edit/{id?}', 'AdminController@editCareerdirectparam')->name('admin_edit_careerdirectparam');
    Route::get('careerdirectparam/delete/{id?}', 'AdminController@deleteCareerdirectparam')->name('admin_delete_careerdirectparam');




    // SCRAPING ET AUTRES
    Route::get('scraping_codes_rome', 'ScrapingController@scrapingCodesRomeProches')->name('scraping_codes_rome');// Mettre à jour les codes romes proches des métiers
    Route::get('scraping_fiche_metier', 'ScrapingController@scrapingFicheMetier')->name('scraping_fiche_metier');// Mettre à jour les métiers
    Route::get('calcul', 'ScrapingController@calculNiveauEntree')->name('formations_calcul');//Calculer les niveaux d'entrée des formations
    Route::get('insert_etablissements_id', 'ScrapingController@insertEtablissementsId')->name('insert_etablissements_id'); //
    Route::get('scraping_liens_etablissements', 'ScrapingController@scrapingLiensEtablissements')->name('scraping_liens_etablissements'); //
    Route::get('junction_tables', 'ScrapingController@junctionTables')->name('junction_tables'); // configuration des tables de jonctions
    Route::get('scraping_savoir_etre', 'ScrapingController@scrapingSavoirEtre');
    Route::get('scraping_users', 'ScrapingController@scrapingUsers');
    Route::get('junction_codes', 'ScrapingController@junctionCodes');
    Route::get('scraping_formations', 'ScrapingController@scrapingFicheRNCPviaGoogle');
});
