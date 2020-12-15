<?php
namespace App\Domain\Traits;

use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Auth;

/**
 * [Description PersonalInformationTrait]
 */
trait PersonalInformationTrait
{
   
    /**
     * Display personal information of the authenticated user
     * Exibir dados pessoais do usuário autenticado
     * @return [type]
     */
    public function findInfoAuth()
    {
        return PersonalInformation::where('user_id',Auth::user()->id)->first(); 
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * 
     * @return [type]
     */
    public function createPersonalInfo(array $data)
    {
       $collection = [
           'user_id'=>Auth::user()->id, 
           'gender_id'=>$data['gender'], 
           'marital_status_id'=>$data['marital_status'], 
           'disability'=>$data['disability'] 
       ];
       return PersonalInformation::create($collection);      
    } 

   /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param PersonalInformation $info
    * 
    * @return [type]
    */
   public function updatePersonalInfo(array $data, PersonalInformation $info)
   {
       if(Auth::user()->id == $info->user_id ){  
            $collection = [ 
                'gender_id'=>$data['gender'], 
                'marital_status_id'=>$data['marital_status'], 
                'disability'=>$data['disability'] 
            ];
            return $info->update($collection);
        }   
        return exit('oops something went wrong !');  
   }

      
   /**
    * Check the value of the foreign key (user), if any, return a Boolean value.
    * Verificar o valor da chave estrangeira (user), caso exista, retorne um valor booleano.
    * @return [type]
    */
   public function foreignKeyUser()
   {
      return empty(PersonalInformation::where('user_id', Auth::user()->id)->value('user_id')) ? true : false;
   }
   

}