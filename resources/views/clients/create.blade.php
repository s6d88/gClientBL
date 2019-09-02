@extends('layouts.app')

@section('title', "Create Client" )

@section('content')
<div class="container-fluid">
    <div class="row">
      
     @includeIf('layouts.sidebar')
      <div class="col-md-9  mt-5 ">
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
          <form action="{{ url('/clients')}} " method="post" >
            {{ csrf_field()}}
            <div class="form-group">
              <label >Nom</label>
              <input type="text" class="form-control @if($errors->get('lname'))is-invalid @endif" name="lname" value="{{ old('lname') }}" placeholder="Enter Nom">
            </div>
            <div class="form-group">
              <label >Prénom</label>
              <input type="text" class="form-control @if($errors->get('fname'))is-invalid @endif" name="fname" value="{{ old('fname') }}" placeholder="Enter Prénom">
            </div>
            <div class="form-group">
              <label >Téléphone</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" >+212</span>
                </div>
                <input type="tel" class="form-control @if($errors->get('tel'))is-invalid @endif" name="tel" value="{{ old('tel') }}" placeholder="Enter Téléphone" >
              </div>
            </div>
            <div class="form-group">
              <label >Email address</label>
              <input type="email" class="form-control @if($errors->get('email'))is-invalid @endif" name="email" value="{{ old('email') }}"  placeholder="Enter email">
            </div>
            <div class="form-group">
              <label >Address</label>
              <input type="text" class="form-control @if($errors->get('address'))is-invalid @endif" name="address" value="{{ old('address') }}" placeholder="Enter Address">
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
          </form>
        </div>
    </div>
</div>
@endsection

