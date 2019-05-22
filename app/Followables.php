<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followables extends Model
{
    protected $fillable = [
        'user_id', 'followable_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
