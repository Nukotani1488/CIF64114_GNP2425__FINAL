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

    public $age {
        get {
            return date_diff(date_create($this->birth_date), date_create('now'))->y;
        }
    }

    public $maxConsumption {
        get {
            $bmr = 0;
            if ($this->sex) {
                $bmr = 655.1 + (9.563 * $this->weight) + (1.850 * $this->height) - (4.676 * $this->age);
            } else {
                $bmr = 66.47 + (13.75 * $this->weight) + (5.003 * $this->height) - (6.755 * $this->age);
            }

            $amr = $bmr * 1.2;

            return (0.1 * $amr) / 4;
        }
    }
}
