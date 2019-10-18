<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image','color', 'product_id'
    ];
    public function product(){
        return $this->belongsTo('App\Products');
    }
}
