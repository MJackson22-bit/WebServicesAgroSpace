<?php

namespace App;

trait Singleton
{
    private static mixed $instance = null;

    /**
     * > Si la instancia es nula, crea una nueva instancia de la clase y devuélvela. De lo contrario, devolver la instancia
     * existente
     *
     * @return mixed La instancia de la clase.
     */
    public static function getInstance(): mixed
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}