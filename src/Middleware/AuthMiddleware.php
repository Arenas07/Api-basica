<?php

namespace App\Middleware;

use App\Domain\Models\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Slim\Exception\HttpUnauthorizedException;


class AuthMiddleware {

    public function __construct()
    {
        
    }

    public function __invoke(Request $request, Handle $handler) : Response
    {
        $auth = $request->getHeaderLine('Authorization');

        if (!$auth || !str_starts_with($auth, 'Basic ')){

            throw new HttpUnauthorizedException($request);
        }

        $decoded = base64_decode(substr($auth, 6));
        [$email, $password] = explode(':', $decoded);

        $user = User::where('email', $email)->first();

        if(!$user || !password_verify($password, $user->password)){

            throw new HttpUnauthorizedException($request);
        }

        $request = $request->withAttribute('user', $user);

        return $handler->handle($request);
    }
}