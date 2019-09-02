<?php

namespace App\Http\Controllers;

use App\Client;

use App\bon_livraison;

use App\detail_bon_livraison;

use DB;
use App\Http\Requests\BL_requests;
use Illuminate\Http\Request;

class Bon_LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('clients')
        ->join('bon_livraisons','bon_livraisons.id_client', '=', 'clients.id')
        ->select('clients.id','clients.nom', 'clients.prenom','bon_livraisons.id','bon_livraisons.datbl', 'bon_livraisons.refbl','bon_livraisons.total_ht', 'bon_livraisons.total_tva','bon_livraisons.total_ttc')     
        ->get();
        return view('BonLivraison/consulter', [ 'customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $clientID = null)
    {
         $clients=null;
         if( !$clientID){
            $clients=Client::all();
       } 
       return view('BonLivraison/create', ['clientID' => $clientID ,'clients' => $clients ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $bon_livraison = new bon_livraison; 
        $bon_livraison->datbl = $request->datebl ;
        $bon_livraison->refbl = $request->ref ;
        $bon_livraison->id_client = $request->client ;
        $bon_livraison->total_ht = array_sum($request->amountht);
        $bon_livraison->total_tva = array_sum($request->amountva);
        $bon_livraison->total_ttc = array_sum($request->amounttc);
        if($bon_livraison->save()){
            $id = $bon_livraison->id;
            foreach ($request->product_name as $key => $value) {
                $data = array(
                       'id_bl' => $id,
                       'product' => $request->product_name[$key],
                       'qte' => $request->quantity[$key],
                       'prix' => $request->budget[$key],
                       'montant_ht' => $request->amountht[$key],
                       'montant_tva' => $request->amountva[$key],
                       'montant_ttc' => $request->amounttc[$key],
                       'created_at' => now(),
                       'updated_at' => now()
  
                );
                detail_bon_livraison::insert($data);

            }
        }  
        
        return redirect('/bon_livraison')->with('status', 'Bon de Livraison a été ajouté avec succès!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $showBLclient = DB::table('clients')
            ->join('bon_livraisons', 'clients.id', '=', 'bon_livraisons.id_client')
            ->select('bon_livraisons.*', 'clients.nom', "clients.prenom")
            ->where('bon_livraisons.id' , $id)
            ->first();
        return view("BonLivraison.show" , compact('showBLclient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $clients = client::all();
        // $editbon_livraisons = bon_livraison::findOrFail($id);
        //  $dbl = DB::table('detail_bon_livraison')->where("id_bl", "=", $editbon_livraisons);
        // dd($editbon_livraisons,$clients, $dbl);

        $editbon_livraisons = DB::table('clients')
            ->join('bon_livraisons', 'clients.id', '=', 'bon_livraisons.id_client')
            ->join('detail_bon_livraisons', 'bon_livraisons.id', '=', 'detail_bon_livraisons.id_bl')
            ->select('clients.*','bon_livraisons.*','detail_bon_livraisons.*')
            ->where('bon_livraisons.id', $id)
            ->first();
            
      return view('BonLivraison/edit', compact('editbon_livraisons','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
       //return $request->all();

        $bon_livraison = bon_livraison::findOrFail($id); 
        $bon_livraison->datbl = $request->datebl ;
        $bon_livraison->refbl = $request->ref ;
        $bon_livraison->id_client = $request->client ;
        $bon_livraison->total_ht = array_sum($request->amountht);
        $bon_livraison->total_tva = array_sum($request->amountva);
        $bon_livraison->total_ttc = array_sum($request->amounttc);
        if($bon_livraison->save()){
            $id = $bon_livraison->id;
            foreach ($request->product_name as $key => $value) {
                $data = array(
                       'id_bl' => $id,
                       'product' => $request->product_name[$key],
                       'qte' => $request->quantity[$key],
                       'prix' => $request->budget[$key],
                       'montant_ht' => $request->amountht[$key],
                       'montant_tva' => $request->amountva[$key],
                       'montant_ttc' => $request->amounttc[$key],
                       //'updated_at' => now()
  
                );
               DB::table('detail_bon_livraisons')->update($data);

            }
        }  
        
        return redirect('/bon_livraison')->with('status', 'Bon de Livraison a été ajouté avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('bon_livraisons')
            ->join('detail_bon_livraisons', 'bon_livraisons.id', '=', 'detail_bon_livraisons.id_bl')
            ->where('detail_bon_livraisons.id_bl', $id)
             ->delete();
        
        return redirect("/bon_livraison")->with('deleted' , 'bon de livraison a bien été supprimé');
        
    }
}
