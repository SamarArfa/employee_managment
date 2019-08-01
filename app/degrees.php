<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class degrees extends Model
{
    public  function info(){
        return $this->belongsTo('App\info');
    }
}
