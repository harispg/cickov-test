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
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/artists', function(){
  $users = User::orderBy('email')->paginate(5);
  return view('artists')->with(compact('users'));
            });

Route::post('/ajaxData', function(){
if(Request::ajax())
  {
    $users = User::orderBy($_POST['ajaxSort'])->paginate(5);
    return $users;
  }
});

Route::get('/edit', 'RegistrationController@change');
Route::post('/edit/{user}', 'RegistrationController@edit');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->middleware('auth');
