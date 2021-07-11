<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    protected $fillable=['name','experties','dob','citizenship_num','verified'];
    
}
