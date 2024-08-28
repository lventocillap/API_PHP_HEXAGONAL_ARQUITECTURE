<?php

use Src\Billboard\Infrastructure\Controller\BillboardControll;
use Src\User\Infrastructure\Controller\UserController;

// Cargar el autoloading si estás usando Composer
require_once __DIR__ . '/../vendor/autoload.php';

$container = require_once __DIR__ . '/../bootstrap.php';
$userController = new UserController($container);
$billboarController = new BillboardControll($container);

return [
  'GET' => [
    'users' => function () use ($userController) {
      $userController->index();
    },
    'users/{id}' => function ($userId) use ($userController) {
      $userController->show((int)$userId);
    },
    'billboards' => function () use ($billboarController) {
      $billboarController->index();
    },
    'billboards/{id}' => function ($billboardId) use ($billboarController) {
      $billboarController->show((int)$billboardId);
    },
  ],
  'POST' => [
    'billboards' => function () use ($billboarController) {
      $billboarController->insert();
    },
  ],
  'PUT' => [
    'billboards/{id}' => function ($billboardId) use ($billboarController) {
      $billboarController->update((int)$billboardId);
    },
  ],
  'DELETE' => [
    'billboards/{id}' => function ($billboardId) use ($billboarController) {
      $billboarController->delete((int)$billboardId);
    },
  ],
];
