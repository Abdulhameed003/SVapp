<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends ConfigureDB
{
    public $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['project_category','company_id','salesperson_id',
                        'product','value','project_type','sales_stage','status','tender','remarks','close_at','start_date'];
    protected $connection = 'mysql2';
   
    const CREATED_AT = null;

    //relationships

    public function company(){
        return $this->belongsTo('App\Company','company_id','id');
    }

    public function deal(){
        return $this->hasOne('App\Deal');
    }

    public function salesperson(){
        return $this->belongsTo('App\Salesperson','salesperson_id','salesperson_id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product','id');
    }

    //Static Method calls

    public static function loadProjects(){
        return static::with('company.industry','company.contacts','product','salesperson','deal')->orderBy('id','Desc')->get();
    }

    public static function getRecentlyAdded($id){
        return static::with('company.industry','company.contacts','product','salesperson','deal')->where('id',$id)->get();
    }

}
