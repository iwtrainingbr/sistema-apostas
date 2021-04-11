<?php

ini_set('display_errors',1);

include '../vendor/autoload.php';
include '../config/database.php';

session_start();

$route = getRouteFromURL();

function getRouteFromURL(): array
{
    $url = explode('?', $_SERVER['REQUEST_URI'])[0]; //captura a url que o usuário tá acessando

    $routes = include_once '../config/routes.php'; //importa as rotas e coloca elas dentro da variavel $routes

    //testa se a url está mapeada nas rotas, se não tiver encerra a aplicaćão mostrando "Pagina não encontra"
    if (!isset($routes[$url])) {
        echo "<h1>Página não encontrada</h1>";
        exit;
    }

    return $routes[$url];
}

function main(): void
{
    global $route;

    include '../vendor/autoload.php'; //pra fazer o auto carregamento, e não precisarmos botar trocentos includes

    $controller = $route['controller']; //recupera o nome do Controller
    $method = $route['action']; //recupera o nome do método

    (new $controller())->$method(); //aqui a gente executa o metodo do Controller (especificados na rota)
}

if ($route['api_rest'] === true) {
    header('Content-Type: application/json');

    $controller = $route['controller'];
    $method = strtolower($_SERVER['REQUEST_METHOD']).'Action';

    (new $controller())->$method();

    exit;
}

include '../views/base.phtml';
