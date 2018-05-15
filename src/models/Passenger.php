<?php

use Illuminate\Database\Eloquent\Model as Model;

class Passenger extends Model
{
    protected $primaryKey = "id";
    protected $table = "passengers";
    protected $fillable = [
        'user_id'
    ];
}