<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{ public  function Course(){
    return $this->hasMany('App/Course');
}
    public  function degree(){
        return $this->hasMany('App/degree');
    }
    public  function experiences(){
        return $this->hasMany('App/experiences');
    }
    public  function Kinship(){
        return $this->hasMany('App/Kinship');
    }
}
