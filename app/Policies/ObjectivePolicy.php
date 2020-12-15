<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Objective;
use App\Domain\Permissions\CertifyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class ObjectivePolicy
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
     * @param  \App\Models\Objective  $objective
     * @return mixed
     */
    public function view(User $user, Objective $objective)
    {
        return $user->id === $objective->user_id  && $this->certify->checkPermission('job');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $objective = new Objective();
        return $user && $this->certify->checkPermission('job') && $objective->foreignKeyUser();  
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Objective  $objective
     * @return mixed
     */
    public function update(User $user, Objective $objective)
    {
        return $user->id === $objective->user_id && $this->certify->checkPermission('job');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Objective  $objective
     * @return mixed
     */
    public function delete(User $user, Objective $objective)
    {
        return $user->id === $objective->user_id  && $this->certify->checkPermission('job');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Objective  $objective
     * @return mixed
     */
    public function restore(User $user, Objective $objective)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Objective  $objective
     * @return mixed
     */
    public function forceDelete(User $user, Objective $objective)
    {
        return false;
    }
}
