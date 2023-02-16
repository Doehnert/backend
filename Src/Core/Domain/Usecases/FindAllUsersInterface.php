<?php
namespace Core\Domain\Usecases;

interface FindAllUsersInterface
{
  public function findAll(): array;
}