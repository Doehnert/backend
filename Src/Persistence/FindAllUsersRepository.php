<?php


namespace Persistence;

use Core\Application\Repository\FindAllUsersRepositoryInterface;
use Core\Domain\Entities\User;

class FindAllUsersRepository implements FindAllUsersRepositoryInterface
{
  private $database;
  public function __construct(DatabaseInterface $database)
  {
    $this->database = $database->getInstance();
  }

  public function findAll(): array
  {
    //Initialize an array.
    $users = array();

    $result = $this->database->select("USER_TABLE", "*");

    foreach ($result as $u) {
      $newUser = new User($u['nis'], $u['fullName']);
      array_push($users, $newUser);
    }

    return $users;
  }
}