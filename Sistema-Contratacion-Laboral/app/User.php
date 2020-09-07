<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_POSTULANTE = 'ROLE_POSTULANTE';
    const ROLE_EMPRESA = 'ROLE_EMPRESA';

    private const ROLES_HIERARCHY = [
        self::ROLE_SUPERADMIN => [self::ROLE_ADMIN, self::ROLE_POSTULANTE, self::ROLE_EMPRESA],
        self::ROLE_ADMIN => [self::ROLE_POSTULANTE, self::ROLE_EMPRESA],
        self::ROLE_POSTULANTE => [],
        self::ROLE_EMPRESA => []
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isGranted($role)
    {
        if ($role === $this->role) {
            return true;
        }
        return self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$this->role]);
    }

    public static function isRoleInHierarchy($role, $role_hierarchy)
    {
        if (in_array($role, $role_hierarchy)) {
            return true;
        }

        foreach ($role_hierarchy as $role_included) {
            if (self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$role_included])) {
                return true;
            }
        }
        return false;
    }

    public function oferta()
    {
        return $this->hasMany('App\Oferta');
    }

    public function experiencia()
    {
        return $this->hasMany('App\Experiencia');
    }

    public function estudio()
    {
        return $this->hasMany('App\Estudio');
    }

    public function postulacion()
    {
        return $this->hasMany('App\Postulacion');
    }

    public function userable()
    {
        return $this->morphTo();
    }
}
