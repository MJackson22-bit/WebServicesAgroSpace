<?php

namespace App\Enrutador;
use App\Singleton;
use Inhere\Route\Router;
use Throwable;

class Rutas
{
    use Singleton;

    private Router $router;

    /**
     * @throws Throwable
     */
    private function __construct()
    {
        $this->router = new Router();
        $this->rutas();
        $this->router->dispatch();
    }

    private function rutas(): void
    {
        $this->router->get('/', function() {
            echo '<h1>Hola mundo</h1>';
        });

        $this->router->post('/data', function() {
            echo json_encode($_POST);
        });
    }
}