<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use Core\Controller;
use Core\Facades\Route;
use Core\Facades\View;
use App\Models\User;
use Core\Session;


class AuthController extends Controller
{

    public function signIn()
    {
        return View::render('auth.signin');
    }

    public function login(array $data)
    {
        $user = User::where('username', $data['username'])->first();
        if (!empty($user)) {
            if (password_verify($data['password'], $user->password)) {
                (new Session())->set('auth', $user->id);
                return Route::redirectName('home.index');
            }
        }

        return Route::back();
    }

    public function logout()
    {
        (new Session())->delete('auth');
        return Route::redirectName('home.index');
    }

    public function subscribe()
    {
        $roles = Role::map('id', 'name');
        return View::render('auth.subscribe', compact('roles'));
    }

    public function create(array $data)
    {
        dd($data);
    }
}
