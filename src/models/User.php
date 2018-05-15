<?php

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    protected $primaryKey = "id";
    protected $table = "users";
    protected $fillable = [
        'name',
        'birthday',
        'cpf',
        'gender'
    ];

    public function getFk()
    {
        return $this->getForeignKey();
    }
}