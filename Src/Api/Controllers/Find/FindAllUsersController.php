<?php
namespace Api\Controllers\Find;

use Core\Application\Usecases\FindAllUsers;
use Psr\Http\Message\{
  ResponseInterface as Response
};


class FindAllUsersController
{
  private $findAllUsers;
  public function __construct(FindAllUsers $findAllUsers)
  {
    $this->findAllUsers = $findAllUsers;
  }

  public function handle(Response $response)
  {
    $users = $this->findAllUsers->findAll();
    $usersArray = [];
    foreach ($users as $u) {
      array_push(
        $usersArray,
        [
          'nis' => $u->getNis(),
          'fullName' => $u->getFullName()
        ]
      );
    }
    $body = $response->getBody();
    $user_serialized = json_encode([
      'status' => 'success',
      'data' => $usersArray
    ]);
    $body->write($user_serialized);
    return $response;
  }
}