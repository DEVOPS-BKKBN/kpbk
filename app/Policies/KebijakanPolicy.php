<?php

namespace App\Policies;

use App\User;
use App\Kebijakan;
use Illuminate\Auth\Access\HandlesAuthorization;

class KebijakanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the categories.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return ($user->isAdmin() || $user->isCreator());
    }

    /**
     * Determine whether the user can update the kebijakan.
     *
     * @param  \App\User  $user
     * @param  \App\kebijakan  $kebijakan
     * @return boolean
     */
    public function update(User $user, kebijakan $kebijakan)
    {
        if (env('IS_DEMO')){
            return ($user->isAdmin() || $user->isCreator()) && !in_array($kebijakan->id, [1]);
        }
        return ($user->isAdmin() || $user->isCreator());

    }

    /**
     * Determine whether the user can delete the kebijakan.
     *
     * @param  \App\User  $user
     * @param  \App\kebijakan  $kebijakan
     * @return boolean
     */
    public function delete(User $user, kebijakan $kebijakan)
    {
        if (env('IS_DEMO')){
            return ($user->isAdmin() || $user->isCreator()) && !in_array($kebijakan->id, [1,2]);
        }
        return ($user->isAdmin() || $user->isCreator());

    }
}
