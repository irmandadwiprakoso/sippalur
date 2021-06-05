<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TkkPolicy
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

    public function akses_tkk(User $user)
    {
        return $user->name == 'superadmin';
    }

    public function tambah_tkk(User $user)
    {
        return $user->name == 'superadmin';
    }

    public function edit_tkk(User $user)
    {
        return $user->name == 'superadmin';
    }

    public function delete_tkk(User $user)
    {
        return $user->name == 'superadmin';
    }
}
