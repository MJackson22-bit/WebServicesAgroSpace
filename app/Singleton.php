<?php

namespace App;

trait Singleton
{
    private static mixed $instancia = null;

    /**
     * > Si la instancia es nula, crea una nueva instancia de la clase y devuélvela. De lo contrario, devolver la instancia
     * existente
     *
     * @return mixed La instancia de la clase.
     */
    public static function obtenerInstancia(): mixed
    {
        if (self::$instancia === null)
        {
            self::$instancia = new self();
        }

        return self::$instancia;
    }
}