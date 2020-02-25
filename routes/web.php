<?php

Route::get('/', 'indexController@index');
Route::post('/auth', 'indexController@auth');
Route::get('/quit', 'indexController@quit');

Route::get('/main', 'mainController@index')->middleware('authCheck');

Route::get('/info', 'infoController@index')->middleware('authCheck');
Route::get('/tableInformation', 'infoController@tableInformation')->middleware('authCheck');
Route::post('/saveInformation', 'infoController@saveInformation')->middleware('authCheck');
Route::post('/newOffer', 'infoController@newOffer')->middleware('authCheck');

Route::get('/workers', 'workerController@index')->middleware('authCheck');
Route::post('/workers/save', 'workerController@save')->middleware('authCheck');
Route::post('/workers/delete', 'workerController@delete')->middleware('authCheck');
Route::get('/workers/workersList', 'workerController@workersList')->middleware('authCheck');