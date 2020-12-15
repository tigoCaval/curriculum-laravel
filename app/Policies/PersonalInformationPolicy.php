<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PersonalInformation;
use App\Domain\Permissions\CertifyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonalInformationPolicy
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
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return mixed
     */
    public function view(User $user, PersonalInformation $personalInformation)
    {
        return $user->id === $personalInformation->user_id && $this->certify->checkPermission('job'); 
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
           $info = new PersonalInformation();
           return $user && $this->certify->checkPermission('job') && $info->foreignKeyUser(); 
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return mixed
     */
    public function update(User $user, PersonalInformation $personalInformation)
    {
        return $user->id === $personalInformation->user_id && $this->certify->checkPermission('job'); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return mixed
     */
    public function delete(User $user, PersonalInformation $personalInformation)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return mixed
     */
    public function restore(User $user, PersonalInformation $personalInformation)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return mixed
     */
    public function forceDelete(User $user, PersonalInformation $personalInformation)
    {
        return false;
    }
    
}
