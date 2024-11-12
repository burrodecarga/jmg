<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\User;

class RoleController extends Controller implements HasMiddleware
{

    public function __construct()
    {
    }

    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('can:roles.index', only: ['index']),
            new Middleware('can:roles.create', only: ['create']),
            new Middleware('can:roles.store', only: ['store']),
            new Middleware('can:roles.show', only: ['show']),
            new Middleware('can:roles.update', only: ['update']),
            new Middleware('can:roles.edit', only: ['edit']),
            new Middleware('can:roles.destroy', only: ['destroy']),
        ];
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $roles = Role::all();
        return view('super.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $role = new Role();
        $title = "role create";
        $btn = "create";
        $permissions_id = [];
        return view('super.roles.create', compact('permissions', 'role', 'btn', 'permissions_id', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $name = $request->input('name');
        $permissions = $request->only('permissions');
        $role = Role::create(['name' => $name, 'guard_name' => 'web']);
        if (count($permissions) > 0) {
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $title = "role show";
        $btn = "show";
        $permissions_id = $role->permissions->pluck('id')->toArray();
        return view('super.roles.show', compact('permissions', 'role', 'btn', 'permissions_id', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $title = "role edit";
        $btn = "update";
        $permissions_id = $role->permissions->pluck('id')->toArray();
        return view('super.roles.edit', compact('permissions', 'role', 'btn', 'permissions_id', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);
        $data = $request->only('name');

        $permissions = $request->only('permissions');
        if ($role->id > MINIMO_ROLE_ORIGINAL) {
            $role->update($data);
        }
        if ($role->id > 1) {
            if (count($permissions) > 0) {
                $role->syncPermissions($permissions);
            }
        }
        return redirect()->route('roles.index')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $user = auth()->user();
        $roleName = $user->roles->pluck("name")->first();
        if ($role->id < MINIMO_ROLE_ORIGINAL) {
            return redirect()->route('roles.index')->with('success', 'Operación no permitida');
        }
        if ($roleName <> 'super-admin') {

            abort(403);
        } {
            $role->delete();
            //dd($roleName);
            return redirect()->route('roles.index')->with('success', 'Role Eliminado correctamente');
        }
    }
}
