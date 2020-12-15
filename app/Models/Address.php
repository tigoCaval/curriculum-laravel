<?php

namespace App\Models;

use App\Domain\Traits\AddressTrait;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     use AddressTrait;

     //protected $table = "addresses";
     
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['country', 'city', 'uf', 'address','neighborhood', 'postal_code', 'user_id',];

}
