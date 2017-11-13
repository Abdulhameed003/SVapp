<?php
namespace Tests\Feature;



use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisterController;



class RegisterUserTest extends TestCase
{
   //use  WithoutMiddleware;

    private $registration;
    private $user;
    private $company;
   
    public function setUp(){
        parent::setUp();
        
    }
 
   
    public function test_registration_display(){
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    /**@test */
    public function test_Register_With_Valid_Credentials(){
        $this->user = factory(\App\User::class)->make();
        $this->company =factory(\App\Tenant::class)->make();
        $data =['first_name' =>'abduldhd',
                    'last_name' =>'dxdsdssd',
                    'email' => $this->user->email,
                    'password' => 'qwerty',
                    'password_confirmation' => 'qwerty',
                    'company_id' => $this->company->company_id,
                    'company_name' => 'qwderf',
                    'company_phone' => '323223',
                    'user_role' => 'admin',
                ];  
        
        $response = $this->call('POST','/register',$data);
        
        $this->assertDatabaseHas('tenants',['company_id'=>$this->company->company_id],'mysql');
        $this->assertDatabaseHas('users',['email'=>$this->user->email],'mysql');
    }

    public function tearDown(){
        parent::tearDown();
        //DB::statement('drop database db_'.$this->company->company_id);
    }

}