<?php
namespace App\Domain\Traits;

use App\Models\Summary;
use Illuminate\Support\Facades\Auth;

trait SummaryTrait
{
    /**
     * Display summary of the authenticated user
     * Exibir resumo do usuário autenticado
     * @return [type]
     */
    public function findSummaryAuth()
    {
        return Summary::where('user_id',Auth::user()->id)->first(); 
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * 
     * @return [type]
     */
    public function createSummary(array $data)
    {
       $collection = [
            'user_id'=>Auth::user()->id, 
            'description'=>$data['description']
       ]; 
       return Summary::create($collection);        
    }

    /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Summary $summary
    * 
    * @return [type]
    */
   public function updateSummary(array $data, Summary $summary)
   {
       if(Auth::user()->id == $summary->user_id){
            $collection = [
                'description'=>$data['description'] 
            ]; 
            return $summary->update($collection);
       } 
       return exit('oops something went wrong !');       
   }

    /**
    * Remove the specified resource from storage.
    * Excluir o recurso especificado do armazenamento.
    * @param Summary $summary
    * 
    * @return [type]
    */
    public function deleteSummary(Summary $summary)
    {
        return Auth::user()->id == $summary->user_id ? $summary->delete() : exit('oops something went wrong !'); 
    }

   /**
    * Check the value of the foreign key (user), if any, return a Boolean value.
    * Verificar o valor da chave estrangeira (user), caso exista, retorne um valor booleano.
    * @return [type]
    */
    public function foreignKeyUser()
    {
       return empty(Summary::where('user_id', Auth::user()->id)->value('user_id')) ? true : false;
    }
}