<?php
namespace Core\Application\Repository;

use Core\Domain\Entities\User;

interface FindUserRepositoryInterface
{
  public function find(string $id): ?User;
}