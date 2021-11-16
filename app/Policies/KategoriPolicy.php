<?php

namespace App\Policies;

use App\User;
use App\Kategori;
use Illuminate\Auth\Access\HandlesAuthorization;

class KategoriPolicy
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
     * Determine whether the user can update the kategori.
     *
     * @param  \App\User  $user
     * @param  \App\kategori  $kategori
     * @return boolean
     */
    public function update(User $user, kategori $kategori)
    {
        if (env('IS_DEMO')){
            return ($user->isAdmin() || $user->isCreator()) && !in_array($kategori->id, [1]);
        }
        return ($user->isAdmin() || $user->isCreator());

    }

    /**
     * Determine whether the user can delete the kategori.
     *
     * @param  \App\User  $user
     * @param  \App\kategori  $kategori
     * @return boolean
     */
    public function delete(User $user, kategori $kategori)
    {
        if (env('IS_DEMO')){
            return ($user->isAdmin() || $user->isCreator()) && !in_array($kategori->id, [1,2]);
        }
        return ($user->isAdmin() || $user->isCreator());

    }
}
