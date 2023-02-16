<?php
namespace Core\Application\Repository;

use Core\Domain\Entities\User;

interface AddUserRepositoryInterface
{
  public function add(User $user): void;
}