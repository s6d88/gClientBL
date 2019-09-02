@extends('layouts.app')

@section('title', "List Bon livraisons" )

@section('content')
      
        
<div class="container-fluid">

    <div class="row">
      <div class="col-md-9 offset-md-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @elseif(session('deleted'))
                <div class="alert alert-success">
                    {{ session('deleted') }}
                </div>                
            @endif
      </div>
      
    </div>
    <div class="row">

      @includeIf('layouts.sidebar') 

        <div class="col-md-9 ">
           
            <div class="display-4 my-4 font-weight-light">Liste des bons de livraisons </div>
            <div class="pull-right">
                <a href="{{ url('/bon_livraison/create')}} " class="btn btn-success waves-effect">Ajouter</a>
            </div>
            <table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th class="th-sm">Date Bon Livration </th>
                      <th class="th-sm">Réf Bon Livration</th>
                      <th class="th-sm">Client</th>
                      <th class="th-sm">Total HT</th>
                      <th class="th-sm">Total TVA</th>
                      <th class="th-sm">Total TTC</th>
                      <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($customers as $customer )
                    <tr>
                        <td> {{ $customer->datbl }} </td>       
                        <td> {{ $customer->refbl }} </td>
                        <td> {{ $customer->nom }} {{ $customer->prenom }} </td>
                        <td> {{ $customer->total_ht }} DH</td>
                        <td> {{ $customer->total_tva }} DH</td>
                        <td> {{ $customer->total_ttc }} DH</td>
                        <td class="text-center">
                            <a href='{{ url('/bon_livraison/'.$customer->id)}}' class="btn btn-default waves-effect mybtn" >Details</a>

                            <a href='{{ url('/bon_livraison/'.$customer->id.'/edit')}}' class="btn btn-primary waves-effect mybtn">Modifer</a>

                            <form method="post" action="{{ url('/bon_livraison/'.$customer->id) }}" class="d-inline"> 
                                {{ method_field('DELETE')}}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger waves-effect mybtn">Supprimer</a>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                      <th>Date Bon Livration</th>
                      <th>Réf Bon Livration</th>
                      <th>Client</th>
                      <th>Total HT</th>
                      <th>Total TVA</th>
                      <th>Total TTC</th>
                      <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


@endsection
