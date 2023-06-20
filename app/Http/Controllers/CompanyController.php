<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companylist = Tenant::all();
        return view('company.list',compact(['companylist']));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $mainDomain = config('app.main_domain');
        /*
        >>> $tenant1 = App\Models\Tenant::create(['id' => 'foo']);
        >>> $tenant1->domains()->create(['domain' => 'foo.localhost']);
        */
        $rules = [
            'domain'  => 'required|string',
            'name'  => 'required|string',
            'email' => 'required|email|unique:users',
            'password'   => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ( $validator->fails() ) {
            //$response['message'] = $validator->errors()->first();
            //return redirect()->back()->with("failed", $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
            //return redirect('employee.create')->withErrors($validator)->withInput();
        } else {
            $domain = $request->domain;
            $name = $request->name;
            $email = $request->email;
            $password = Hash::make($request->password);
            $companyDomain = $domain.'.'.$mainDomain;

            //dd(['id'=>"$domain", 'name' => "$name", 'email' => "$email", 'password' => "$password"]);
            $user = User::create(['name' => "$name", 'email' => "$email", 'password' => "$password",'status'=>1,'tennant_id'=>"$domain"]);
            $makeCompany = Tenant::create(['id'=>"$domain"]);
            $makeCompany->domains()->create(['domain' => "$companyDomain"]);
            $makeCompany->users()->attach($user->id);

            //dd($makeCompany);
            $msg = 'Your account has been created!';
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
