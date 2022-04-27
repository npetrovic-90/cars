<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['name','founded','description','image_path','user_id'];

    protected $hidden=[];

    protected $visible=['name','founded','description'];

    //one to many
    public function carModels(){
        return $this->hasMany(CarModel::class);
    }

    //define has many through relationship
    public function engines(){

        return  $this->hasManyThrough( Engine::class,CarModel::class,
            'car_id',//Foreign key on CarModel table
            'model_id',//Foreign key on Engine table
        );
    }
    //Define has one through relationship
    public function productionDate(){
        return  $this->hasOneThrough( CarProductionDate::class,CarModel::class,
        'car_id',//Foreign key on CarModel table
        'model_id',//Foreign key on CardProductionDate table
    );
    }

    //many to many relationship

    public function products(){

        return $this->belongsToMany(Product::class);
    }


}
