<?php

namespace App\Policies;

use App\Models\Personal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonalPolicy
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
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAnyForStudent(User $user)
    {
        return $user->role === 'student';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Personal $personal)
    {
        return ($user->id !== $personal->user_id) && ($user->role === 'admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateForStudent(User $user, Personal $personal)
    {
        return $user->id === $personal->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Personal $personal)
    {
        return ($user->id !== $personal->user_id) && ($user->role === 'admin');
    }

    /**
     * Determine whether the user can download models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function download(User $user, Personal $personal)
    {
        return ($user->id === $personal->user_id) || ($user->role === 'admin');
    }
}
