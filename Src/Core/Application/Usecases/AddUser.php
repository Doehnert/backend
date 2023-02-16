<?php
namespace Core\Application\Usecases;

use Core\Application\Repository\AddUserRepositoryInterface;
use Core\Domain\Entities\User;
use Core\Domain\Usecases\AddUserInterface;

class AddUser implements AddUserInterface
{
    private $userRepository;

    public function __construct(AddUserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function add(User $user): void
    {
        $this->userRepository->add($user);
    }
}