<?php

trait Normalize
{
    public function __construct()
    {
    }

    public function normalize($value): array
    {
        return array_map(function ($value, $key) {
            if (is_array($value)) {
                return $this->normalize($value);
            }

            return $value[$key] = $value;
        }, $value);
    }
}