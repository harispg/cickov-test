@extends('layouts.master')

@section('content')

  <div class="container" id="svi">
    <h2>All our people</h2>
  <p>Check out our people and what they do:</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="tblsort" data-type="name">Name</th>
        <th class="tblsort" data-type="age">Age</th>
        <th>More</th>
        {{ csrf_field() }}
      </tr>
    </thead>
    <tbody id="tableArtists">
      @foreach ($users as $user)
        <tr class="artist{{$user->id}}">
        <td>{{$user->name}}</td>
        <td>{{$user->age}}</td>
        <td>
          <button
          class="show-modal btn btn-warning"
          data-id="{{$user->id}}"
          data-name="{{$user->name}}"
          data-art="{{$user->art}}"
          data-about="{{$user->about_me}}"
          data-email="{{$user->email}}">
            <span class="glyphicon glyphicon-eye-open">Show</span></button>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{$users->links('vendor.pagination.bootstrap-4')}}
  </div>

  <!-- This is modal for showing more info about artists -->
  <div id="showModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"></h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal" role="form">
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Email:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="email_show" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="name">Name:</label>
                          <div class="col-sm-10">
                              <input type="name" class="form-control" id="name_show" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="art">Art:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="art_show"  disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="about">About:</label>
                          <div class="col-sm-10">
                              <textarea class="form-control"  cols="40" rows="6" id="about_show"  disabled></textarea>
                          </div>
                      </div>
                  </form>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">
                          <span class='glyphicon glyphicon-remove'></span> Close
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>



@endsection

@section('myScripts')
  <script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $(document).ready(function(){
      $(".tblsort").click(function(){

        var sortby = $(this).data("type");
        $.ajax({
          type: "post",
          url: "/ajaxData",
          data: {ajaxSort: sortby},
          success: function(usersNew){
          renderUserTable(usersNew.data);
          }
        });
        });

        function renderUserTable(userlist){
          var content = "";
          for(var i=0;i<userlist.length;i++){
            content += '<tr class="artist'+userlist[i]["id"]+'"><td>'+userlist[i]["name"]+'</td><td>'+userlist[i]["age"]+'</td><td><button class="show-modal btn btn-warning" data-id="'+userlist[i]["id"]+'" data-name="'+userlist[i]["name"]+'" data-art="'+userlist[i]["art"]+'" data-about="'+userlist[i]["about_me"]+'" data-email="'+ userlist[i]["email"]+ '"> <span class="glyphicon glyphicon-eye-open">Show</span></button> </td> </tr>';
          }
          $("#tableArtists").html(content);
          // var active_page = $('.pagination li.active');
          // var active_number = $(active_page + ' span').html();
          // $(active_page).removeClass('active').html('<a href="artists?page='+active_number+'">'+active_number+'</a>');
          // $('.pagination li:nth-child(1) a').addClass('active').html('<span>1</span>');
        }

        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('More information');
            $('#id_show').val($(this).data('id'));
            $('#email_show').val($(this).data('email'));
            $('#name_show').val($(this).data('name'));
            $('#art_show').val($(this).data('art'));
            $('#about_show').val($(this).data('about'));
            $('#showModal').modal('show');
        });
    });
  </script>

@endsection
