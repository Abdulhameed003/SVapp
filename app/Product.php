<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use collection;
class Product extends ConfigureDB
{

    public $table = 'products';
    protected $connection = 'mysql2';
    public $timestamps = false;

    public function projects(){
        return $this->hasMany('App\Project','id','product');
    }
}
