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
    /**
     * La función __construct() es un método mágico que se llama cuando se crea una instancia de la clase. Crea una nueva
     * instancia de la clase Router y llama a la función rutas(). La función rutas() es donde definimos nuestras rutas. Se
     * llama a la función dispatch() en la instancia del enrutador y hace coincidir la solicitud actual con las rutas que
     * definimos en la función rutas()
     */
    private function __construct()
    {
        $this->router = new Router();
        $this->rutas();
        $this->router->dispatch();
    }

    /**
     * Define las rutas que utilizará la aplicación
     */
    private function rutas(): void
    {
        $this->router->get('/', 'App\Controladores\ControladorInicio@index');

        $this->router->post('/data', function() {
            echo json_encode($_POST);
        });
    }
}