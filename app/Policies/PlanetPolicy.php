<?php

namespace App\Policies;

use App\Models\Planet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlanetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Peut voir la liste des planètes ?
        return $user->hasRole(['admin', 'planets_admin']) && $user->can('planets.view');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Planet $planet): bool
    {
        return $user->hasRole(['admin', 'planets_admin']) && $user->can('planets.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['admin', 'planets_admin']) && $user->can('planets.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Planet $planet): bool
    {
        return $user->hasRole(['admin', 'planets_admin']) && $user->can('planets.edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Planet $planet): bool
    {
        return $user->hasRole(['admin', 'planets_admin']) && $user->can('planets.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Planet $planet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Planet $planet): bool
    {
        return false;
    }
}
