<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Grado;
use Illuminate\Auth\Access\Response;

class GradoPolicy
{
    /**
     * Determine whether the user can view any models.
     */



    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, grado $grado): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }


    /**
     * Determine whether the user can create models.
     */
    public function edit(User $user, Grado $grado): bool
    {

        return $user->can('grados.destroy', 'grados.update', 'grados.edit') && $grado->id > 20;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, grado $grado): bool
    {

        return $user->can('grados.destroy', 'grados.update', 'grados.edit') && $grado->id > 20;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, grado $grado): bool
    {
        return $user->can('grados.destroy', 'grados.update', 'grados.edit') && $grado->id > 20;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, grado $grado): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, grado $grado): bool
    {
        return $user->can('grados.destroy', 'grados.update', 'grados.edit') && $grado->id > 20;
    }

    public function canDeleteGrado(User $user, Grado $grado)
    {

        return $user->can('grados.destroy', 'grados.update', 'grados.edit') && $grado->id > 20;
    }
}
