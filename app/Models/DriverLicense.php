<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverLicense extends Model
{
    /**
     * Table SQL
     * 
     * @var string
     */
    protected $table = 'driver_licenses';
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['description'];
    
}
