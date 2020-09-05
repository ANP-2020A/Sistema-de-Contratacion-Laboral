<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class PostulanteMiddleware
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth=$auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->userable_type)
        {
            case 'Admin':
                # Admin
                return redirect()->to('Admin');
                break;
            case 'App\Empresa':
                # Empresa
                return redirect()->to('Empresa');
                break;
            case 'App\Postulante':
                # Postulante
                //return redirect()->to('Postulante');
                break;
            default:
                return redirect()->to('login');
        }
        return $next($request);
    }
}
