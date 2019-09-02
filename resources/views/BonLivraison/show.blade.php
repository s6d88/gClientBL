@extends('layouts.app')

@section('title', "Detail Bon de Livraison" )

@section('content')


<div class="container-fluid">    
 <div class="row">

  @includeIf('layouts.sidebar')

    <div class="col-md-6 mx-auto ">

      <div class="card mt-5">
        <div class="card-body text-center">
          <h5 class="card-title"> <b> Nom Complet : </b> {{ $showBLclient->nom}} {{ $showBLclient->prenom}}  </h5>
          <h6 class="card-subtitle mb-2 text-muted">date de Bon :{{ $showBLclient->datbl}}</h6>

          <h6 class="card-subtitle mb-2 text-muted">Référence  :{{ $showBLclient->refbl}}</h6>

          <h6 class="card-subtitle mb-2 text-muted">Total HT :{{ $showBLclient->total_ht}} DH</h6>

          <h6 class="card-subtitle mb-2 text-muted">Total TVA : {{ $showBLclient->total_tva}} DH</h6>

           <h6 class="card-subtitle mb-2 text-muted">Total TTC :{{ $showBLclient->total_ttc}} DH </h6>
          
       
      
          <a href="#!" class="card-link">Tous les Bon de Livraison</a>
          <a href="{{url('/bon_livraison')}}" class="card-link">Retour</a>
        </div>
      </div>

      </div>
    
    
    </div>  
</div>          



@endsection