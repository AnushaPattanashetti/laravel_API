<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $table = "signups";
    
    protected $timestamp = false; 

    protected $fillable = ['username','password'];
}
