<?php
namespace App\Domain\Traits;

use App\Models\Experience;
use Illuminate\Support\Facades\Auth;

trait ExperienceTrait
{
    
    /**
     * Display experience of the authenticated user
     * Exibir experiência do usuário autenticado
     * @param int $page
     * 
     * @return [type]
     */
    public function experienceAuth($page)
    {
        return Experience::where('user_id',Auth::user()->id)->orderBy('end','DESC')->paginate($page);  
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * 
     * @return [type]
     */
    public function createExperience(array $data)
    {
       $collection = [
            'user_id'=>Auth::user()->id, 
            'company'=>$data['company'], 
            'location'=>$data['location'], 
            'job_title'=>$data['job_title'], 
            'description'=>$data['description'],
            'start'=>$data['start'], 
            'end'=>$data['end']
       ]; 
       return Experience::create($collection);       
    }
    
    /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Experience $experience
    * 
    * @return [type]
    */
   public function updateExperience(array $data, Experience $experience)
   {
       if(Auth::user()->id == $experience->user_id){
            $collection = [
                'company'=>$data['company'], 
                'location'=>$data['location'], 
                'job_title'=>$data['job_title'], 
                'description'=>$data['description'],
                'start'=>$data['start'], 
                'end'=>$data['end']
            ]; 
            return $experience->update($collection);
       }
       return exit('oops something went wrong !');      
   }

   /**
    * Remove the specified resource from storage.
    * Excluir o recurso especificado do armazenamento.
    * @param Experience $experience
    * 
    * @return [type]
    */
    public function deleteExperience(Experience $experience)
    {
        return Auth::user()->id == $experience->user_id ? $experience->delete() : exit('oops something went wrong !'); 
    }

 
   /**
    * CHECK the amount of records made,
    * create a limit on the number of records and return a Boolean value.
    * Verificar a quantidade de registros efetuados, 
    * criar um limite de quantidade de registros e retornar um valor booleano.
    * @return bool
    */
   public function countExperience() 
   {
       $limit = 3; 
       $count = Experience::where('user_id',Auth::user()->id)->count();
       return $count < $limit ?  true : false;      
   }


}