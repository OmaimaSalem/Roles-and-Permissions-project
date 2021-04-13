@extends('layouts.admin_layout')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Tickets</li>
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
                            <h3><span class="fa fa-users"></span> Tickets <button class="btn btn-success m-l-15"><span class="fa fa-plus"></span> <a style="text-decoration: none ; color: white;" href="{{route('tickets.create')}}">Add Ticket</a></button></h3>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                        </div>
                        <div class="col-xs-12">
                        <table class="table table-bordered table-striped bg-dark" style="color:white; border:none" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>User</th>
                                    <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody style="color:black; font:blod; background:#ffff">
                                   @foreach ($tickets as $ticket)
                                    <tr>
                                    <td>{{ $ticket['id'] }}</td>
                                    <td>{{ $ticket['title'] }}</td>
                                    <td>{{ $ticket['description'] }}</td>
                                    <td>
                                    <span class="badge badge-secondary">
                                    {{ $ticket->user['name'] }}                                   
                                    </span>
                                   </td>
                                         <td>
                                            <a href="/admin/tickets/{{ $ticket['id'] }}"><i class="fa fa-eye"></i></a>
                                            <a href="/admin/tickets/{{ $ticket['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('tickets.destroy',$ticket)}}" method="Post" style="display:inline-block;">
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