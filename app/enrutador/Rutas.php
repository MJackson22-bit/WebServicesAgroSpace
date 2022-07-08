<?php

namespace App\Enrutador;

class Rutas
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router(new Peticion());
        $this->rutas();
    }

    private function rutas(): void
    {
        $this->router->get('/', function() {
            return '<h3>Hola mundo</h3>';
        });

        $this->router->post('/data', function($request) {
            return json_encode($request->body());
        });
    }
}