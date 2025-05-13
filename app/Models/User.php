<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Date;

use App\Models\UserData;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function userData()
    {
        return $this->hasOne(UserData::class, 'uid', 'id');
    }

    function getRecords(DateTime $start = null, DateTime $end = null)
    {
        if ($start == null) {
            if ($end == null) {
                return $this->hasMany(Record::class, 'uid', 'id')->get();
            } else {
                return $this->hasMany(Record::class, 'uid', 'id')->where('created_at', '<=', $end)->get();
            }
        }else {
            if ($end == null) {
                return $this->hasMany(Record::class, 'uid', 'id')->where('created_at', '>=', $start)->get();
            } else {
                return $this->hasMany(Record::class, 'uid', 'id')->where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
            }
        }
    }

    function getSugarConsumption(DateTime $start = null, DateTime $end = null)
    {
        $records = $this->getRecords($start, $end);
        $sugar = 0;
        foreach ($records as $record) {
            $sugar += $record->food->sugar;
        }
        return $sugar;
    }

    function getSugarConsumptionToday() {
        $today = Date::now();
        $start = Date::createFromFormat('Y-m-d H:i:s', $today->format('Y-m-d') . ' 00:00:00');
        $end = Date::createFromFormat('Y-m-d H:i:s', $today->format('Y-m-d') . ' 23:59:59');

        return $this->getSugarConsumption($start, $end);
    }
}
