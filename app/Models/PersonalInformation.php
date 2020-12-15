<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Traits\PersonalInformationTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalInformation extends Model
{
    use PersonalInformationTrait;
    
    /**
     * Table SQL
     * @var string
     */
    protected $table = 'personal_informations';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'disability', 'user_id', 'gender_id', 'marital_status_id',  
    ];

    /**
     * Get the personal information that contains the gender.
     * Obter os Dados Pessoais que contém o gênero.
     * 
     * @return [type]
     */
    public function gender()
    {
        return $this->BelongsTo('App\Models\Gender'); 
    }

    /**
     * Get the personal information that contains the marital status.
     * Obter os Dados Pessoais que contém o estado civil.
     * @return [type]
     */
    public function maritalStatus()
    {
        return $this->BelongsTo('App\Models\MaritalStatus'); 
    } 

    
}
