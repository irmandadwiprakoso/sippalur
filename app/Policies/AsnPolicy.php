<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AsnPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }
   
    public function akses_asn(User $user)
    {
        return $user->name == 'superadmin';
    }

    public function tambah_asn(User $user)
    {
        return $user->name == 'superadmin';
    }
    
    public function edit_asn(User $user)
    {
        return $user->name == 'superadmin';
    }
    
    public function delete_asn(User $user)
    {
        return $user->name == 'superadmin';
    }
}
