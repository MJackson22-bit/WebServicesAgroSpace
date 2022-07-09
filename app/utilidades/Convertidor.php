<?php

namespace App\Utilidades;

trait Convertidor
{
    private mixed $respuesta;

    /**
     * Establece el valor de la variable $respuesta.
     *
     * @param mixed respuesta La respuesta a la solicitud.
     */
    public function respuesta(mixed $respuesta): void
    {
        $this->respuesta = $respuesta;
    }

    /**
     * Devuelve una cadena en formato JSON.
     *
     * @return string Se devuelve la función json_encode.
     */
    public function json(): string
    {
        return json_encode($this->respuesta, JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
}