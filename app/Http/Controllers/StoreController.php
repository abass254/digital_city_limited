<?php

namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //

    public function index(){

        $cons_stores = Store::where('status', '2')->get();
        $main_stores = Store::where('status', '1')->get();

        $date = Carbon::parse($main_stores->first()->created_at)->format('Y-m-d');

        //return $cons_stores;

        //return $main_stores;

        //return $date;

        return view('store.index', compact('cons_stores', 'main_stores'));
    }

    public function edit($id){

        $stores = Store::findOrFail($id);
        $users = User::where('role', '1')->get();
     //   return $users;
        return view('store.edit', compact('stores', 'users'));


    }

    public function update(Request $req, $id){

        $store = Store::findOrFail($id);

        $store->store_name = $req->store_name;
        $store->manager = $req->manager;
        $store->status = $req->status;
        $store->save();

        alert()->success('Done','Store Successfully Updated');

        return redirect()->route('stores');


    }

}
