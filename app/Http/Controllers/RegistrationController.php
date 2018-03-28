<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class RegistrationController extends Controller
{
  public function __construct(){
    $this->middleware('guest')->except('change', 'edit');
    $this->middleware('auth')->only('change');
  }
  public function create()
  {
    return view('users.create');
  }

  public function store()
  {
    $this->validate(request(),[
      'name' => 'required|min:2',
      'username' => 'required|unique:users',
      'email'=> 'required|email|unique:users',
      'password' => 'required|confirmed',
      'age' => 'required|numeric',
      'art' => 'required'
    ]);

    $user = User::create([
      'name' => request('name'),
      'username' => request('username'),
      'email'=> request('email'),
      'age' => request('age'),
      'art' => request('art'),
      'password' => bcrypt(request('password')),
      'about_me' => request('about_me')
    ]);

    auth()->login($user);

    return redirect()->home();
  }

  public function change()
  {
    return view('users.edit');
  }

  public function edit($user)
  {

      $this->validate(request(),[
      'name' => 'required|min:2',
      'password' => 'required|confirmed',
      'age' => 'required|numeric',
      'art' => 'required',
      'email' => 'required|email|unique:users,email,'.$user
    ]);

    $user = User::find($user);
    $user->name = request('name');
    $user->email = request('email');
    $user->age = request('age');
    $user->art = request('art');
    $user->about_me = htmlspecialchars(request('about_me'));
    $user->password = bcrypt(request('password'));
    $user->save();
    return redirect()->home();
  }
}
