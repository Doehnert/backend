<?php
namespace Api\Controllers\Find;

// use Core\Application\Manager\FindUser;
use Core\Application\Usecases\FindUser;
use Psr\Http\Message\{
  ServerRequestInterface as Request,
  ResponseInterface as Response
};


class FindUserController
{
  private $findUser;
  public function __construct(FindUser $findUser)
  {
    $this->findUser = $findUser;
  }

  public function handle(Response $response, $nis)
  {
    $user = $this->findUser->find($nis);
    $body = $response->getBody();
    if ($user == null) {
      $user_serialized = json_encode([
        'status' => 'false',
        'msg' => 'user not found'
      ]);
      $body->write($user_serialized);
      return $response->withStatus(404);
    }

    $user_serialized = json_encode([
      'status' => 'success',
      'data' => [
        'nis' => $user->getNis(),
        'fullName' => $user->getFullName()
      ]
    ]);
    $body->write($user_serialized);
    return $response;
  }
}