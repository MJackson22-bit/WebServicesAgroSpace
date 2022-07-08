<?php

namespace App\Enrutador;

class Router
{
    private IPeticion $peticion;
    private array $supportedHttpMethods = array(
        "GET",
        "POST"
    );

    function __construct(IPeticion $peticion)
    {
        $this->peticion = $peticion;
    }

    function __call($nombre, $args)
    {
        list($ruta, $metodo) = $args;

        if(!in_array(strtoupper($nombre), $this->supportedHttpMethods))
        {
            $this->mmanejadorMetodoInvalido();
        }

        $this->{strtolower($nombre)}[$this->formatoRuta($ruta)] = $metodo;
    }

    private function formatoRuta($ruta): string
    {
        $result = rtrim($ruta, '/');

        if ($result === '')
        {
            return '/';
        }

        return $result;
    }

    private function mmanejadorMetodoInvalido(): void
    {
        header("Metodo no permitido: {$this->peticion->serverProtocol} | 405");
    }

    private function manejadorPeticionPorDefecto(): void
    {
        header("Recursos no encontrado: {$this->peticion->serverProtocol} | 404");
    }

    function resolve(): void
    {
        $metodos = $this->{strtolower($this->peticion->requestMethod)};
        $rutaFormateada = $this->formatoRuta($this->peticion->requestUri);
        $metodo = $metodos[$rutaFormateada];

        if(is_null($metodo))
        {
            $this->manejadorPeticionPorDefecto();
            return;
        }

        echo call_user_func_array($metodo, array($this->peticion));
    }

    function __destruct()
    {
        $this->resolve();
    }
}