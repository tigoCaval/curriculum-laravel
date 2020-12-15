<?php
namespace App\Domain\Traits;

use App\Models\Objective;
use Illuminate\Support\Facades\Auth;
 
trait ObjectiveTrait
{
   /**
     * Display objective of the authenticated user
     * Exibir objetivo do usuário autenticado
     * @return [type]
     */
    public function findObjectiveAuth()
    {
        return Objective::where('user_id',Auth::user()->id)->first(); 
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * 
     * @return [type]
     */
    public function createObjective(array $data)
    {
       $collection = [
            'user_id'=>Auth::user()->id, 
            'description'=>$data['description']
       ]; 
       return Objective::create($collection);        
    }

    /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Objective $objective
    * 
    * @return [type]
    */
   public function updateObjective(array $data, Objective $objective)
   {
       if(Auth::user()->id == $objective->user_id){
            $collection = [
                'description'=>$data['description'] 
            ]; 
            return $objective->update($collection);
       } 
       return exit('oops something went wrong !');       
   }

   /**
    * Remove the specified resource from storage.
    * Excluir o recurso especificado do armazenamento.
    * @param Objective $objective
    * 
    * @return [type]
    */
    public function deleteObjective(Objective $objective)
    {
        return Auth::user()->id == $objective->user_id ? $objective->delete() : exit('oops something went wrong !'); 
    }


   /**
    * Check the value of the foreign key (user), if any, return a Boolean value.
    * Verificar o valor da chave estrangeira (user), caso exista, retorne um valor booleano.
    * @return [type]
    */
    public function foreignKeyUser()
    {
       return empty(Objective::where('user_id', Auth::user()->id)->value('user_id')) ? true : false;
    }
        
    
}