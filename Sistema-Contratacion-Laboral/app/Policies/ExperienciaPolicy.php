<?php

namespace App\Policies;

use App\Experiencia;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExperienciaPolicy
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
    public function view(User $user, Experiencia $experiencia)
    {
        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }

        else {
            foreach ($experiencia->Postulante as $postulante) {
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
    public function update(User $user, Experiencia $experiencia)
    {
        return $user->userable->id === $experiencia->postulante_id && $user->isGranted(User::ROLE_POSTULANTE);
    }
    public function delete(User $user, Experiencia $experiencia)
    {
        return $user->userable->id === $experiencia->postulante_id && $user->isGranted(User::ROLE_POSTULANTE);
    }
}
