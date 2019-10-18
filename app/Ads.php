<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image','name', 'start_date', 'end_date','status'
    ];
    public $timestamps = true;
}
