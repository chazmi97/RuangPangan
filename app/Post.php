<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['content'];

    public function user(){
      return $this->belongsTo('App\User');
    }
    
    public function comment(){
      return $this->hasMany('App\comment');
    }

    public function like(){
      return $this->hasMany('App\Like');
    }

}
