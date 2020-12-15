<?php
namespace App\Domain\Traits;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;


trait AddressTrait
{

    /**
     * Display Address of the authenticated user
     * Exibir endereço do usuário autenticado
     * @return [type]
     */
    public function findAddressAuth()
    {
        return Address::where('user_id',Auth::user()->id)->first(); 
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * @return [type]
     */
    public function createAddress(array $data)
    {
       $collection = [
            'user_id'=>Auth::user()->id, 
            'country'=>$data['country'], 
            'city'=>$data['city'], 
            'uf'=>$data['uf'], 
            'address'=>$data['address'],
            'neighborhood'=>$data['neighborhood'], 
            'postal_code'=>$data['postal_code']
       ]; 
       return Address::create($collection);       
    }
    
    /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Address $address
    * 
    * @return [type]
    */
   public function updateAddress(array $data, Address $address)
   {
        if(Auth::user()->id == $address->user_id){
            $collection = [
                  'country'=>$data['country'], 
                  'city'=>$data['city'], 
                  'uf'=>$data['uf'], 
                  'address'=>$data['address'],
                  'neighborhood'=>$data['neighborhood'], 
                  'postal_code'=>$data['postal_code']
            ];
            return $address->update($collection);
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
      return empty(Address::where('user_id', Auth::user()->id)->value('user_id')) ? true : false;
   }


}