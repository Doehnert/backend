<?php
namespace Api\Controllers\Signup;

use Core\Application\Usecases\AddUser;
use Psr\Http\Message\{
  ServerRequestInterface as Request,
  ResponseInterface as Response
};
use Core\Domain\Entities\User;

class SignupController
{
  // private $userManager;
  private $addUser;
  public function __construct(AddUser $addUser)
  {
    $this->addUser = $addUser;
  }

  public function handle(Request $request, Response $response)
  {
    $json = $request->getBody();

    $obj = json_decode($json);
    $user = new User(null, $obj->fullName);
    $this->addUser->add($user);
    $body = $response->getBody();
    $user_serialized = json_encode([
      'status' => 'success',
      'data' => [
        'nis' => $user->getNis(),
        'fullName' => $user->getFullName()
      ]
    ]);
    $body->write($user_serialized);
    return $response->withStatus(201);
  }
}