<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarCount extends Model
{
    //protected $table = 'car_counts'; 
    protected $fillable = ['car_type', 'kanton'];
}
