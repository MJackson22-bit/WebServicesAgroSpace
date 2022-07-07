<?php

trait Singleton
{
    private static mixed $instance = null;

    public static function getInstance(): mixed
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}