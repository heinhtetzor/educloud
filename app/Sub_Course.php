<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Course extends Model
{
    
    protected $table = 'sub_courses';
    
    protected $fillable = [
        'title', 'body', 'course_id',
    ];

    public function courses() 
    {
        return $this->hasMany('App\Course');
    }
}
