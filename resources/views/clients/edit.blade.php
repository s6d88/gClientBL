@extends('layouts.app')

@section('title', "Edit Client" )


@section('content')
<div class="container-fluid">
    <div class="row">

      @includeIf('layouts.sidebar')


      <div class="col-md-9 mt-5">
          <div class="row">
            <div class="col-md-12">
               @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
            </div>
          </div>
          <div class="card col-sm-8 m-2 p-2">
            <form action="{{ url('/clients/'.$editclients->id)}} " method="post" >
            {{ method_field('PUT')}}
            {{ csrf_field()}}
            <div class="form-group">
              <label >Nom</label>
              <input type="text" class="form-control" name="lname" value="{{$editclients->nom}} ">
            </div>
            <div class="form-group">
              <label >Prénom</label>
              <input type="text" class="form-control" name="fname" value="{{$editclients->prenom}} ">
            </div>
            <div class="form-group">
              <label >Téléphone</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" >+212</span>
                </div>
                <input type="tel" class="form-control" name="tel" value="{{$editclients->tel}} ">
              </div>
            </div>
            <div class="form-group">
              <label >Email address</label>
              <input type="email" class="form-control" name="email" value="{{$editclients->email}} ">
            </div>
            <div class="form-group">
              <label >Address</label>
              <input type="text" class="form-control" name="address" value=" {{$editclients->address}}">
            </div>
             <div class="form-group">
              <label >Date</label>
              
              <input class="datepicker form-control" type="text" name="updated_date" value="{{  date("m/d/Y", strtotime($editclients->updated_at)) }}  ">
            </div> 
          

            
            
            <button type="submit" class="btn btn-primary btn-block">Modifier</button>
          </form>
          </div>
          
        </div>
    </div>
</div>
  

  

 

@endsection

