<?php

trait ToResponse
{
    private mixed $response;

    public function response(string $response): void
    {
        $this->response = $response;
    }

    public function toJson(): string
    {
        return json_encode($this->response);
    }
}