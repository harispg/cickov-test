<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxRequestsController extends Controller
{
    public function publish()
    {
      return view('ajaxTest');
    }
}
