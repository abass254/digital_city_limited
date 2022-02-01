<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $clients = Client::all();

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        
        $request->validate([
            'client_name' => 'required',
            'email' => 'required|email',
            'work_permit' => 'required|mimes:pdf|max:2048', 
            'location' => 'required',
            'contact' => 'required',
        ]);

        $client = new Client();
        $client->client_name = $request->client_name;
        $client->email = $request->email;
        $client->contact = $request->contact;
        $client->location = $request->location;
        $client->status = "1";


        $file = $request->file('work_permit');
        $ext = $file->guessExtension();
        $file_name = $request->client_name . '.' . $ext;
        $file->move('uploads/', $file_name);


        $client->work_permit = $file_name;

        // $name = $request->file('work_input')->getClientOriginalName();
 
        // $path = $request->file('work_input')->store('public/uploads');

        // $client->work_input = $name;

        $client->save();

        alert()->success('Done','Client Successfully Added');

       // Toastr::success('Product Successfully Created', 'Success!!!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $cli = Client::find($id);

        return view('client.show', compact('cli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function downloadWorkPermit(Request $req, $id){

        $client = Client::findOrFail($id);

        return response()->download('uploads/'. $client->work_permit);
    }
}
