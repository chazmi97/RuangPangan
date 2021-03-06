<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friendships extends Model
{
    protected $fillable = ['requester','user_requested','status'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
