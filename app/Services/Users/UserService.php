<?php

namespace App\Services\Users;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function store (Request $request)
    {
        $user = new User();
        $user->fill($request->except('_token','password'));
        $user->password = bcrypt($request->input('password'));
        $user->save();
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->except('_token', 'password'));
        if($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
    }

}
