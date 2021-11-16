<?php

namespace App\Policies;

use App\User;
use App\Transaksi;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransaksiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the transaksis.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can create transaksis.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return ($user->isAdmin() || $user->isCreator());
    }

    /**
     * Determine whether the user can update the transaksi.
     *
     * @param  \App\User  $user
     * @param  \App\transaksi  $transaksi
     * @return boolean
     */
    public function update(User $user, transaksi $transaksi)
    {
        if (env('IS_DEMO')){
            return ($user->isAdmin() || $user->isCreator()) && !in_array($transaksi->id, [1]);
        }
        return ($user->isAdmin() || $user->isCreator());
    }

    /**
     * Determine whether the user can delete the transaksi.
     *
     * @param  \App\User  $user
     * @param  \App\transaksi  $transaksi
     * @return boolean
     */
    public function delete(User $user, transaksi $transaksi)
    {
        if (env('IS_DEMO')){
            return ($user->isAdmin() || $user->isCreator()) && !in_array($transaksi->id, [1, 2]);
        }
        return ($user->isAdmin() || $user->isCreator());
        
    }
}
