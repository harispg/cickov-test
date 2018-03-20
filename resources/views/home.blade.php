@extends('layouts.master')

@section('content')

  <div class="container">
    <div class="jumbotron bg-success">
      <h1 class="display-3">Welcome artists</h1>
      <p class="lead">You are the soul of humanity, this is the place you deserve</p>
    </div>
  </div>
@endsection

@section('myScripts')
<script>
  function changeText(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("demo").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "/AJAXsheet", true);
    xhttp.send();
  }
</script>
@endsection
