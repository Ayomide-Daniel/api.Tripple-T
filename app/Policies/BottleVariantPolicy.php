<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BottleVariant;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class BottleVariantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BottleVariant  $bottleVariant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BottleVariant $bottleVariant)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BottleVariant  $bottleVariant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BottleVariant $bottleVariant)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BottleVariant  $bottleVariant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BottleVariant $bottleVariant)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BottleVariant  $bottleVariant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BottleVariant $bottleVariant)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BottleVariant  $bottleVariant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BottleVariant $bottleVariant)
    {
        return $user->isAdmin();
    }
}
