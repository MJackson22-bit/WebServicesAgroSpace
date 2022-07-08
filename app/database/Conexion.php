<?php

namespace App\Database;
use App\Singleton;
use Exception;

class Conexion
{
    use Singleton;

    private mixed $conexion;
    private array $parametros = [];
    private string $host;
    private string $database;
    private string $usuario;
    private string $password;
    private $declaracion;

    /**
     * La función es privada, por lo que solo se puede llamar desde dentro de la clase. No tiene parámetros y no devuelve
     * nada. Establece las variables de host, base de datos, nombre de usuario y contraseña en los valores del archivo
     * .env. Luego llama a la función connect()
     */
    private function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->database = $_ENV['DB_DATABASE'];
        $this->usuario = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->connect();
    }

    /**
     * Se conecta a la base de datos.
     */
    private function connect(): void
    {
        try
        {
            $this->conexion = sqlsrv_connect($this->host, [
                'database' => $this->database,
                'UID' => $this->usuario,
                'PWD' => $this->password
            ]);
        } catch (Exception $exception)
        {
            die($exception->getMessage());
        }
    }

    /**
     * Ejecute una consulta en la base de datos y almacene el resultado en la propiedad de la declaración.
     *
     * @param string query La consulta a ejecutar.
     *
     * @return self El objeto mismo.
     */
    function consulta(string $consulta): self
    {
        $this->declaracion = sqlsrv_query(
            $this->conexion,
            $consulta
        );

        return $this;
    }

    /**
     * Toma un nombre de procedimiento y lo ejecuta con los parámetros que se han establecido
     *
     * @param string procedure El nombre del procedimiento a ejecutar.
     *
     * @return self La instancia actual de la clase.
     */
    function ejecutar(string $procedimiento): self
    {
        $claves = [];

        foreach($this->parametros as $clave => $valor)
        {
            $claves[] = "$clave = ?";
        }

        $this->declaracion = sqlsrv_query(
            $this->conexion,
            "EXEC $procedimiento " . implode(', ', $claves),
            $this->transformar()
        );

        return $this;
    }

    /**
     * `parameters` toma una matriz de parámetros y devuelve el objeto actual
     *
     * @param array parameters Una matriz de parámetros que se pasarán al método.
     *
     * @return self El objeto mismo.
     */
    function parametros(array $parametros): self
    {
        $this->parametros = $parametros;

        return $this;
    }

    /**
     * > Obtiene los resultados de una consulta y los devuelve como una matriz
     *
     * @return array Una matriz de matrices asociativas.
     */
    function obtener(): array
    {
        $resultado = [];

        while($fila = sqlsrv_fetch_array($this->declaracion, SQLSRV_FETCH_ASSOC))
        {
            $resultado[] = $fila;
        }

        return $resultado;
    }

    /**
     * Cierra la conexión a la base de datos.
     */
    function cerrar(): void
    {
        sqlsrv_close($this->conexion);
    }

    /**
     * Toma una matriz de valores y devuelve una matriz de matrices, cada una de las cuales contiene un valor y una
     * constante
     *
     * @return array Una matriz de matrices.
     */
    private function transformar(): array
    {
        $datos = [];

        foreach($this->parametros as $valor) {
            $datos[] = [$valor, SQLSRV_PARAM_IN];
        }

        return $datos;
    }
}