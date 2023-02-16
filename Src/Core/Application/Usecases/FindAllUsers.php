<?php
namespace Core\Application\Usecases;

use Core\Application\Repository\FindAllUsersRepositoryInterface;
use Core\Domain\Usecases\FindAllUsersInterface;

class FindAllUsers implements FindAllUsersInterface
{
  private $userRepository;

  public function __construct(FindAllUsersRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }
  public function findAll(): array
  {
    return $this->userRepository->findAll();
  }
}