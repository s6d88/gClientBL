@extends('layouts.app')

@section('title', "Edit Client" )

@section('content')
<div class="container-fluid">
              <div class="col-md-9">
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
    <div class="row">
      
        @includeIf('layouts.sidebar') 

            <!-- Editable table -->
            
              <div class="col-md-9 mt-5">
                <form action="{{ url('/bon_livraison/'.$editbon_livraisons->id)}} " method="post" id="myform">
                  {{ method_field('PUT')}}
                  {{ csrf_field()}}
                  <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="text" name="datebl" class="datepicker form-control" class="form-control" value="{{ $editbon_livraisons->datbl }} ">
                      </div>

                      <div class="col-md-4 mb-3">
                        <label >Réfernce Bon Livraison</label>
                        <input type="text" class="form-control " name="ref" value="{{ $editbon_livraisons->refbl }} " >   
                      </div>

                      <div class="col-md-4 mb-3">
                        <label >Client</label>
                        <div class="input-group">
                           <select class="browser-default custom-select" name="client" >
                            @foreach($clients as $client)
                               <option value="{{ $client->id }}" @if($client->id == $editbon_livraisons->id_client) selected='selected' @endif >{{ strtoupper($client->nom) }} {{ strtoupper($client->prenom) }} </option>
                            @endforeach
                              
                          </select> 
                        </div>
                      </div>
                  </div>
                  <div class="panel panel-footer" >
                      
                        <input type="button" class="btn btn-primary shadow-none  add-row" value="Add Row">
                        <input type="submit" value="Envoyer" class="btn btn-primary shadow-none ">
                        <button type="button" class="btn btn-danger shadow-none pull-right delete-row">Delete Row</button>
                          
                          <table class="table table-bordered table-striped table-hover">
                              <thead>
                                <tr>
                                  <th>Seletct</th>
                                  <th>Produit</th>
                                  <th>Quantité</th>
                                  <th>Prix</th>
                                  <th>Montant HT</th>
                                  <th>TVA %</th>
                                  <th>Montant TVA</th>
                                  <th>Montant TTC</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td></td>
                                      <td>
                                      
                                        <input type='text'class='form-control' name="product_name[]" required value="{{ $editbon_livraisons->product}}">

                                      </td>
                                      <td>
                                        <input type='text'class='form-control quantity' name="quantity[]" required value="{{ $editbon_livraisons->qte}} ">
                                      </td>
                                      <td>
                                        <input type='text'class='form-control budget' name="budget[]" required value="{{ $editbon_livraisons->prix }} ">
                                      </td>

                                      <td>
                                        <input type='text'class='form-control amountht' name="amountht[]" readonly required value="{{ $editbon_livraisons->montant_ht}} ">
                                      </td>
                                      <td>
                                        <input type='text'class='form-control tva' name="tva[]" required >
                                      </td>
                                      <td>
                                        <input type='text'class='form-control amountva' name="amountva[]" readonly required>
                                      </td>
                                      <td>
                                        <input type='text'class='form-control amounttc' name="amounttc[]" readonly required>
                                      </td>
                                  </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td style="border: none"></td>
                                  <td style="border: none"></td>
                                  <td style="border: none"></td>
                                  <td style="border: none"></td>
                                  <td>
                                    Total :<b class="amountotalht"></b>
                                  </td>
                                  <td style="border: none"></td>
                                  <td>
                                     Total :<b class="amountotaltva"></b></td>
                                  <td>
                                     Total :<b class="amountotal"></b>
                                  </td>
                                </tr>
                              </tfoot>
                          </table>
                  </div>
                </form>
              </div>
            <!-- Editable table -->
    </div>
</div>

@endsection

