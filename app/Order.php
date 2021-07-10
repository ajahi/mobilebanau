<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'name',
        'address',
        'contact_number',
        'price',
        'problem',
        'status'
    ];
    public function department(){
        if($this->status=='ordered'){
            return 'customer_service';
        }
        if($this->status=='picked'){
            return 'logistics';
        }
        if($this->status=='repairing'){
            return 'mechanic';
        }
        if($this->status=='completed'){
            return 'logistics';
        }
    }
}
