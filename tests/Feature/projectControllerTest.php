<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\MessageBag;
use Tests\TestSetup;
Use App;


class projectControllerTest extends TestCase
{ 
  
   
    public function setUp(){
        parent::setUp();
        
        $this->configEnv = new TestSetup;

        $this->configEnv->setUpDB();
        $this->user = $this->configEnv->getUser();

    }
    
    public function tearDown(){
        $this->configEnv->dropDB();
    }

    public function test_project_page_display(){
        $industry = factory(App\Industry::class)->create();
        $product=factory(App\Product::class)->create();
        $company=factory(App\Company::class)->create(['industry_id'=>$industry->id]);
        $project = factory(App\Project::class)->create(['company_id'=>$company->id,'product'=>$product->id]);
       
        $response = $this->actingAs($this->user)->withSession(['token'=>'testing12345'])->get('api/project');
        $response->assertSee("company_id");
        $response->assertSee('project_category');
    
    }

    public function test_load_variables_for_project_creation(){
        $company= factory(App\Company::class,4)->create();
        $response = $this->actingAs($this->user)->get('api/project/create');
        $this->assertContains('company',$response->getContent());
        $this->assertContains('industry',$response->getContent());
        $this->assertContains('product',$response->getContent());
    
    }


    public function test_if_project_is_stored_with_new_company_entry(){
       
        //seed the data to be stored
        $project= factory(App\Project::class)->make();   
        $company= factory(App\Company::class)->make();
        $industry= factory(App\Industry::class)->make();
        $contact = factory(App\Contact::class)->make();
        $sales =factory(App\SalesPerson::class)->create(['salesperson_id'=>'1234567']);
        $product= factory(App\Product::class)->create(['product_name'=>'VPS']); 

        $data= ['company_name'=>$company->company_name,
                'website'=>$company->website,
                'office_number'=>$company->office_num,
                'industry'=>$industry->industry,
                'contact_name'=>$contact->contact_name,
                'contact_number'=>$contact->contact_number,
                'contact_email'=>$contact->email,
                'contact_designation'=>$contact->designation,
                'salesperson_id'=>$sales->salesperson_id,
                'project_category'=>$project->project_category,
                'product'=>$product->id,
                'value'=>$project->value,
                'project_type'=>$project->project_type,
                'sales_stage'=>$project->sales_stage,
                'status'=>$project->status,
                'tender'=>$project->tender,
                'remark'=>$project->remarks,
                'close_at'=>date('3/5/3078'),
                'start_date'=>date('3/5/2017')
        ]; 
          $response = $this->actingAs($this->user)->post('api/project',$data);
            var_dump($response->getContent());
        $this->assertDatabaseHas('projects',['id'=>'1'],'mysql2');
        $this->assertDatabaseHas('companies',['id'=>'1'],'mysql2');
        $this->assertEquals('success',$response->getContent(),'Expected to return success');
      

    }

    public function test_if_project_is_stored_with_existing_company(){
    
        $project= factory(App\Project::class)->make();   
        $company= factory(App\Company::class)->create();
        $sales =factory(App\SalesPerson::class)->create(['salesperson_id'=>'1234567']);
        $product= factory(App\Product::class)->create(['product_name'=>'VPS']); 

        $data= [
        'company_name'=>$company->company_name,
        'salesperson_id'=>$sales->salesperson_id,
        'project_category'=>$project->project_category,
        'product'=>$product->id,
        'value'=>$project->value,
        'project_type'=>$project->project_type,
        'sales_stage'=>$project->sales_stage,
        'status'=>$project->status,
        'tender'=>'Dis is a new tender',
        'remark'=>$project->remarks,
        'close_at'=>date('d-m-Y'),
        'start_date'=>date('d-m-Y')
        
        ];  
        $response = $this->actingAs($this->user)->post('api/project',$data);
     var_dump($response->getContent());
      $this->assertDatabaseHas('projects',['tender'=>'Dis is a new tender'],'mysql2');
      $this->assertDatabaseHas('projects',['company_id'=>$company->id],'mysql2');
      //$this->assertEquals('success',$response->getContent(),'Expected to return success');
    }

