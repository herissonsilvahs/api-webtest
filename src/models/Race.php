<?php

use Illuminate\Database\Eloquent\Model as Model;

class Race extends Model
{
    protected $primaryKey = "id";
    protected $table = "races";
    protected $fillable = [
        'price',
        'passenger_id',
        'motorist_id'
    ];
}