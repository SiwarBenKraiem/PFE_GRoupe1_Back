<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::group(['prefix' => 'v1'], function () {
Route::Post('login','AuthController@login');
Route::get('logout','AuthController@logout');
Route::Post('Register','AuthController@Register');
Route::Post('forgot_password',' ForgotPasswordController@password');
Route::get('listeUser','UserController@liste');
Route::post('add','UserController@Ajout');
Route::post('import','UserController@import');
Route::get('search/{query}','UserController@search');
Route::delete('supp/{id}','UserController@supp');
Route::delete('suppAuto','UserController@suppression_auto');

Route::get('listeDomaine','DomaineController@liste');
Route::Post('addDomaine','DomaineController@Ajout');
Route::get('chercherD/{nomD}','DomaineController@chercherD');
Route::get('chercherDomaine/{req}','DomaineController@chercher');
Route::delete('suppD/{id}','DomaineController@suppD');


Route::Post('addgrp','GroupeController@Ajout');
Route::get('groupe/{id}','GroupeController@groupe');
Route::get('listeGroupe','GroupeController@liste');
Route::delete('suppG/{id}','GroupeController@SuppG');
Route::get('searchG/{query}','GroupeController@search');
Route::post('affectation','GroupeController@affectation');
Route::post('affectationA','AffectationController@affectation');
Route::get('number/{id}','AffectationController@number');


Route::get('listesousgrp/{query}','GroupeController@listesousgrp');
Route::post('store','ModuleController@store');
Route::get('searchModule/{query}','ModuleController@searchModule');




Route::get('chercherS/{nomS}','spController@chercherS');
Route::get('listespecialite','SpController@liste');
Route::Post('ajouter','SpController@ajouter');
Route::delete('suppS/{id}','SpController@suppS');

Route::Post('AjouterSujet','SujetController@AjouterSujet');
Route::get('ListerSujet','SujetController@ListerSujet');
Route::Post('storeQuestion','QuestionController@storeQuestion');
Route::Post('ajoutoption','OptionController@ajoutoption');
Route::Post('storeQuestionnaire','QuestionnaireController@storeQuestionnaire');
Route::put('update/{id}','QuestionnaireController@update');
Route::get('ListerQuestionnaire','QuestionnaireController@ListerQuestionnaire');
Route::get('SearchQST/{query}','QuestionnaireController@SearchQST');
Route::get('listqst','QuestionController@listqst');
Route::get('Listerf','FormationController@Listerf');
Route::delete('deleteQ/{nom}','QuestionnaireController@deleteQ');
Route::post('changepassword','UserController@changepassword');


Route::group([    
      
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});
Route::post('forgot','ForgotPassword@forgot');
Route::post('resett','PasswordResetController@resett');