    public function test_if_project_is_created_as_deal(){
        $deal = factory(App\Deal::class)->make();
        $project= factory(App\Project::class)->make();   
        $company= factory(App\Company::class)->make();
        $industry= factory(App\Industry::class)->make();
        $contact = factory(App\Contact::class)->make();
        $sales = factory(App\SalesPerson::class)->create(['salesperson_id'=>'1234567']);
        $sproduct= factory(App\Product::class)->create(['product_name'=>'VPS']); 

        $data= ['company_name'=>$company->company_name,
                'company_name'=>$company->company_name,
                'website'=>$company->website,
                'office_number'=>$company->office_num,
                'industry'=>$industry->industry,
                'contact_name'=>$contact->contact_name,
                'contact_number'=>$contact->contact_number,
                'contact_email'=>$contact->email,
                'contact_designation'=>$contact->designation,
                'salesperson_id'=>$sales->salesperson_id,
                'project_category'=>$project->project_category,
                'product'=>'VPS',
                'value'=>$project->value,
                'project_type'=>$project->project_type,
                'sales_stage'=>$project->sales_stage,
                'status'=>$project->status,
                'tender'=>$project->tender,
                'remark'=>$project->remarks,
                'close_at'=>date('d-m-Y'),
                'po_number'=>$deal->po_num,
                'po_date'=> $deal->po_date,
                'start_date'=>date('d/m/Y')
        ]; 
          $response = $this->actingAs($this->user)->post('api/project',$data);
      
        $this->assertDatabaseHas('deals',['project_id'=>'1'],'mysql2');
        $this->assertDatabaseHas('deals',['po_num'=>$deal->po_num],'mysql2');
        $this->assertEquals('success',$response->getContent(),'Expected to return success');

    }

    public function test_if_edit_returns_record(){
        $project= factory(App\Project::class)->create();   

        $response = $this->actingAs($this->user)->get(route('project.edit',['id'=>$project->id]));
        $response->assertStatus(200);
        $this->assertContains('project',$response->getContent());

    }

    public function test_if_edited_project_is_updated(){
        $sales= factory(App\SalesPerson::class)->create();
        $project= factory(App\Project::class)->create();
        $deal = factory(App\Deal::class)->make();  
        
        $data = [
            'salesperson_id'=>$sales->salesperson_id,
            'project_category'=>$project->project_category,
            'product'=>'VPS',
            'value'=>$project->value,
            'project_type'=>$project->project_type,
            'sales_stage'=>'70',
            'status'=>'pending',
            'tender'=>$project->tender,
            'remark'=>'This is an update to the exixting project',
            'close_at'=>date('d-m-Y'),
            'po_number'=>$deal->po_num,
            'po_date'=>date('d-m-Y'),
            'start_date'=>date('d/m/Y')
        ];

        $response = $this->actingAs($this->user)->put("api/project/{$project->id}",$data);
        
        $this->assertDatabaseHas('projects',['sales_stage'=>'70'],'mysql2');
        $this->assertDatabaseHas('projects',['status'=>'pending'],'mysql2');
        $this->assertDatabaseHas('projects',['remarks'=>'This is an update to the exixting project'],'mysql2');
        $this->assertDatabaseHas('deals',['po_num'=>$deal->po_num],'mysql2');
    }

    public function test_delete_project(){
        $project = factory(App\Project::class)->create();
        $deal = factory(App\Deal::class)->create(['project_id'=>$project->id]);

        $response = $this->actingAs($this->user)->delete("api/project/{$project->id}");
        $this->assertDatabaseMissing('projects',['id'=>$project->id],'mysql2');
        $this->assertDatabaseMissing('deals',['project_id'=>$project->id],'mysql2');
        $response->assertEquals('success',$response->getContent());
    }
    
}
