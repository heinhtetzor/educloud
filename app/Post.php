<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Followables;

class Post extends Model
{   
   

    protected $fillable = [
         'title', 'body', 'user_id', 'tags', 'created_at', 'updated_at',
    ];

    public function user()
    {   
        return $this->belongsTo('App\User');

    }
    

}
