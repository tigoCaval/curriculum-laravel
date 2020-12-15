<?php
namespace App\Domain\Traits;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;

trait DocumentTrait
{

   /**
     * Display document of the authenticated user
     * Exibir documentos do usuário autenticado
     * @return [type]
     */
    public function findDocumentAuth()
    {
        return Document::where('user_id',Auth::user()->id)->first(); 
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * @return [type] 
     */
    public function createDocument(array $data)
    {
       $collection = [
            'user_id'=>Auth::user()->id, 
            'driver_license_id'=>$data['driver_license'], 
            'full_name'=>$data['full_name'], 
            'date_birth'=>$data['date_birth'],
            'nationality'=>$data['nationality'],
            'place_birth'=>$data['place_birth'],
            'ssn'=>$data['ssn'],
            'identity'=>$data['identity'] 
       ];
       return Document::create($collection);      
    } 

   /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Document $document
    * 
    * @return [type]
    */
   public function updateDocument(array $data, Document $document)
   {
      if(Auth::user()->id == $document->user_id){
            $collection = [
                  'driver_license_id'=>$data['driver_license'], 
                  'full_name'=>$data['full_name'], 
                  'date_birth'=>$data['date_birth'],
                  'nationality'=>$data['nationality'],
                  'place_birth'=>$data['place_birth'],
                  'ssn'=>$data['ssn'],
                  'identity'=>$data['identity'] 
            ];
            return $document->update($collection);
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
      return empty(Document::where('user_id', Auth::user()->id)->value('user_id')) ? true : false;
   }

}