<?php

namespace App\Policies;

use App\Models\User;
//use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    //use HandlesAuthorization;


    public function update(User $user, Role $role)
    {
        return false;
        $role = $user->roles()->first();
        return $role->hasPermissionTo('edit articles');
    }


    public function canDeleteRole(User $user, Role $role)
    {
        return false;
        $role = $user->roles()->first();
        //     $permissions = $role->permissions->pluck('name')->toArray();
        //     return in_array($ability . '.index', $permissions) || in_array($ability . '.index', $permissions
        return $user->hasRole('roles.destroy', 'roles.update', 'roles.edit') && $role->id > 11;
    }
}
