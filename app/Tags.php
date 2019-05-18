<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = [
        'name', 'user_id', 'created_at', 'updated_at',
   ];

   public function user()
   {
       return $this->belongsTo('App\User');
   }

}
