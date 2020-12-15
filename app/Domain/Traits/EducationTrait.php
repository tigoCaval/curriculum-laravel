<?php
namespace App\Domain\Traits;

use App\Models\Education;
use Illuminate\Support\Facades\Auth;

trait EducationTrait
{
    /**
     * Display Education of the authenticated user
     * Exibir escolaridade do usuário autenticado
     * @return [type]
     */
    public function findEducationAuth()
    {
        return Education::where('user_id',Auth::user()->id)->first(); 
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * 
     * @return [type]
     */
    public function createEducation(array $data)
    {
       $collection = [
            'user_id'=>Auth::user()->id, 
            'education_course_id'=>$data['education_course']
       ]; 
       return Education::create($collection);       
    }
    
    /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Education $education
    * 
    * @return [type]
    */
   public function updateEducation(array $data, Education $education)
   {
       if(Auth::user()->id == $education->user_id){
            $collection = [
                'education_course_id'=>$data['education_course']
            ]; 
            return $education->update($collection);
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
      return empty(Education::where('user_id', Auth::user()->id)->value('user_id')) ? true : false;
   }
 
}