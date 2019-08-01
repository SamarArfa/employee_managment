<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinship extends Model
{
protected $table='kinships';
    public  function info(){
        return $this->belongsTo('App\info');
    }
}
