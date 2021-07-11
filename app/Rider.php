<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $fillable=['name','license_registration_number','verified','citizzenship_no'];
}
