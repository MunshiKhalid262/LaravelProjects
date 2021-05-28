<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerDetails extends Model
{

    protected $table = 'careers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','name','contact','exp','skill','company','remarks'
    ];
   
}
