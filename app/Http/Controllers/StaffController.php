<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



        $users = User::all();

        return view('user.list_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('user.create');
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
              'name' => 'required|string|max:255',
              'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              'contact' => 'required|string|max:255|unique:users',
              'nhif_no' => 'required|string|max:255',
              'nssf_no' => 'required|string|max:255',
              'id_number' => 'required|string|max:255|unique:users',
              'email' => 'required|string|email|max:255|unique:users',
          ]);



          User::create([
              'name' => $request->name,
              'contact' => $request->contact,
              'email' => $request->email,
              'password' => Hash::make($request->contact),
              'nssf_no' => $request->nssf_no,
              'id_number' => $request->id_number,
              'nhif_no' => $request->nhif_no,
              'role' => $request->role,
              'store' => $request->store,
              'date_assigned' => $request->date_assigned,
              

          ]);


          Alert::success('success', 'Successfully added');

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

        $user = User::FindorFail($id);


        return view('user.edit', compact('user'));
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
        $user = User::findOrFail($id);
        
  $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->nhif_no = $request->input('nhif_no');
        $user->nssf_no = $request->input('nssf_no');
        $user->id_number = $request->input('id_number');
        $user->save();

        Alert::success('Success!!!', 'User Successfully Updated');
        return redirect()->route('staff.index');
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

    public function assignDuty($id){

        $user = User::findOrFail($id);


        return view('user.assign_duty', compact('user'));


    }


     public function updateDuty(Request $request, $id){

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->branch = $request->input('branch');
        $user->status = "1";
        $user->date_assigned = Carbon::parse($request->input('date_assigned'))->format('d/m/y');
        $user->save();

        Alert::success('Success!!!', 'Duty Successfully Assigned');
        return redirect()->route('staff.index');

      }

        // public function searchCode(Request $req){



        //     $search = $request->input('search');
        //     $search_code = $search['value'];

        //     $users = User::where('contact', 'like', '%'. $search_code . '$')->get();

        //     return view('user.list_users', compact('users');
        // }
}
