<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AjaxRequestsController extends Controller
{
    public function publish()
    {
      return view('ajaxTest');
    }
    public function sortByClick()
    {
      if(Request::ajax())
        {
          $users = User::orderBy($_POST['ajaxSort'])->paginate(5);
          return $users;
        }
    }

}
