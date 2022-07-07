<?php

trait ToResponse
{
    private mixed $response;

    public function response(mixed $response): void
    {
        $this->response = $response;
        echo $this->response;
    }

    public function toJson(): string
    {
//        echo $this->response;
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}