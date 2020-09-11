<?php

namespace App\Policies;

use App\Estudio;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstudioPolicy
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
    public function view(User $user, Estudio $estudio)
    {
        return $user->id === $estudio->user_id;
    }

    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_POSTULANTE);
    }
    public function update(User $user, Estudio $estudio)
    {
        return $user === $estudio->user_id;
    }
    public function delete(User $user, Estudio $estudio)
    {
        return ($user->isGranted(User::ROLE_POSTULANTE || $user->isGranted(User::ROLE_ADMIN)));
    }
}
