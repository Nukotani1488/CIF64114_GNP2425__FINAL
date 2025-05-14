<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'uid',
        'gid',
        'emotion_before',
        'emotion_after'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uid', 'id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'gid', 'id');
    }

    function getSugarContent() {
        return $this->food->sugar_content;
    }
}
