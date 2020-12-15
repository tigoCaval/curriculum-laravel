<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Language;
use App\Domain\Permissions\CertifyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class LanguagePolicy
{
    use HandlesAuthorization;

     /**
     * @var [type]
     */
    protected $certify;

    /**
     * @param App\Domain\Permissions\CertifyUser $certify
     */
    public function __construct(CertifyUser $certify)
    {
        $this->certify = $certify;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user && $this->certify->checkPermission('job'); 
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function view(User $user, Language $language)
    {
        return $user->id === $language->user_id && $this->certify->checkPermission('job'); 
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $lang = new Language();
        return $user && $this->certify->checkPermission('job') && $lang->countLanguage();  
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function update(User $user, Language $language)
    {
        return $user->id === $language->user_id && $this->certify->checkPermission('job'); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function delete(User $user, Language $language)
    {
        return $user->id === $language->user_id && $this->certify->checkPermission('job');  
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function restore(User $user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function forceDelete(User $user, Language $language)
    {
        //
    }
}
