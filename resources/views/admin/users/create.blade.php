@extends('layouts.admin_layout')
@section('content')
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add user</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add user</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div style="padding-top:10px; padding-left:208px ;" class="container-fluid">
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
               
                <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div style="width: 600px;" class="form-group">
                            <label for="first_name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name" >
                            <!-- <label class="text-danger"> {{$errors->first("name")}}</label> -->
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter email"  name="email" >
                            <!-- <label class="text-danger"> {{$errors->first("email")}}</label> -->
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                            <!-- <label class="text-danger"> {{$errors->first("password")}}</label> -->
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Password Confirmation</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirmation" placeholder="Password Confirmation" >
                            <!-- <label class="text-danger"> {{$errors->first("password_confirmation")}}</label> -->
                        </div>
                         <div class="form-group">
                          <label for="role">Select Role</label>
                           <select class="role form-control" name="role" id="role">
                            <option value="">Select Role...</option>
                            @foreach ($roles as $role)
                             <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                           </select>
                         </div> 
                         <div id="permissions_box" >
                            <label for="roles">Select Permissions</label>
                            <div id="permissions_ckeckbox_list">
                        
                            </div>
                        </div>    
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        <br><br><br><br>
                    </form>
                @section('js_user_page')
                    <script>
                        $(document).ready(function(){
                            var permissions_box = $('#permissions_box');
                            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');

                            permissions_box.hide(); // hide all boxes
                            $('#role').on('change', function() {
                                var role = $(this).find(':selected');    
                                var role_id = role.data('role-id');
                                var role_slug = role.data('role-slug');
                                permissions_ckeckbox_list.empty();

                                $.ajax({
                                    url: "/admin/users/create",
                                    method: 'get',
                                    dataType: 'json',
                                    data: {
                                        role_id: role_id,
                                        role_slug: role_slug,
                                    }
                                }).done(function(data) {
                                    console.log(data);
                                    permissions_box.show();                        
                                    // permissions_ckeckbox_list.empty();
                                    $.each(data, function(index, element){
                                        $(permissions_ckeckbox_list).append(       
                                            '<div class="custom-control custom-checkbox">'+                         
                                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                                '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                                            '</div>'
                                        );

                                    });
                                });
                            });
                        });
                    </script>
                @endsection
                </div>
            </div>
        </div>
    </div>
@endsection('content')
 