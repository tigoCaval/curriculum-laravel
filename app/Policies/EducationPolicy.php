<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Education;
use App\Domain\Permissions\CertifyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationPolicy
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
     * @param  \App\Models\Education  $education
     * @return mixed
     */
    public function view(User $user, Education $education)
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $education = new Education();
        return $user && $this->certify->checkPermission('job') && $education->foreignKeyUser();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return mixed
     */
    public function update(User $user, Education $education)
    {
        return $user->id === $education->user_id && $this->certify->checkPermission('job');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return mixed
     */
    public function delete(User $user, Education $education)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return mixed
     */
    public function restore(User $user, Education $education)
    {
       return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return mixed
     */
    public function forceDelete(User $user, Education $education)
    {
        return false;
    }
}
