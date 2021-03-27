<?php

use App\Controller\Api\CategoryApiController;
use App\Controller\Api\VehicleApiController;
use App\Controller\CustomerController;
use App\Controller\VehicleController;
use App\Controller\CategoryController;
use App\Controller\BetController;
use App\Controller\UserController;
use App\Controller\BidController;
use App\Controller\AuthenticationController;


function createRoute(string $controllerName, string $actionName): array
{
    return [
        'controller' => $controllerName,
        'action' => $actionName,
    ];
}

return [
    '/' => createRoute(AuthenticationController::class, 'loginAction'),
    '/veiculos/listar' => createRoute(VehicleController::class, 'listAction'),
    '/veiculos/adicionar' => createRoute(VehicleController::class, 'addAction'),
    '/veiculos/excluir' => createRoute(VehicleController::class, 'removeAction'),
    '/veiculos/editar' => createRoute(VehicleController::class, 'editAction'),
    '/clientes/listar' => createRoute(CustomerController::class, 'listAction'),
    '/api/veiculos' => createRoute(VehicleApiController::class, 'getAction'),

    '/categorias/listar' => createRoute(CategoryController::class, 'listAction'),
    '/categorias/adicionar' => createRoute(CategoryController::class, 'addAction'),
    '/categorias/excluir' => createRoute(CategoryController::class, 'removeAction'),
    '/categorias/editar' => createRoute(CategoryController::class, 'editAction'),
    '/api/categorias' => createRoute(CategoryApiController::class, 'getAction'),

    '/aposta/listar' => createRoute(BetController::class, 'listAction'),
    '/aposta/adicionar' => createRoute(BetController::class, 'addAction'),
    '/aposta/excluir' => createRoute(BetController::class, 'removeAction'),
    '/aposta/editar' => createRoute(BetController::class, 'editAction'),

    '/usuario/listar' => createRoute(UserController::class, 'listAction'),
    '/usuario/adicionar' => createRoute(UserController::class, 'addAction'),
    '/usuario/excluir' => createRoute(UserController::class, 'removeAction'),
    '/usuario/editar' => createRoute(UserController::class, 'editAction'),

    '/lance/listar' => createRoute(BidController::class, 'listAction'),
    '/lance/adicionar' => createRoute(BidController::class, 'addAction'),
    '/lance/excluir' => createRoute(BidController::class, 'removeAction'),
    '/lance/editar' => createRoute(BidController::class, 'editAction'),

    '/login' => createRoute(AuthenticationController::class, 'loginAction'),
    '/sair' => createRoute(AuthenticationController::class, 'logoutAction'),
];