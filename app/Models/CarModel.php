<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $table = 'car_models';

    protected $primaryKey = 'id';
    //one to many

    public function car(){

        return $this->belongsTo(Car::class);
    }
}
