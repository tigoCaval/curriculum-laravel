<?php
namespace App\Domain\Permissions;

use Illuminate\Support\Facades\Auth;

/**
 * User administrative permissions rule
 * Regra de permissões administrativas do usuário
 */
class CertifyUser
{

    /*** 
    * Access permissions rule
    * Regra de permissões de acesso
    * @access private
    */  
    private $permissions = [
        1 => ['admin'], 
        2 => ['job']   
    ];

    /**
    * Verify the administrative permission of the authenticated user
    * Verificar a permissão administrativa do usuário autenticado
    * @access private
    * @return [type]
    */
    private function userAuth()
    {
        return Auth::user()->level;
    }


    /**
    * Check if the attribute exists in permissions 
    * Verificar se o atributo existe nas permissions 
    * @return [type]
    */
    public function checkPermission($role)
    {
        $check = false;
        foreach($this->permissions as $item){
            
            if(key($this->permissions) == $this->userAuth() ){
                if(in_array($role, $item))
                    return $check = true;            
            }  
            next($this->permissions);
        }
        return $check;    
    }

}