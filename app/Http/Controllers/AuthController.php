<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Rw;
use Yajra\DataTables\Facades\DataTables;

class AuthController extends Controller
{
    public function login()
    {
        return view ('admin.login3');
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
        ],
        [
            'name.required' => 'Harus Di Isi Yaa',
            'username.required' => 'Harus Di Isi Yaa',
            'role.required' => 'Harus Di Isi Yaa',
            'email.required' => 'Harus Di Isi Yaa',
        ]
    );

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

////////////////////////////////////////////////////////////////////////////////////////////////
    public function edituser(User $user)
    {
        $rw = Rw::all();
        return view ('admin.edit', compact('user', 'rw'));
    }

    public function updateuser(Request $request, User $user)
    {
        //($request->all());
        $request->validate([
            'rw_id' => 'required',
        ]);

        User::where('id', $user->id)
        ->update([
            'rw_id' => $request->rw_id,
        ]);
        return redirect('/user')->with('success', 'RW User Berhasil Dirubah!');
    }

    public function deleteuser(User $user)
    {
        User::destroy($user->id);
        // return redirect('/user')->with('success', 'User Berhasil dihapus!');
        return redirect()->back();
    }

    public function hapususer(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function getdatauser()
    {
        $user = User::select('users.*');
        return DataTables::eloquent($user)
        ->addIndexColumn()
        ->addColumn('edituser', function($user){
                return '<a href="user/'.$user->id.'/edit" class="btn btn-warning" title="Edit RW">
                <i class="glyphicon glyphicon-user"></i></a>';
        })

        ->addColumn('edit', function($user){
                return '<a href="user/'.$user->id.'/changepassword" class="btn btn-warning" title="Reset Password">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($user){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$user->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })
        
        ->rawColumns(['edituser','edit', 'hapus'])
        ->toJson();
        
        }



}
