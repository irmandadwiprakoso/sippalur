<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
        return view ('admin.login');
    } 

    public function postlogin(Request $request)
    {
        //dd($request->all());
        if(Auth::attempt($request->only('username','password'))) {
            return redirect('/dashboard');
        }
        return redirect('/login')->with('message', 'Username atau Password kamu salah!');
    } 

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
    public function register()
    {
        return view ('admin.register');
    } 

    public function saveregister(Request $request, User $user)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt ('jakasampurna'),
            'remember_token' => Str::random(60)
        ]);
        return redirect('/user')->with('success', 'Data User Berhasil Ditambahkan!');
    } 
////////////////////////////////////////////////////////////////////////////////////////////////
    public function user(User $user)
    {
        $user = User::all();
        return view('admin.user', ['user' => $user]);
    } 
////////////////////////////////////////////////////////////////////////////////////////////////
    public function changepassword(User $user)
    {
        return view ('pass.reset', compact('user'));
    }

    public function updatepassword(Request $request, User $user)
    {
        //($request->all());
        $request->validate([
            'password' => 'required',
        ]);

        User::where('id', $user->id)
        ->update([
            'password' => bcrypt (request('password')),
        ]);
        return redirect('/user')->with('success', 'Password User Berhasil Direset!');

    }
}
