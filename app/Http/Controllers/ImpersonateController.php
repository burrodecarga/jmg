<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    public function start(User $user)
    {
        dd($user);
        session()->put('impersonte_by', auth()->id);
        //Auth::logout();
        Auth::login($user);
        return redirect('/dashboard');
    }

    public function stop(User $user)
    {
        //dd($user);
        Auth::loginUsingId(session()->pull('impersonate_by'));
        return redirect('/');
    }
}
