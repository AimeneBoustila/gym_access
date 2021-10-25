<?php

use App\Reservation;
use App\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Route::get('/code', function(){
    dd(Hash::make('labo'));
});

Route::post('/write', 'HomeController@write')->name('write');



Route::get('/test', function(){
    $dz = Membre::getActivity();
    dd(session('activity'));    
    
})->name('callendar');


Route::group(['prefix' => 'produit', 'as' => 'produit'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'ProduitController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'ProduitController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'ProduitController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'ProduitController@destroy']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'ProduitController@edit']);
    Route::post('/update/{produit}', ['as' => '.update', 'uses' => 'ProduitController@update']);    
});

Route::group(['prefix' => 'setting', 'as' => 'setting'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'SettingController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'SettingController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'SettingController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'SettingController@destroy']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'SettingController@edit']);
    Route::post('/update/{setting}', ['as' => '.update', 'uses' => 'SettingController@update']);    
});


Route::group(['prefix' => 'facture', 'as' => 'facture'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'FactureController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'FactureController@create']);
    Route::get('/print/{facture}',['as'=>'.print', 'uses' => 'FactureController@print']);
    Route::post('/create', ['as' => '.store', 'uses' => 'FactureController@store']);
    Route::post('/calculer', ['as' => '.calculer', 'uses' => 'FactureController@calculer']);
    
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'FactureController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'FactureController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'FactureController@edit']);
    Route::get('/show/{id_facture}', ['as' => '.show', 'uses' => 'FactureController@show']);
    Route::post('/update/{facture}', ['as' => '.update', 'uses' => 'FactureController@update']);    

});

Route::group(['prefix' => 'presence', 'as' => 'presence'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'PresenceController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'PresenceController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'PresenceController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'PresenceController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'PresenceController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'PresenceController@edit']);
    Route::get('/print/{cd_presence}', ['as' => '.print', 'uses' => 'PresenceController@print']);
    Route::post('/update/{presence}', ['as' => '.update', 'uses' => 'PresenceController@update']);    
});

Route::group(['prefix' => 'crenau', 'as' => 'crenau'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'CrenauController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'CrenauController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'CrenauController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'CrenauController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'CrenauController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'CrenauController@edit']);
    Route::get('/print/{cd_Crenau}', ['as' => '.print', 'uses' => 'CrenauController@print']);
    Route::post('/update/{crenau}', ['as' => '.update', 'uses' => 'CrenauController@update']);    
});


Route::group(['prefix' => 'activitie', 'as' => 'activitie'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'ActivitieController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'ActivitieController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'ActivitieController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'ActivitieController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'ActivitieController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'ActivitieController@edit']);
    Route::get('/print/{cd_activitie}', ['as' => '.print', 'uses' => 'ActivitieController@print']);
    Route::post('/update/{activitie}', ['as' => '.update', 'uses' => 'ActivitieController@update']);    
});

// Route::group(['prefix' => 'rapport', 'as' => 'rapport'], function () {
//     Route::get('/', ['as' => '.index', 'uses' => 'RapportController@index']);
//     Route::get('/create',['as'=>'.create', 'uses' => 'RapportController@create']);
//     Route::post('/create', ['as' => '.store', 'uses' => 'RapportController@store']);
//     Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'RapportController@destroy']); 
//     Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'RapportController@stock']); 
//     Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'RapportController@edit']);
//     Route::get('/print/{cd_rapport}', ['as' => '.print', 'uses' => 'RapportController@print']);
//     Route::post('/update/{rapport}', ['as' => '.update', 'uses' => 'RapportController@update']);    
// });

Route::group(['prefix' => 'stock', 'as' => 'stock'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'StockController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'StockController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'StockController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'StockController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'StockController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'StockController@edit']);
    Route::get('/print/{id_analyse}', ['as' => '.print', 'uses' => 'StockController@print']);
    Route::post('/update/{stock}', ['as' => '.update', 'uses' => 'StockController@update']);    
});


Route::group(['prefix' => 'operateur', 'as' => 'operateur'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'OperateurController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'OperateurController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'OperateurController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'OperateurController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'OperateurController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'OperateurController@edit']);
    Route::get('/show/{id_operateur}', ['as' => '.show', 'uses' => 'OperateurController@show']);
    Route::post('/update/{operateur}', ['as' => '.update', 'uses' => 'OperateurController@update']);    
});

Route::group(['prefix' => 'setting', 'as' => 'setting'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'SettingController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'SettingController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'SettingController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'SettingController@destroy']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'SettingController@edit']);
    Route::get('/show/{id_setting}', ['as' => '.show', 'uses' => 'SettingController@show']);
    Route::post('/update/{setting}', ['as' => '.update', 'uses' => 'SettingController@update']);    
});

