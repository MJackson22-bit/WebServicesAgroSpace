<?php

namespace App\Enrutador;
use App\Controladores\ControladorInicio;
use App\Singleton;
use Inhere\Route\Router;
use Throwable;

class Rutas
{
    use Singleton;

    private Router $router;
    private ControladorInicio $controladorInicio;

    /**
     * La función __construct() es un método mágico que se llama cuando se crea una instancia de la clase. Crea una nueva
     * instancia de la clase Router y llama a la función rutas(). La función rutas() es donde definimos nuestras rutas. Se
     * llama a la función dispatch() en la instancia del enrutador y hace coincidir la solicitud actual con las rutas que
     * definimos en la función rutas()
     *
     * @throws Throwable
     */
    private function __construct()
    {
        $this->router = new Router();
        $this->controladorInicio = new ControladorInicio();

        $this->rutas();
        $this->router->dispatch();
    }

    /**
     * Define las rutas que utilizará la aplicación
     */
    private function rutas(): void
    {
        $this->router->get('/', function() {
            $this->controladorInicio->index();
        });

        $this->router->post('/data', function() {
            echo json_encode($_POST);
        });
    }
}