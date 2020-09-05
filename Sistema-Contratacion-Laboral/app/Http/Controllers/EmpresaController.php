<?php

namespace App\Http\Controllers;
use App\Empresa;
use App\Postulante;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\User as UserResource;

class EmpresaController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'empresa' => 'required|string',
            'ruc_cedula' => 'required|string',
            'celular' => 'required|string',
            'sector' => 'required|string',
            'ubicacion' => 'required|string',
            'actividad' => 'required|string',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $Empresa = Empresa::create([
            'empresa' => $request->get('empresa'),
            'ruc_cedula' => $request->get('ruc_cedula'),
            'celular' => $request->get('celular'),
            'sector' => $request->get('sector'),
            'ubicacion' => $request->get('ubicacion'),
            'actividad' => $request->get('actividad'),
        ]);

        $Empresa->user()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user = $Empresa->user;
        $token = JWTAuth::fromUser($user);

        $user_resource=new UserResource($user);
        $user_resource->token($token);
        return response()->json($user_resource,201);
    }
    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(new UserResource($user, 200));
    }
}

