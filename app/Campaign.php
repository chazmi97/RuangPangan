<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable=['title','content','target','deadline'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
