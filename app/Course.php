<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'tags', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function article() 
    {
        return $this->belongsTo('App\Sub_Course');
    }
}
