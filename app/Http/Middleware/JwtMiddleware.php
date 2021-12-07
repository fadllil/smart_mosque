<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function bearerToken()
    {
        $header = $this->header('Authorization', '');
        if (Str::startsWith($header, 'Bearer ')) {
            return Str::substr($header, 7);
        }
    }

    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->bearerToken();

        if (!$token) {
            // Unauthorized response if token not there
            return Response::failure('token not provided', 401);
        }

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch (ExpiredException $e) {
            return Response::failure('token expired', 400);
        } catch (Exception $e) {
            return Response::failure('error while decoding token', 400);
        }
        $user = User::find($credentials->sub->id);
        $request->auth = $user;
        // dd($credentials->sub->uuid);die;
        // Now let's put the user in the request class so that you can grab it from there
        return $next($request);
    }
}
