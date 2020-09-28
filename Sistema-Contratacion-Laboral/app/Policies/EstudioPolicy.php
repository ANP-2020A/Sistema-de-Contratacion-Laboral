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
        //return $user->id === $estudio->user_id;

        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }

        else {
            foreach ($estudio->Postulante as $postulante) {
                if ($postulante->id === $user->userable->id && $user->isGranted(User::ROLE_POSTULANTE)) {
                    return true;
                }
            }
        }
    }

    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_POSTULANTE);
    }
    public function update(User $user, Estudio $estudio)
    {
        return $user->userable->id === $estudio->postulante_id && $user->isGranted(User::ROLE_POSTULANTE);
    }
    public function delete(User $user, Estudio $estudio)
    {
        return $user->userable->id === $estudio->postulante_id && $user->isGranted(User::ROLE_POSTULANTE);
    }
}
