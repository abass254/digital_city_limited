<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function listUsers(){

        $users = User::all();

        return view('user.list_users', compact('users'));
    }



    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact' => 'required|string|max:255|unique:users',
            'nhif_no' => 'required|string|max:255',
            'nssf_no' => 'required|string|max:255',
            'id_number' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['contact']),
            'contact' => $data['contact'],
            'email' => $data['email'],
            'password' => Hash::make($request->contact),
            'nssf_no' => $data['nssf_no'],
            'id_number' => $data['id_number'],
            'nhif_no' => $data['nhif_no'],
            'role' => $data['role'],
            'store' => $data['store'],
            'date_assigned' => $data['date_assigned']
        ]);
    }

    public function editUser($id){


        $user = User::FindorFail($id);


        return view('user.edit', compact('user'));



      }


    public function updateUser(Request $request, $id)


      {
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->contact = $request->input('contact');
            $user->nhif_no = $request->input('nhif_no');
            $user->nssf_no = $request->input('nssf_no');
            $user->id_number = $request->input('id_number');
            $user->save();

            Alert::success('Success!!!', 'User Successfully Updated');
            return redirect()->route('list_users');

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
        return redirect()->route('list_users');

      }
}
