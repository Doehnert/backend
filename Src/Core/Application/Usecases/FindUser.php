<?php
namespace Core\Application\Usecases;

use Core\Application\Repository\FindUserRepositoryInterface;
use Core\Domain\Entities\User;
use Core\Domain\Usecases\FindUserInterface;

class FindUser implements FindUserInterface
{
  private $userRepository;

  public function __construct(FindUserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }
  public function find(string $nis): ?User
  {
    return $this->userRepository->find($nis);
  }
}