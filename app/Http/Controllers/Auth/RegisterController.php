<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Tenant;
use App\ConfigureDB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;



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
    protected function redirectTo(){
        
        return '/login';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
    protected function validator($request)
    {
        return Validator::make($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'company_id' => 'required|string|unique:tenants|max:50',
            'company_name' => 'required|string|max:255',
            'company_phone' => 'required|digit:11',
            'user_role' => 'required|string|max:50',

        ]);
    }

    public function register(request $request){
        $this->validator($request->all())->validate();
        
        if ($this->CreateCompany($request) == true ){
            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'company_id' => $request->company_id,
                'user_role' => $request->user_role
            ]);
            return redirect('/login');
        }else {
            return redirect()->back()->withInput($request->except('password','company_id'));
        }
    }
    
  
    private function CreateCompany(request $request){
        $dbaseName="";

        if(Tenant::where('company_id',$request->company_id)->count() > 0) {
            return false;
        }else{
            $dbaseName = 'DB_'.$request->company_id;
            Tenant::create([
                'company_name' => $request->company_name,
                'company_id'=> $request->company_id,
                'company_phone'=> $request->company_phone
            ]);
            
          
            ConfigureDB::CreateSchema($dbaseName);
            ConfigureDB::ConfigureDBConnection($dbaseName);
            Artisan::call('migrate', ['--database' => $dbaseName, '--path' => 'database/migrations', '--force' => true]);
            return true;
        }
    }    


}
