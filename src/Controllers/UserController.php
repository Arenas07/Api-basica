<?php
 
namespace App\Controllers;
 
use App\Domain\Repositories\UserRepositoyInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\DTOs\UserDTO;

class UserController{
    public function __construct(private UserRepositoyInterface $repo)
    {
    }

    public function createUser(Request $request, Response $response): Response {
        
        $data = $request->getParsedBody();


        $dto = new UserDTO(
            nombre: $data['nombre'] ?? '',
            email: $data['email'] ?? '',
            password: $data['password'] ?? '',
            rol: 'user'
        );

        $user = $this->repo->create($dto);

        $response->getBody()->write(json_encode($user));
        return $response->withStatus(201);
    }

    public function createAdmin(Request $request, Response $response): Response {
        
        $data = $request->getParsedBody();
        $data['rol'] = 'admin';

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $user = $this->repo->create($data);

        $response->getBody()->write(json_encode($user));
        return $response->withStatus(201);
    }
}