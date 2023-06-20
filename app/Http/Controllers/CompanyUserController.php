<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class CompanyUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $companyid;
    public $companydb;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companyid = Auth::user()->tennant_id;
        $tenant = Tenant::find($companyid);
        $userslist = $tenant->run(function () {
            return $user = User::all();
        });
        return view('companyusers.list',compact(['userslist']));
    }

    public function create()
    {
        return view('companyusers.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'  => 'required|string',
            'email' => 'required|email',
            'password'   => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ( $validator->fails() ) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $companyid = Auth::user()->tennant_id;
            $tenant = Tenant::find($companyid);
            $tenant->run(function () use($request) {
                $name = $request->name;
                $email = $request->email;
                $password = Hash::make($request->password);
                $user = User::create(['name' => "$name", 'email' => "$email", 'password' => "$password"]);
            });
            $msg = 'User has been created successfully!';
            return redirect()->back()->with("success", $msg);
        }
        
        //return response()->json($response, 200);
    }


    public function edit($id)
    {
        return view('company.edit');
    }

    public function update($id,Request $request)
    {
        return view('company.edit');
    }
}
