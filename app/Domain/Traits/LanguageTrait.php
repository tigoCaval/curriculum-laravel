<?php
namespace App\Domain\Traits;

use App\Models\Language;
use Illuminate\Support\Facades\Auth;

trait LanguageTrait
{
     
     /**
     * Display language of the authenticated user
     * Exibir idioma do usuário autenticado
     * @param int $page
     * 
     * @return [type]
     */
    public function languageAuth($page)
    {
        return Language::where('user_id',Auth::user()->id)->paginate($page);   
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     *   
     * @return [type]
     */
    public function createLanguage(array $data)
    {
       $collection = [
            'user_id'=>Auth::user()->id, 
            'reading_language_id'=>$data['reading_language'], 
            'writing_language_id'=>$data['writing_language'], 
            'speak_language_id'=>$data['speak_language'], 
            'description'=>$data['language'],
       ]; 
       return Language::create($collection);         
    }
    
    /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Language $language
    * 
    * @return [type]
    */
   public function updateLanguage(array $data, Language $language)
   {
       if(Auth::user()->id == $language->user_id){
            $collection = [
                'reading_language_id'=>$data['reading_language'], 
                'writing_language_id'=>$data['writing_language'], 
                'speak_language_id'=>$data['speak_language'], 
                'description'=>$data['language'],
            ]; 
            return $language->update($collection); 
       }
       return exit('oops something went wrong !');      
   }


   /**
    * Remove the specified resource from storage.
    * Excluir o recurso especificado do armazenamento.
    * @param Language $language
    * 
    * @return [type]
    */
   public function deleteLanguage(Language $language)
   {
       return Auth::user()->id == $language->user_id ? $language->delete() : exit('oops something went wrong !'); 
   }

 
   /**
    * CHECK the amount of records made,
    * create a limit on the number of records and return a Boolean value.
    * Verificar a quantidade de registros efetuados, 
    * criar um limite de quantidade de registros e retornar um valor booleano.
    * @return bool
    */
   public function countLanguage() 
   {
       $limit = 3; 
       $count = Language::where('user_id',Auth::user()->id)->count();
       return $count < $limit ?  true : false;      
   }




}