<?php

Route::get('/', 'indexController@index');
Route::post('/auth', 'indexController@auth');
Route::get('/quit', 'indexController@quit');

Route::get('/main', 'mainController@index')->middleware('authCheck');
Route::get('/loadClients', 'mainController@loadClients')->middleware('authCheck');
Route::post('/loadClientInfo', 'mainController@loadClientInfo')->middleware('authCheck');
Route::post('/editClientInfo', 'mainController@editClientInfo')->middleware('authCheck');
Route::post('/editInternet', 'mainController@editInternet')->middleware('authCheck');
Route::post('/editPass', 'mainController@editPass')->middleware('authCheck');
Route::post('/editIpMac', 'mainController@editIpMac')->middleware('authCheck');
Route::post('/payStatistic', 'mainController@payStatistic')->middleware('authCheck');
Route::post('/showMessages', 'mainController@showMessages')->middleware('authCheck');
Route::post('/sendMessages', 'mainController@sendMessages')->middleware('authCheck');
Route::post('/showSession', 'mainController@showSession')->middleware('authCheck');
Route::post('/closeSession', 'mainController@closeSession')->middleware('authCheck');
Route::post('/showHistory', 'mainController@showHistory')->middleware('authCheck');
Route::post('/showServices', 'mainController@showServices')->middleware('authCheck');
Route::post('/editServices', 'mainController@editServices')->middleware('authCheck');
Route::post('/showPing', 'mainController@showPing')->middleware('authCheck');

Route::get('/info', 'infoController@index')->middleware('authCheck');
Route::post('/info/quickRequest', 'infoController@quickRequest')->middleware('authCheck');
Route::get('/tableInformation', 'infoController@tableInformation')->middleware('authCheck');
Route::post('/saveInformation', 'infoController@saveInformation')->middleware('authCheck');
Route::post('/newOffer', 'infoController@newOffer')->middleware('authCheck');

Route::get('/workers', 'workerController@index')->middleware('authCheck');
Route::post('/workers/save', 'workerController@save')->middleware('authCheck');
Route::post('/workers/delete', 'workerController@delete')->middleware('authCheck');
Route::get('/workers/workersList', 'workerController@workersList')->middleware('authCheck');

Route::get('/request', 'requestController@main')->middleware('authCheck');
Route::get('/request/open', 'requestController@openRequest')->middleware('authCheck');
Route::get('/loadRequests', 'requestController@loadRequests')->middleware('authCheck');
Route::get('/request/new', 'requestController@newRequest')->middleware('authCheck');
Route::post('/request/save', 'requestController@saveRequest')->middleware('authCheck');