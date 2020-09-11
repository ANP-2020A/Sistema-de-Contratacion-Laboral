<?php

namespace App\Policies;

use App\Postulante;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostulantePolicy
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

    public function view(User $user, Postulante $postulante)
    {
        return ($user->isGranted(User::ROLE_POSTULANTE));
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Postulante $postulante)
    {
        return $user->isGranted(User::ROLE_ADMIN) || $user->isGranted(User::ROLE_POSTULANTE);
    }

    public function delete(User $user, Postulante $postulante)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

}
