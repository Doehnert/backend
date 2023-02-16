<?php


namespace Persistence;

use Core\Application\Repository\FindUserRepositoryInterface;
use Core\Domain\Entities\User;

class FindUserRepository implements FindUserRepositoryInterface
{
  private $database;
  public function __construct(DatabaseInterface $database)
  {
    $this->database = $database->getInstance();
  }

  public function find(string $nis): ?User
  {

    $result = $this->database->get("USER_TABLE", "*", [
      "nis" => $nis
    ]);
    if ($result == null)
      return null;
    return new User($result['nis'], $result['fullName']);
  }
}