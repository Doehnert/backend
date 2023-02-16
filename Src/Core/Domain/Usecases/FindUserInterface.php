<?php
namespace Core\Domain\Usecases;

use Core\Domain\Entities\User;

interface FindUserInterface
{
  public function find(string $nis): ?User;
}