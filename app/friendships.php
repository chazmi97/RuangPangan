<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friendships extends Model
{
    protected $fillable =['request','user_request','status'];
}
