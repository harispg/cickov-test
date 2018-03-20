<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
  public function show()
  {
    $users = User::orderBy('email')->paginate(5);
    return view('artists')->with(compact('users'));
  }
}
