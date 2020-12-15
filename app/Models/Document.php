<?php

namespace App\Models;

use App\Domain\Traits\DocumentTrait;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use DocumentTrait;
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['full_name', 'date_birth', 'nationality', 'place_birth', 'ssn', 'identity', 
    'driver_license_id', 'user_id',  
    ];

     /**
     * Get the document that contains the driver licenses.
     * Obter documentos que contém a habilitação.
     * @return [type]
     */
    public function driverLicense()
    {
        return $this->BelongsTo('App\Models\DriverLicense'); 
    } 


 
}
