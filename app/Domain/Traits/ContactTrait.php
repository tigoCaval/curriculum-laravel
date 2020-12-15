<?php
namespace App\Domain\Traits;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;


trait ContactTrait
{
     /**
     * Display contact of the authenticated user
     * Exibir contato do usuário autenticado
     * @return [type]
     */
    public function findContactAuth()
    {
        return Contact::where('user_id',Auth::user()->id)->first(); 
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * 
     * @return [type]
     */
    public function createContact(array $data)
    {
       $collection = [
          'user_id'=>Auth::user()->id, 
          'phone'=>$data['phone'], 
          'phone_message'=>$data['phone_message'], 
          'email'=>$data['email'] 
       ]; 
       return Contact::create($collection);       
    }
    
    /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Contact $contact
    * 
    * @return [type]
    */
   public function updateContact(array $data, Contact $contact)
   {
      if(Auth::user()->id == $contact->user_id){
            $collection = [ 
               'phone'=>$data['phone'], 
               'phone_message'=>$data['phone_message'], 
               'email'=>$data['email'] 
            ]; 
            return $contact->update($collection);
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
      return empty(Contact::where('user_id', Auth::user()->id)->value('user_id')) ? true : false;
   }

    
    
}