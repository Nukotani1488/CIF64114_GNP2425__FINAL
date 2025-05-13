<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\User;

class UserData extends Model
{
    protected $table = 'userdata';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'sex',
        'full_name',
        'weight',
        'height',
        'birth_date'
    ];

    function credential() {
        return $this->hasOne(User::class, 'id', 'uid');
    }
}
