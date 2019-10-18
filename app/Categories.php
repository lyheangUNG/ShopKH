<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_name','parent_id','status'
    ];
    public $timestamps = true;
    public function products(){
        return $this->hasMany('App\Products');
    }
}
