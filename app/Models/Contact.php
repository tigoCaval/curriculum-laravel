<?php

namespace App\Models;

use App\Domain\Traits\ContactTrait;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use ContactTrait;
      /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['phone', 'phone_message', 'email', 'user_id',];
}
