<?php
include("TableGenerator.php");
class CustomMysqli extends \mysqli
{
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->createDB($servername, $username, $password, $dbname);
        parent::__construct($servername, $username, $password, $dbname);
    }

    public function createDB($servername, $username, $password, $dbname)
    {
        $conn = mysqli_connect($servername, $username, $password);

        if (!$conn) {
            echo 'Connected failure -';
        }
        echo 'Connected successfully -';
        $sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;

        if (mysqli_query($conn, $sql)) {
            echo "Database created successfully -";
        } else {
            echo "Error creating database: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
  
    public function queryPrepared($query, array $args)
    {
        echo $query;
        $stmt   = $this->prepare($query);
        if ($stmt === FALSE) {
            die("Mysql Error: " . $this->error);
        }

        $params = [];
        $types  = array_reduce($args, function ($string, &$arg) use (&$params) {
            $params[] = &$arg;
            if (is_float($arg))         $string .= 'd';
            elseif (is_integer($arg))   $string .= 'i';
            elseif (is_string($arg))    $string .= 's';
            else                        $string .= 'b';
            return $string;
        }, '');

        array_unshift($params, $types);
        array_unshift($params, $stmt);


        call_user_func_array('mysqli_stmt_bind_param', $params);


        $result = $stmt->execute() ? $stmt->get_result() : false;

        $stmt->close();

        return $result;
    }
}
class DataBase
{
    protected $servername = "localhost";
    protected $username = "DBUSER2020";
    protected $password = "DBPSWD2020";
    protected $dbname = "Ejercicio7";

    protected $db;

    public function __construct()
    {
        $this->db = new CustomMysqli($this->servername, $this->username, $this->password, $this->dbname);
        //comprobamos conexión
        if ($this->db->connect_error) {
            exit("<p>ERROR de conexión:" .  $this->db->connect_error . "</p>");
        }
    }

    function findAll($tabla)
    {
        $consulta = 'SELECT * FROM ' . $tabla . '';
        $resultado = $this->db->query($consulta);

        return $resultado;
    }

    function search($tabla, $parametros, $search)
    {
        $resultado = $this->db->queryPrepared(
            'SELECT * FROM ' . $tabla . ' WHERE ' . $search . ' ? ',
            $parametros
        );
        return $resultado;
    }
    function update($tabla, $parametros, $valores, $where)
    {
        $sentencia = "";
        foreach ($parametros as $parametro) {
            $sentencia .= "'".$parametro ."'=?";
        }
        $sentencia = trim($sentencia, ',');

        $resultado = $this->db->queryPrepared(
            'UPDATE ' . $tabla . ' set' . $sentencia . ' WHERE ' . $where . '=?',
            $valores
        );
        return $resultado;
    }
    function delete($tabla, $campo, $valor)
    {
        $resultado = $this->db->queryPrepared(
            'DELETE FROM ' . $tabla . ' WHERE ' . $campo . ' = ? ',
            [
                $valor
            ]
        );
        return $resultado;
    }
    function insert($tabla, $parametros, $valores)
    {
        $sentencia = "";
        foreach ($parametros as $parametro) {
            $sentencia .= "`".$parametro ."`,";
        }
        $sentencia = trim($sentencia, ',');
        $campos = "";
        for ($i = 0; $i < count($valores); $i++) {
            $campos .= "?,";
        }

        $campos = trim($campos, ',');

        $resultado = $this->db->queryPrepared(
            'INSERT INTO ' ."`". $tabla ."`". ' (' . $sentencia . ') VALUES('.$campos.')',
            $valores
        );
        return $resultado;
    }
    function hardcodeInsert()
    {
        $errores = false;
        $tableGenerator = new TableGenerator();

        $mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($mysqli->connect_errno) {
            echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        if (!$mysqli->query($tableGenerator->createConsultas())){
            $errores = true;
            echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error . " -";
        }
        if (!$mysqli->query($tableGenerator->createCompanias())){
            $errores = true;
            echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error ." -";
        }
        if (!$mysqli->query($tableGenerator->createTecnicas())){
            $errores = true;
            echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error ." -";
        }
        if(!$errores){
            echo "Tablas generadas con exito -";
        }

        if (!$mysqli->query($tableGenerator->insertConsultas())){
            $errores = true;
            echo "Falló la creación de los campos la tabla: (" . $mysqli->errno . ") " . $mysqli->error ." -";
        }
        if (!$mysqli->query($tableGenerator->insertCompanias())){
            $errores = true;
            echo "Falló la creación de de los campos la tabla: (" . $mysqli->errno . ") " . $mysqli->error ." -";
        }
        if (!$mysqli->query($tableGenerator->insertTecnicas())){
            $errores = true;
            echo "Falló la creación de de los campos la tabla: (" . $mysqli->errno . ") " . $mysqli->error ." -";
        }

        if(!$errores){
            echo "Campos generadas con exito -";
        }
    }
}
