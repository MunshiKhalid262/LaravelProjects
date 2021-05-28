<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{

    protected $table = 'employee_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id','email','name','age','earning_2016','earning_2017','earning_2018','created_at','updated_at'
    ];
   
}
