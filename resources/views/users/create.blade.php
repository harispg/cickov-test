@extends('layouts.master')

@section('content')

<div class="row">

 <div class="container col-md-6">
  <form class="form-horizontal" id="registration_form" action="/register" method="POST">
    {{ csrf_field() }}
    <h3>If you are new to our websiete please feel free to join us</h3>
    <div class="form-group">
      <div class="row">
      <label class="col-md-3" for="name">Name: </label>
      <input id="nameRegister"type="text" class="form-control col-md-9" id="name" name="name" required>
      </div>
    </div>

  <div class="form-group">
    <div class="row">
      <label class="col-md-3" for="username">Username:</label>
      <input id="userRegister"type="text" class="form-control col-md-9" name="username" required>
    </div>
  </div>
    <div class="form-group">
      <div class="row">
      <label class="col-md-3" for="Age">Birth year:</label>
      <select id="ageRegister" class="form-control col-md-2" name="age" required>
        <option id="ageHint"></option>
      @for($year = 2018; $year >= 1890; $year--)
        <option value="{{$year}}">{{$year}}</option>
      @endfor
    </select>
      </div>
  </div>

    <div class="form-group">
      <div class="row">
      <label class="col-md-3" for="email">Email address:</label>
      <input id="emailRegister" type="email" class="form-control col-md-9" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
      <label class="col-md-3" for="art">Chose your art:</label>
      <select id="artRegister" class="form-control col-md-9" name="art" required>
        <option id="artHint"></option>
        <option value="Painting">Painting</option>
        <option value="Statuary">Statuary</option>
        <option value="Writing">Writing</option>
        <option value="Music">Music</option>
        <option value="Theatre">Theatre</option>
        <option value="Movies">Movies</option>
        <option value="Architecture">Architecture</option>
      </select>
      <span id="spanArtRegister" class="span text-center">Chose your art</span>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
      <label class="col-md-3" for="password">Password:</label>
      <input id="passwRegister" type="password" class="form-control col-md-9" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
      <label class="col-md-3" for="password_confirmation">Password confirmation:</label>
      <input id="passConfirmRegister" type="password" class="form-control col-md-9" name="password_confirmation" required>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
      <label class="col-md-3" for="aboutMe">About you:</label>
      <textarea class="col-md-9" id="aboutRegister" class="form-control" name="about_me" rows="3"></textarea>
      <small> This is optional</small>
      </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>

  </form>

  </div>
 <div class="container col-md-6">

  <form id="login_form" action="/login" method="POST">
    {{ csrf_field() }}
<h3>Allready a member? Sign in:</h3>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input id="emailLogin" type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input id="passLogin" type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" id="login_submit">Login</button>
    </div>
  </form>
         @include('layouts.errors')

</div>
</div>
@endsection

@section('myScripts')
  <script>
  $(document).ready(function(){
    $("#nameRegister").mouseenter(function(){
      $(this).attr('placeholder', 'Enter your name and lastname');
    });
    $("#nameRegister").mouseleave(function(){
      $(this).removeAttr('placeholder');
    });

    $("#userRegister").mouseenter(function(){
      $(this).attr('placeholder', 'Enter your username');
    });
    $("#userRegister").mouseleave(function(){
      $(this).removeAttr('placeholder');
    });

    $("#ageRegister").mouseenter(function(){
      $("#ageHint").text('Chose');
    });
    $("#ageRegister").mouseleave(function(){
      $("#ageHint").text('');
    });

    $("#artRegister").mouseenter(function(){
      $("#artHint").text('Choose your art man!');
    });
    $("#artRegister").mouseleave(function(){
      $("#artHint").text('');
    });

    $("#emailRegister").mouseenter(function(){
      $(this).attr('placeholder', 'Enter your email: john@examle.com');
    });
    $("#emailRegister").mouseleave(function(){
    $(this).removeAttr('placeholder');
    });

    $("#passwRegister").mouseenter(function(){
      $(this).attr('placeholder', 'Enter your password');
    });
    $("#passwRegister").mouseleave(function(){
      $(this).removeAttr('placeholder');
    });

    $("#passConfirmRegister").mouseenter(function(){
      $(this).attr('placeholder', 'Confirm your password');
    });
    $("#passConfirmRegister").mouseleave(function(){
      $(this).removeAttr('placeholder');
    });

    $("#aboutRegister").mouseenter(function(){
      $(this).attr('placeholder', 'Write something about yourself');
    });
    $("#aboutRegister").mouseleave(function(){
      $(this).removeAttr('placeholder');
    });

    $("#emailLogin").mouseenter(function(){
      $(this).attr('placeholder', 'Enter your email');
    });
    $("#emailLogin").mouseleave(function(){
      $(this).removeAttr('placeholder');
    });

    $("#passLogin").mouseenter(function(){
      $(this).attr('placeholder', 'Enter your password');
    });
    $("#passLogin").mouseleave(function(){
      $(this).removeAttr('placeholder');
    });

  });
  </script>
@endsection
