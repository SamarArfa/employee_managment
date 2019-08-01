<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public  function info(){
        return $this->belongsTo('App\info');
    }
}
