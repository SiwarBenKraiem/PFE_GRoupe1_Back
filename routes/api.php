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
Route::get('listegrpnonvide','AffectationController@listegrpnonvide');
Route::post('affectationFormationGroupe','AffectationController@affectationFormationGroupe');



Route::post('affectationA','AffectationController@affectation');


Route::get('number/{id}','AffectationController@number');
Route::get('numbers/{id}','AffectationController@numberS');
Route::get('numberss/{id}','AffectationController@numberSS');
Route::get('listeaff','AffectationController@listeaff');
Route::get('listeUserGrp/{id}','AffectationController@listeUserGrp');

Route::get('listesousgrp/{query}','GroupeController@listesousgrp');



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


/*Route::group([    
      
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});*/

/**********************formation**********************/
Route::Post('addFormation','FormationController@Ajout');
Route::get('listeF','FormationController@listeF');
Route::get('chercherF/{nomF}','FormationController@chercherF');


Route::put('prolonger','SessionController@prolonger');
Route::Post('addSession','SessionController@Ajouter');
Route::get('listeS','SessionController@listeS');
/****************Module******************************/
Route::get('findIdModule/{nom_module}','ModuleController@findIdModule');
Route::Post('addModule','ModuleController@Ajout');
//Route::get('afect','FormationController@afect');


Route::get('listeModule','ModuleController@ListeModule');
Route::get('chercherM/{nomM}','ModuleController@chercherM');

/******************************contenu****************************/
Route::Post('addContenu','ContenuController@Ajout');
/*******************type***********************/
Route::get('findIdType/{nom_type}','TypeController@findIdType');
Route::get('listeT','TypeController@listeT');
/***********************Module_Formation **************************/
Route::post('affectationModuleFormation','Formation_Module_Controller@affectation');
Route::get('listeA','Formation_Module_Controller@listeAffectation');

/************************formation_session ********************************/
Route::get('listeAffectation','Formation_sessionController@listeAffectation');
Route::post('affectationFormationSession','Formation_sessionController@affectation');

Route::post('forgot','ForgotPassword@forgot');
Route::post('resett','PasswordResetController@resett');
Route::get('Consulter/{id}','UserController@Consulter');



