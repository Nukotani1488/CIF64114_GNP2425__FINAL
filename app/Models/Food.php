<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'id';
    public $incrementing = true;
}
