@extends('layouts.master')

@section('content')

  <div class="row">

   <div class="container col-md-6">
    <form class="form-horizontal" id="registration_form" action="/edit/{{auth()->id()}}" method="POST">
      {{ csrf_field() }}
      <h3>Update your information</h3>
      <div class="form-group">
        <div class="row">
        <label class="col-md-3" for="name">Name: </label>
        <input id="nameRegister"type="text" class="form-control col-md-9" id="name" name="name" value="{{request()->old('name')}}" required>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
        <label class="col-md-3" for="Age">Birth year:</label>
        <select id="ageRegister" class="form-control col-md-2" name="age" required>
          <option id="ageHint"></option>
        @for($age = 120; $age >= 18; $age--)
          <option value="{{$age}}" @if($age==auth()->user()->age) selected="selected" @endif>{{$age}}</option>
        @endfor
      </select>
        </div>
     </div>

      <div class="form-group">
        <div class="row">
        <label class="col-md-3" for="email">Email address:</label>
        <input id="emailRegister" type="email" class="form-control col-md-9" name="email" value="{{auth()->user()->email}}" required>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
        <label class="col-md-3" for="art">Chose your art:</label>
        <select id="artRegister" class="form-control col-md-9" name="art" required>
          <option id="artHint"></option>
          <option value="Painting" @if(auth()->user()->art=='Painting') selected="selected" @endif>Painting</option>
          <option value="Statuary" @if(auth()->user()->art=='Statuary') selected="selected" @endif>Statuary</option>
          <option value="Writing" @if(auth()->user()->art=='Writing') selected="selected" @endif>Writing</option>
          <option value="Music" @if(auth()->user()->art=='Music') selected="selected" @endif>Music</option>
          <option value="Theatre" @if(auth()->user()->art=='Theatre') selected="selected" @endif>Theatre</option>
          <option value="Movies" @if(auth()->user()->art=='Movies') selected="selected" @endif>Movies</option>
          <option value="Architecture" @if(auth()->user()->art=='Architecture') selected="selected" @endif>Architecture</option>
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
        <textarea class="col-md-9" id="aboutRegister" class="form-control" name="about_me" rows="3" placeholder="{{auth()->user()->about_me}}"></textarea>
        <small> This is optional</small>
        </div>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
      </div>

    </form>

    </div>
  </div>
 @include('layouts.errors')
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


  $("#ageRegister").mouseenter(function(){
    $("#ageHint").text('Choose');
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
});
</script>
@endsection
