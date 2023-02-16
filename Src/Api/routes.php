<?php

use Api\Controllers\Find\FindUserController;
use Api\Controllers\Find\FindAllUsersController;
use Api\Controllers\Signup\SignupController;

$app->post('/users', [SignupController::class, 'handle']);
$app->get('/users/{nis}', [FindUserController::class, 'handle']);
$app->get('/users', [FindAllUsersController::class, 'handle']);