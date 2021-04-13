@extends('layouts.admin_layout')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Ticket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Ticket</li>
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
                <form method="POST" action="/admin/tickets/{{ $ticket['id'] }}" enctype="multipart/form-data">
                @csrf
               @method("put") 
                       
               <div style="width: 600px;" class="form-group">
                            <label for="title">Ticket title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Ticket name..." value="{{$ticket->title}}" required>
                            <label class="text-danger"> {{$errors->first("name")}}</label>
                        </div>
                        <div class="form-group">
                            <label for="description">Ticket description</label>
                            <input type="text" name="description" tag="description" class="form-control" id="description" placeholder="description ..." value="{{$ticket->description}}" required>
                            <label class="text-danger"> {{$errors->first("name")}}</label>
                        </div>
                          
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        <br><br><br><br>
                    </form>
                  

                  
                </div>
            </div>

        </div>
    </div>
    @endsection('content')