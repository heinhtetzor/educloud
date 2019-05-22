<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WikiComments extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'comment',
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
