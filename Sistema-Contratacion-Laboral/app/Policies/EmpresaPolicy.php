<?php

namespace App\Policies;

use App\Empresa;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Empresa $empresa)
    {
        return ($user->isGranted(User::ROLE_EMPRESA));
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Empresa $empresa)
    {
        return $user->isGranted(User::ROLE_ADMIN) || $user->isGranted(User::ROLE_EMPRESA);
    }

    public function delete(User $user, Empresa $empresa)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }
}
