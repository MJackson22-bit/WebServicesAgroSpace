<?php

namespace App\Utilidades;

trait Convertidor
{
    private mixed $respuesta;

    public function respuesta(mixed $respuesta): void
    {
        $this->respuesta = $respuesta;
    }

    public function json(): string
    {
        return json_encode($this->respuesta, JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
}