<?php

namespace App\Configuraciones;

use Exception;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class MotorPlantilla
{
    /**
     * @throws Exception
     */
    public function renderizar(string $vista, array $args = [])
    {
        extract($args, EXTR_SKIP);

        $archivo = dirname(__DIR__)."/recursos/vistas/$$vista.twig";

        if(!is_readable($archivo)) {
            throw new  Exception("Archivo no encontrado: $archivo");
        }

        require $archivo;
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function renderizarPlantilla(string $plantilla, array $args = []): void
    {
        static $twig = null;

        if ($twig === null) {
            $cargador = new FilesystemLoader('app\\recursos\\vistas');
            $twig = new Environment($cargador);
        }

        echo $twig->render($plantilla . ".twig", $args);
    }
}