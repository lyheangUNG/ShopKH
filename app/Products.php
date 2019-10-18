<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image','code', 'name', 'price', 'size_id','brand','color_id','status'
    ];
    public $timestamps = true;
    public function categories(){
        return $this->hasOne('App\Categories');
    }
    public function colors(){
        return $this->hasMany('App\Color');
    }
    public function sizes(){
        return $this->hasMany('App\Size');
    }
}
