@extends('layouts.app')

@section('title', "List Clients" )

@section('content')

<div class="container-fluid">
    <div class="row">
      {{-- sidebar --}}

       @includeIf('layouts.sidebar') 

        <div class="col-md-9">
           
            <div class="display-4 my-4 font-weight-light">Liste des clients</div>
            {{-- if any error exists --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>                
            @endif

            <div class="pull-right">
                <a href="{{ url('/clients/create')}} " class="btn btn-success waves-effect">Ajouter</a>
            </div>
            <table id="dt-basic-checkbox" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th class="th-sm">Nom</th>
                      <th class="th-sm">Prénom</th>
                      <th class="th-sm">Téléphone</th>
                      <th class="th-sm">Email</th>
                      <th class="th-sm">Adresse</th>
                      <th class="th-sm">date Création</th>
                      <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
              
                @foreach($listclients as $listclient)
                    <tr>
                        <td> {{ $listclient->nom }} </td>
                        <td> {{ $listclient->prenom }} </td>
                        <td> {{ $listclient->tel }} </td>
                        <td> {{ $listclient->email }} </td>
                        <td> {{ $listclient->address }} </td>
                        <td> {{ date("m/d/Y", strtotime($listclient->created_at)) }} </td>
                        <td class="text-center">
                            <a href="{{'/clients/'.$listclient->id }}" class="btn btn-default waves-effect mybtn"  >Details</a>

                            <a href="{{ url('/clients/'.$listclient->id.'/edit')}}" class="btn btn-primary waves-effect mybtn">Modifer</a>

                            <form method="post" action="{{ url('/clients/'.$listclient->id)}} " class="d-inline"> 
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
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Téléphone</th>
                      <th>Email</th>
                      <th>Adresse</th>
                      <th>Date Création</th>
                      <th>Action</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>

</div>

@endsection
