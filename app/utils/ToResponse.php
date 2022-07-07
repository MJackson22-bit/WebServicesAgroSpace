<?php

namespace App\Utils;

trait ToResponse
{
    private mixed $response;

    public function response(mixed $response): void
    {
        $this->response = $response;
    }

    public function toJson(): string
    {
        return json_encode($this->response, JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
}