<?php

namespace App\Configuraciones;

use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class MotorPlantilla
{
    /**
     * @throws Exception
     */
    public function renderizar(string $vista, array $args = [])
    {
        extract($args, EXTR_SKIP);

        $archivo = dirname(__DIR__)."/recursos/vistas/$$vista";

        if(!is_readable($archivo)) {
            throw new  Exception("Archivo no encontrado: $archivo");
        }

        require $archivo;
    }

    public function renderizarPlantilla(string $plantilla, array $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $cargador = new FilesystemLoader('recursos/vistas');
            $twig = new Environment($cargador);
        }

        echo $twig->render($plantilla, $args);
    }
}