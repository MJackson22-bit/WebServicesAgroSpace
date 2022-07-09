<?php

namespace App\Configuraciones;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class MotorPlantilla
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function renderizarPlantilla(string $plantilla, array $args = []): void
    {
        static $twig = null;

        if ($twig === null) {
            $cargador = new FilesystemLoader('app/recursos/vistas');
            $twig = new Environment($cargador);
        }

        echo $twig->render($plantilla . ".twig", $args);
    }
}