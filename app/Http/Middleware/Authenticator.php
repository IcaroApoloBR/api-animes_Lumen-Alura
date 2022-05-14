<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Authenticator
{
    public function handle($request, Closure $next)
    {
            try {
                if (!$request->hasHeader('Authorization')) {
                    throw new Exception();
                }

                $authorizationHeader = $request->header('Authorization');
                $token = str_replace('Bearer ', '', $authorizationHeader);

                $key = new Key(env('JWT_KEY'), 'HS256');
                
                $dataAuthenticate = JWT::decode($token, $key);

                $user = User::where('email', $dataAuthenticate->email)->first();

                if(is_null($user)) {
                    throw new Exception();
                }

            return $next($request);
            
        } catch (Exception $e) {
            return response()->json('Unauthorized', 401);
        }
    }
}