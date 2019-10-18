<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';
    protected $primaryKey = 'id';
    protected $fillable = [
        'size', 'product_id'
    ];
    public function product(){
        return $this->belongsTo('App\Products');
    }
}
