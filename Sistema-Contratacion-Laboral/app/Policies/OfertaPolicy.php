<?php

namespace App\Policies;

use App\User;
use App\Oferta;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfertaPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if ($user->isGranted(User::ROLE_SUPERADMIN)){
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
        //return $user->isGranted(User::ROLE_EMPRESA);

    }

    public function view(User $user, Oferta $oferta)
    {
        return $user->userable_id === $oferta->user_id|| $user->isGranted(User::ROLE_EMPRESA);

    }

    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_POSTULANTE);

    }

    public function update(User $user, Oferta $oferta)
    {
        return $user->isGranted(User::ROLE_POSTULANTE) && $user->userable_id === $oferta->user_id;

    }

    public function delete(User $user, Oferta $oferta)
    {
        return ($user->isGranted(User::ROLE_EMPRESA || $user->isGranted(User::ROLE_ADMIN)));
    }
}
