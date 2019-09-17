<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_users extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
