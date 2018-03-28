<?php


Route::get('/', function () {return view('home');})->name('home');

Route::get('/artists', 'UsersController@show');

Route::get('test', 'TestController@something')->middleware('auth', 'role:SuperUser');

Route::post('/ajaxData', 'AjaxRequestsController@sortByClick');

Route::get('/edit', 'RegistrationController@change');
Route::post('/edit/{user}', 'RegistrationController@edit');
Route::get('/register', 'RegistrationController@create')->name('login');
Route::post('/register', 'RegistrationController@store');

Route::post('/login', 'SessionsController@store')->middleware('throttle');
Route::get('/logout', 'SessionsController@destroy')->middleware('auth');
