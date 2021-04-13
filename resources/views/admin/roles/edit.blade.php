@extends('layouts.admin_layout')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Role</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div style="padding-top:10px; padding-left:208px;" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-3">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="width: 200px;" class="row">
                <form method="POST" action="/admin/roles/{{ $role['id'] }}" enctype="multipart/form-data">
                @csrf
               @method("put") 
                       
               <div style="width: 600px;" class="form-group">
                            <label for="role_name">Role name</label>
                            <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..." value="{{$role->name}}" required>
                            <label class="text-danger"> {{$errors->first("name")}}</label>
                        </div>
                        <div class="form-group">
                            <label for="role_slug">Role Slug</label>
                            <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role Slug..." value="{{$role->slug}}" required>
                            <label class="text-danger"> {{$errors->first("name")}}</label>
                        </div>
                        <div class="form-group" >
                            <label for="roles_permissions">Add Permissions</label>
                            <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="@foreach ($role->permissions as $permission)
                              {{$permission->name. ','}}
                              @endforeach">   
                        </div>    
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        <br><br><br><br>
                    </form>
                    @section('css_role_page')
                       <link rel="stylesheet" href="{{asset('AdminLTE-3.1.0-rc/dist/css/bootstrap-tagsinput.css')}}">
                    @endsection('css_role_page')

                    @section('js_role_page')
                       <script src="{{asset('AdminLTE-3.1.0-rc/dist/js/bootstrap-tagsinput.js')}}"></script>
                       <script>
                      $(document).ready(function(){
                          $('#role_name').keyup(function(e){
                              var str = $('#role_name').val();
                              str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                              $('#role_slug').val(str);
                              $('#role_slug').attr('placeholder', str);
                          });
                      });
                   </script>
                    @endsection('js_role_page')
                </div>
            </div>

        </div>
    </div>
    @endsection('content')