<?php

namespace App\Providers;

use Spatie\Permission\Models\Role;
use Nette\Utils\ArrayList;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Observers\VideoObserver;
use App\Models\Video;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //Video::observe(VideoObserver::class);

        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });

        Blade::if('canRole', function (string $value) {
            $permissions = auth()->user()->getPermissionsViaRoles()->pluck('name')->toArray();
            //dd($value,$permissions);
            return in_array($value.'.index',$permissions);
        });
        // Gate::before(function ($user, $ability) {
        //     return true;
        //     $role = $user->roles()->first();
        //     $permissions = $role->permissions->pluck('name')->toArray();
        //     return in_array($ability . '.index', $permissions) || in_array($ability . '.index', $permissions);
        // });

        // Blade::directive('mostrar_menu', function ($user, $ability) {
        //     $roleId = Auth::user()->roles->pluck("id")->first();
        //     $role = Role::find($roleId);

        //     //$permissions = DB::table('role_has_permissions')->where('role_id', $roleId)->pluck('permission_id');
        //     //dd($permissions, $roleId);
        //     return true;
        // });
    }
}
