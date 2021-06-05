<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
        public function reset(User $user)
    {
        return view ('admin.reset', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        //dd($request->all());
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)){
            auth()->user()->update([
                'password' => bcrypt (request('password')),
            ]);
            return back()->with('success', 'Password Berhasil Direset!');
        } else{
            return back()->with('info', 'Cek lagi dah ketikannya');
        }
    }
}
