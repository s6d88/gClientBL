@extends('layouts.app')

@section('title', "Create Bon Livraison" )

@section('content')


      

<div class="container-fluid">
    <div class="row">
      <div class="col-md-9 offset-md-2">
        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul >
                  @foreach ($errors->all() as $error)
                      <li class="nav-item">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
      </div>
    </div>
     
    <div class="row">

      @includeIf('layouts.sidebar')

      <div class="col-md-9 my-5">
      <!-- Editable table -->
        <form action="{{ url('/bon_livraison/')}} " method="post" id="myform">
          {{ csrf_field()}}
          <div class="form-row">
              <div class="col-md-4 mb-3">
                <label  >Date Bon Livration</label>
                <input type="text" name="datebl" class="datepicker form-control" class="form-control" value="{{ old('datebl') }}">
              </div>

              <div class="col-md-4 mb-3">
                <label >Réfernce Bon Livraison</label>
                <input type="text" class="form-control " name="ref"  placeholder="Enter Réfernce" value="{{ old('ref') }}">
              </div>
              @if($clients != null)
              <div class="col-md-4 mb-3">
                <label >Client</label>
                <div class="input-group">
                  <select class="browser-default custom-select" name="client" >
                      <option selected disabled>Open this select menu</option>
                    @foreach($clients as $client)
                      <option value="{{ $client->id }} {{ old('client') }}" > {{ $client->nom }} {{ $client->prenom }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              @endif
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
                              <td> </td>
                              <td>
                                <input type='text'class='form-control' name="product_name[]" required {{ old('product_name[]') }}>
                              </td>
                              <td>
                                <input type='text'class='form-control quantity' name="quantity[]" required {{ old('quantity[]') }}>
                              </td>
                              <td>
                                <input type='text'class='form-control budget' name="budget[]" required {{ old('budget[]') }}>
                              </td>
                              <td>
                                <input type='text'class='form-control amountht' name="amountht[]" readonly >
                              </td>
                              <td>
                                <input type='text'class='form-control tva' name="tva[]"  {{ old('tva[]') }}>
                              </td>
                              <td>
                                <input type='text'class='form-control amountva' name="amountva[]" readonly  >
                              </td>
                              <td>
                                <input type='text'class='form-control amounttc' name="amounttc[]" readonly  >
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
      <!-- Editable table -->
      </div>
    </div>
</div>
@endsection