Route::group(['prefix' => 'inscription', 'as' => 'inscription'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'InscriptionController@index']);
    Route::get('/presence/{inscription}', ['as' => '.presence', 'uses' => 'InscriptionController@presence']);

    Route::get('/create',['as'=>'.create', 'uses' => 'InscriptionController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'InscriptionController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'InscriptionController@destroy']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'InscriptionController@edit']);
    Route::post('/update/{inscription}', ['as' => '.update', 'uses' => 'InscriptionController@update']);    
});

Route::group(['prefix' => 'membre', 'as' => 'membre'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'MembreController@index']);
    Route::get('/inscriptions/{membre}', ['as' => '.inscriptions', 'uses' => 'MembreController@inscriptions']);
    Route::get('/create',['as'=>'.create', 'uses' => 'MembreController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'MembreController@store']);
    Route::get('/destroy/{id_membre}', ['as' => '.destroy', 'uses' => 'MembreController@destroy']); 
    Route::get('/state/{id_membre}', ['as' => '.state', 'uses' => 'MembreController@state']); 
    Route::get('/facture/{id_membre}', ['as' => '.facture', 'uses' => 'MembreController@facture']); 
    Route::get('/edit/{id_membre}', ['as' => '.edit', 'uses' => 'MembreController@edit']);
    Route::get('/plus/{id_membre}', ['as' => '.plus', 'uses' => 'MembreController@plus']);
    Route::get('/minus/{id_membre}', ['as' => '.minus', 'uses' => 'MembreController@minus']);
    Route::get('/presence/{id_membre}/{inscription}', ['as' => '.presence', 'uses' => 'MembreController@presence']);

    Route::post('/update/{membre}', ['as' => '.update', 'uses' => 'MembreController@update']);    
    Route::get('/profile/{membre}', ['as' => '.profile', 'uses' => 'MembreController@profile']);



    // Route::get('/verifier/{id_membre}', ['as' => '.edit', 'uses' => 'MembreController@verifier']);

    
});

Route::group(['prefix' => 'abonnement', 'as' => 'abonnement'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'AbonnementController@index']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'AbonnementController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'AbonnementController@store']);
    Route::post('/update/{id_abonnement}', ['as' => '.update', 'uses' => 'AbonnementController@update']);
    Route::get('/destroy/{id_abonnement}', ['as' => '.destroy', 'uses' => 'AbonnementController@destroy']);    
    Route::get('/edit/{id_abonnement}', ['as' => '.edit', 'uses' => 'AbonnementController@edit']);
    Route::get('/profil/{id_abonnement}', ['as' => '.profil', 'uses' => 'AbonnementController@profil']);
});


Route::group(['prefix' => 'activity', 'as' => 'activity'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'ActivityController@index']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'ActivityController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'ActivityController@store']);
    Route::post('/update', ['as' => '.update', 'uses' => 'ActivityController@update']);
    Route::get('/destroy/{ad_Activity}', ['as' => '.destroy', 'uses' => 'ActivityController@destroy']);    
    Route::get('/edit/{ad_Activity}', ['as' => '.edit', 'uses' => 'ActivityController@edit']);
});



Route::get('/', function(){
    return view()
});

Auth::routes();











Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/livreur', 'Auth\LoginController@showLivreurLoginForm')->name('login.Livreur');
Route::get('/login/fournisseur', 'Auth\LoginController@showFournisseurLoginForm')->name('login.Fournisseur');
Route::get('/login/freelancer', 'Auth\LoginController@showFreelancerLoginForm')->name('login.Freelancer');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/livreur', 'Auth\RegisterController@showLivreurRegisterForm')->name('register.Livreur');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/livreur', 'Auth\LoginController@livreurLogin');
Route::post('/login/fournisseur', 'Auth\LoginController@fournisseurLogin');
Route::post('/login/freelancer', 'Auth\LoginController@freelancerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/livreur', 'Auth\RegisterController@createLivreur')->name('register.Livreur');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rapport', 'HomeController@rapport')->name('rapport');
Route::get('/stats', 'HomeController@stats')->name('stats');
Route::get('/libres', 'HomeController@libres')->name('libres');

Route::get('/activities', 'HomeController@activities')->name('activities');
Route::post('/activities/filter', 'HomeController@FilterActivities')->name('activities.filter');

Route::post('/rapport/filter', 'HomeController@filter')->name('rapport.filter');

Route::post('/libre/filter', 'HomeController@filter')->name('libre.filter');
Route::post('/stats/filter', 'HomeController@statsFilter')->name('stats.filter');

Route::post('/activity', 'HomeController@activity')->name('activity');


Route::get('/admin', 'HomeController@index')->name('home');



Route::group(['prefix' => 'categorie', 'as' => 'categorie'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'CategorieController@index']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'CategorieController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'CategorieController@store']);
    Route::post('/update/{id_categorie}', ['as' => '.update', 'uses' => 'CategorieController@update']);
    Route::get('/destroy/{id_categorie}', ['as' => '.destroy', 'uses' => 'CategorieController@destroy']);    
    Route::get('/edit/{id_categorie}', ['as' => '.edit', 'uses' => 'CategorieController@edit']);
});


