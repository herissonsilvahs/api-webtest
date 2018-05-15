<?php

use Illuminate\Database\Eloquent\Model as Model;

class Motorist extends Model
{
    protected $primaryKey = "id";
    protected $table = "motorists";
    protected $fillable = [
        'car_model',
        'status',
        'user_id'
    ];

}