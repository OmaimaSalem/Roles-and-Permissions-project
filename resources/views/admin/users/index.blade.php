@extends('layouts.admin_layout')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All user</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All user</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
        <div style="padding-top:10px; padding-left:50px ;" class="container-fluid">
            <div class="row">
                <div class="col-xs-12 sub">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3><span class="fa fa-users"></span> Users <button class="btn btn-success m-l-15"><span class="fa fa-plus"></span> <a style="text-decoration: none ; color: white;" href="{{route('users.create')}}">Add User</a></button></h3>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                        </div>
                        <div class="col-xs-12">
                        <table class="table table-bordered table-striped bg-dark" style="color:white; border:none" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Role</th>
                                      <th>Permissions</th>
                                      <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody style="color:black; font:blod; background:#ffff">
                                    <tr>
                                      @foreach($users as $user)
                                      <td>{{$user['id']}}</td>
                                        <td>{{$user['name']}}</td>
                                        <td>{{$user['email']}}</td>
                                         <td>
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-secondary">
                                                    {{ $role->name }}
                                                </span>
                                            @endforeach
                                        
                                         </td>
                                         <td>
                                         @foreach ($user->permissions as $permission)
                                          <span class="badge badge-secondary">
                                              {{ $permission->name }}                                    
                                          </span>
                                         @endforeach
                                         </td>
                                         <td>
                                            <a href="/admin/users/{{ $user['id'] }}"><i class="fa fa-eye"></i></a>
                                            <a href="/admin/users/{{ $user['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('users.destroy',$user)}}" method="Post" style="display:inline-block;">
                                               @csrf
                                               @method("delete")
                                             <button type="submit" value="Delete" class="fa fa-trash"></button> 
                                           </form>
                                          
                                        </td>
                                    </tr>
                                     @endforeach 
                                </tbody>
                            </table>
                            <div class="container"> 
                        </div> 
                        </div>
                    </div>
                </div>            
            </div>
      </div>
            
@endsection('content')