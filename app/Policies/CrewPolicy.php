<?php

namespace App\Policies;

use App\Models\Crew;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CrewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['admin', 'crews_admin']) && $user->can('crews.view');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Crew $crew): bool
    {
        return $user->hasRole(['admin', 'crews_admin']) && $user->can('crews.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['admin', 'crews_admin']) && $user->can('crews.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Crew $crew): bool
    {
        return $user->hasRole(['admin', 'crews_admin']) && $user->can('crews.edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Crew $crew): bool
    {
        return $user->hasRole(['admin', 'crews_admin']) && $user->can('crews.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Crew $crew): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Crew $crew): bool
    {
        return false;
    }
}
