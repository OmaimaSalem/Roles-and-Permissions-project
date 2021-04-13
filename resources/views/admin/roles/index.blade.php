@extends('layouts.admin_layout')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Roles</li>
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
                            <h3><span class="fa fa-users"></span> Roles <button class="btn btn-success m-l-15"><span class="fa fa-plus"></span> <a style="text-decoration: none ; color: white;" href="{{route('roles.create')}}">Add Role</a></button></h3>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                        </div>
                        <div class="col-xs-12">
                        <table class="table table-bordered table-striped bg-dark" style="color:white; border:none" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Role</th>
                                    <th>Slug</th>
                                    <th>Permissions</th>
                                    <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody style="color:black; font:blod; background:#ffff">
                                   @foreach ($roles as $role)
                                    <tr>
                                    <td>{{ $role['id'] }}</td>
                                    <td>{{ $role['name'] }}</td>
                                    <td>{{ $role['slug'] }}</td>
                                    <td>
                                    @if ($role->permissions != null)
                                    @foreach ($role->permissions as $permission)
                                    <span class="badge badge-secondary">
                                        {{ $permission->name }}                                    
                                    </span>
                                    @endforeach
                                    @endif
                                   </td>
                                         <td>
                                            <a href="/admin/roles/{{ $role['id'] }}"><i class="fa fa-eye"></i></a>
                                            <a href="/admin/roles/{{ $role['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('roles.destroy',$role)}}" method="Post" style="display:inline-block;">
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