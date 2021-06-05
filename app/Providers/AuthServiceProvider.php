<?php

namespace App\Providers;
use App\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Asn' => 'App\Policies\AsnPolicy',
        'App\Tkk' => 'App\Policies\TkkPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
//         Gate::define('akses_sekret', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//                 if($r->id == 2){
//                     return true;
//                 }
//             }
//             return null;
//         });

//         Gate::define('akses_regis', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//             }
//             return null;
//         });

//         Gate::define('tambah_asn', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//             }
//             return null;
//         });

//         Gate::define('edit_asn', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//             }
//             return null;
//         });

//         Gate::define('delete_asn', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//             }
//             return null;
//         });

//         Gate::define('akses_tkk', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//                 if($r->id == 2){
//                     return true;
//                 }
//             }
//             return null;
//         });

//         Gate::define('tambah_tkk', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//             }
//             return null;
//         });
           
//         Gate::define('edit_tkk', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//             }
//             return null;
//         });

//         Gate::define('delete_tkk', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//             }
//             return null;
//         });
// //////////////////////////////////////////////////////////////////////////////
//         Gate::define('akses_kessos', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//                 if($r->id == 2){
//                     return true;
//                 }
//                 if($r->id == 3){
//                     return true;
//                 }
//                 if($r->id == 8){
//                     return true;
//                 }
//             }
//             return null;
//         });
//         Gate::define('tambah_kessos', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//                 if($r->id == 2){
//                     return true;
//                 }
//                 if($r->id == 3){
//                     return true;
//                 }
//                 if($r->id == 8){
//                     return true;
//                 }
//             }
//             return null;
//         });
           
//         Gate::define('edit_kessos', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//                 if($r->id == 2){
//                     return true;
//                 }
//                 if($r->id == 3){
//                     return true;
//                 }
//                 if($r->id == 8){
//                     return true;
//                 }
//             }
//             return null;
//         });

//         Gate::define('delete_kessos', function($user){
//             $role = User::find($user->id)->role;
//             foreach ($role as $r) {
//                 if($r->id == 1){
//                     return true;
//                 }
//                 if($r->id == 2){
//                     return true;
//                 }
//                 if($r->id == 3){
//                     return true;
//                 }
//                 if($r->id == 8){
//                     return true;
//                 }
//             }
//             return null;
//         });


    }
}
