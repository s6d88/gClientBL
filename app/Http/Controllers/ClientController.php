<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\client_requests;
use App\Client;


class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listclients = Client::all();
        return view('clients/consulter',['listclients' => $listclients ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(client_requests $request)
    {
         $client =new Client();
         $client->nom = $request->input('lname');
         $client->prenom = $request->input('fname');
         $client->tel = $request->input('tel');
         $client->email = $request->input('email');
         $client->address = $request->input('address'); 
         $client->save();
         return redirect('/clients')->with('status', 'Client a été ajouté avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showedclient = Client::findOrFail($id);
        return view("clients.show" , compact('showedclient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editclients = Client::findOrFail($id);
        return view('clients/edit', ['editclients' => $editclients ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(client_requests $request, $id)
    {
        $updatedclient      = Client::findOrFail($id);
        $updatedclient->nom = $request->input('lname'); 
        $updatedclient->prenom = $request->input('fname'); 
        $updatedclient->tel = $request->input('tel'); 
        $updatedclient->email = $request->input('email'); 
        $updatedclient->address = $request->input('address'); 
        //$updatedclient->updated_at = $request->input('updated_date'); 
        $updatedclient->save();

        return redirect('/clients');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted_client = Client::findOrFail($id);
        $deleted_client->delete();
        return redirect("clients");

    }
}
