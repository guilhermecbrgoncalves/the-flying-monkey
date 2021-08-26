<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    /* public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    } */

    public function show(User $user)
    {
        return view('pages.dashboard.users.profile', ['user' => $user]);
    }

    public function update(User $user)
    {
        if (request('password')) {
            $inputs = request()->validate([
                'username' => ['required', 'string', 'max:55', 'alpha_dash'],
                'name' => ['required', 'string', 'max:255'],
                'password' => ['min:6', 'max:255', 'confirmed'],
                'avatar' => ['file:jpeg,png'],
                'email' => ['required', 'email', 'max:255'],
            ]);

            $inputs['password'] = Hash::make($inputs['password']);
        } else {
            $inputs = request()->validate([
                'username' => ['required', 'string', 'max:55', 'alpha_dash'],
                'name' => ['required', 'string', 'max:255'],
                'avatar' => ['file:jpeg,png'],
                'email' => ['required', 'email', 'max:255'],
            ]);
        }

        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);
        session()->flash('profile-updated-message', 'profile updated successfully!');
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('user-deleted', 'User has been deleted');
        return back();
    }
}
