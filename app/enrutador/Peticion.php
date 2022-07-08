<?php

namespace App\Enrutador;

class Peticion implements IPeticion
{
    public function __construct()
    {
        $this->bootstrap();
    }

    private function bootstrap()
    {
        foreach($_SERVER as $key => $value)
        {
            $this->{$this->camelCase($key)} = $value;
        }
    }

    private function camelCase(mixed $string): array|string
    {
        $resultado = strtolower($string);

        preg_match_all('/_[a-z]/', $resultado, $conicidencias);

        foreach($conicidencias[0] as $conicidencia)
        {
            $remplazado = str_replace('_', '', strtoupper($conicidencia));
            $resultado = str_replace($conicidencia, $remplazado, $resultado);
        }

        return $resultado;
    }

    public function body(): array|null
    {
        if($this->requestMethod != 'POST')
        {
            return null;
        }

        $body = array();

        foreach($_POST as $key => $value)
        {
            $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }
}