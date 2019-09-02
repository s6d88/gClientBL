@extends('layouts.app')

@section('title', "Detail Client" )

@section('content')


           


<div class="container-fluid">    
 <div class="row">

  @includeIf('layouts.sidebar')

    <div class="col-md-9 mx-auto ">

      <div class="card mt-5">
        <div class="card-body text-center">
          <h5 class="card-title"> <b> Nom et Prénom : </b> {{ $showedclient->nom}} {{ $showedclient->prenom}} </h5>
          <h6 class="card-subtitle mb-2 text-muted">Téléphone :{{ $showedclient->tel}}</h6>

          <h6 class="card-subtitle mb-2 text-muted">Email :{{ $showedclient->email}}</h6>

          <h6 class="card-subtitle mb-2 text-muted">Address :{{ $showedclient->address}}</h6>
          <strong>Date Création : </strong><h5> {{ $showedclient->created_at}}</h5>
          
          <a href="#!" class="card-link">Tous les Bon de Livraison</a>
          <a href="{{url('/clients')}}" class="card-link">Retour</a>
        </div>
      </div>

      </div>
    
    
    </div>  
</div>          



@endsection