<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Experience;
use App\Domain\Permissions\CertifyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExperiencePolicy
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
     * @param  \App\Models\Experience  $experience
     * @return mixed
     */
    public function view(User $user, Experience $experience)
    {
        return $user->id === $experience->user_id && $this->certify->checkPermission('job');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $exp = new Experience();
        return $user && $this->certify->checkPermission('job') && $exp->countExperience();   
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Experience  $experience
     * @return mixed
     */
    public function update(User $user, Experience $experience)
    {
        return $user->id === $experience->user_id && $this->certify->checkPermission('job'); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Experience  $experience
     * @return mixed
     */
    public function delete(User $user, Experience $experience)
    {
        return $user->id === $experience->user_id && $this->certify->checkPermission('job'); 
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Experience  $experience
     * @return mixed
     */
    public function restore(User $user, Experience $experience)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Experience  $experience
     * @return mixed
     */
    public function forceDelete(User $user, Experience $experience)
    {
        //
    }
}
