<?php


namespace Persistence;

use Core\Application\Repository\AddUserRepositoryInterface;
use Core\Domain\Entities\User;

class AddUserRepository implements AddUserRepositoryInterface
{
  private $database;
  public function __construct(DatabaseInterface $database)
  {
    $this->database = $database->getInstance();
  }

  public function add(User $user): void
  {

    $this->database->insert('USER_TABLE', [
      // 'id' => $user->getId(),
      'fullName' => $user->getFullName(),
      'nis' => $user->getNis()
    ]);
  }
}