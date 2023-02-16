<?php
namespace Core\Domain\Usecases;

use Core\Domain\Entities\User;

interface AddUserInterface
{
  public function add(User $user): void;
}