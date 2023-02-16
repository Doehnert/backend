<?php

use Core\Application\Repository\AddUserRepositoryInterface;
use Core\Application\Repository\FindUserRepositoryInterface;
use Core\Application\Repository\FindAllUsersRepositoryInterface;
use Persistence\AddUserRepository;
use Persistence\FindAllUsersRepository;
use Persistence\FindUserRepository;
use Persistence\DatabaseInterface;
use Persistence\SqliteDatabase;

return [
    FindUserRepositoryInterface::class => DI\create(FindUserRepository::class)
        ->constructor(DI\get(DatabaseInterface::class)),

    DatabaseInterface::class => DI\create(SqliteDatabase::class),

    AddUserRepositoryInterface::class => DI\create(AddUserRepository::class)
        ->constructor(DI\get(DatabaseInterface::class)),

    FindAllUsersRepositoryInterface::class => DI\create(FindAllUsersRepository::class)
        ->constructor(DI\get(DatabaseInterface::class)),

];