<?php

namespace App\Database;
use App\Singleton;

class Connection
{
    use Singleton;

    private mixed $connection;
    private array $parameters = [];
    private string $host;
    private string $database;
    private string $username;
    private string $password;
    private $statement;

    /**
     * La función es privada, por lo que solo se puede llamar desde dentro de la clase. No tiene parámetros y no devuelve
     * nada. Establece las variables de host, base de datos, nombre de usuario y contraseña en los valores del archivo
     * .env. Luego llama a la función connect()
     */
    private function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->database = $_ENV['DB_DATABASE'];
        $this->username = $_ENV['DB_USERNAME'];
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
            $this->connection = sqlsrv_connect($this->host, [
                'database' => $this->database,
                'UID' => $this->username,
                'PWD' => $this->password
            ]);
        } catch (\Exception $exception)
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
    function query(string $query): self
    {
        $this->statement = sqlsrv_query(
            $this->connection,
            $query
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
    function exec(string $procedure): self
    {
        $keys = [];

        foreach($this->parameters as $key => $value)
        {
            $keys[] = "$key = ?";
        }

        $this->statement = sqlsrv_query(
            $this->connection,
            "EXEC $procedure " . implode(', ', $keys),
            $this->transform()
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
    function parameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * > Obtiene los resultados de una consulta y los devuelve como una matriz
     *
     * @return array Una matriz de matrices asociativas.
     */
    function fetch(): array
    {
        $result = [];

        while($row = sqlsrv_fetch_array($this->statement, SQLSRV_FETCH_ASSOC))
        {
            $result[] = $row;
        }

        return $result;
    }

    /**
     * Cierra la conexión a la base de datos.
     */
    function close(): void
    {
        sqlsrv_close($this->connection);
    }

    /**
     * Toma una matriz de valores y devuelve una matriz de matrices, cada una de las cuales contiene un valor y una
     * constante
     *
     * @return array Una matriz de matrices.
     */
    private function transform(): array
    {
        $data = [];

        foreach($this->parameters as $value) {
            $data[] = [$value, SQLSRV_PARAM_IN];
        }

        return $data;
    }
}