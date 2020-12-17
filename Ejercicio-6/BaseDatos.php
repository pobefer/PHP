<?php
class CustomMysqli extends \mysqli
{
    public function __construct($servername, $username, $password, $dbname, $table)
    {
        $this->createDB($servername, $username, $password, $dbname);
        $this->createTable($servername, $username, $password, $dbname, $table);
        parent::__construct($servername, $username, $password, $dbname);
    }

    public function createDB($servername, $username, $password, $dbname)
    {
        $conn = mysqli_connect($servername, $username, $password);

        if (!$conn) {
            echo 'Connected failure<br>';
        }
        echo 'Connected successfully<br>';
        $sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;

        if (mysqli_query($conn, $sql)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    public function createTable($servername, $username, $password, $dbname,$table)
    {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (mysqli_connect_error()) {
            die("Database connection failed: " .
                mysqli_connect_error());
        }

        $create_table = $table;

        $create_tbl = $conn->query($create_table);
        if ($create_tbl) {
            echo "Table has created";
        } else {
            echo "error!!";
        }

        mysqli_close($conn);
    }
    public function queryPrepared($query, array $args)
    {
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
    protected $dbname = "pruebasusabilidad";
    protected $table = "CREATE TABLE IF NOT EXISTS pruebasusabilidad (
        codigo int NOT NULL,
        nombre varchar(50),
        apellidos varchar(100),
        email varchar(70),
        telefono int,
        edad int,
        sexo varchar(20),
        nivelPericia int,
        tiempo int,
        correcto boolean,
        comentarios varchar(500),
        propuestas varchar(500),
        valoracion int,
        PRIMARY KEY (`codigo`)
    ); ";
    protected $db;



    public function __construct()
    {
        $this->db = new CustomMysqli($this->servername, $this->username, $this->password, $this->dbname, $this->table);
        //comprobamos conexión
        if ($this->db->connect_error) {
            exit("<p>ERROR de conexión:" .  $this->db->connect_error . "</p>");
        }
    }

    function findAll()
    {
        $consulta = 'SELECT * FROM pruebasusabilidad';
        $resultado = $this->db->query($consulta);

        return $resultado;
    }

    function search($valor)
    {
        $resultado = $this->db->queryPrepared(
            'SELECT * FROM pruebasusabilidad WHERE codigo = ? ',
            [
                $valor
            ]
        );
        return $resultado;
    }
    function update(
        $codigo,
        $nombre,
        $apellidos,
        $email,
        $telefono,
        $edad,
        $sexo,
        $nivelPericia,
        $tiempo,
        $correcto,
        $valoracion,
        $comentarios,
        $propuestas
    ) {
        $resultado = $this->db->queryPrepared(
            'UPDATE pruebasusabilidad set codigo=?, nombre =?, apellidos=?, email=?, telefono=?,edad=?, sexo=?, nivelPericia=?, tiempo=?, correcto=?, valoracion=?, comentarios=?, propuestas=? WHERE codigo = ? ',
            [
                $codigo,
                $nombre,
                $apellidos,
                $email,
                $telefono,
                $edad,
                $sexo,
                $nivelPericia,
                $tiempo,
                $correcto,
                $valoracion,
                $comentarios,
                $propuestas,
                $codigo
            ]
        );
        return $resultado;
    }
    function delete($campo, $valor)
    {
        $resultado = $this->db->queryPrepared(
            'DELETE FROM pruebasusabilidad WHERE ' . $campo . ' = ? ',
            [
                $valor
            ]
        );
        return $resultado;
    }
    function insert(
        $codigo,
        $nombre,
        $apellidos,
        $email,
        $telefono,
        $edad,
        $sexo,
        $nivelPericia,
        $tiempo,
        $correcto,
        $valoracion,
        $comentarios,
        $propuestas
    ) {
        $resultado = $this->db->queryPrepared(
            'INSERT INTO pruebasusabilidad (codigo, nombre, apellidos, email, telefono, edad, sexo, nivelPericia, tiempo, correcto, comentarios, propuestas,valoracion) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $codigo,
                $nombre,
                $apellidos,
                $email,
                $telefono,
                $edad,
                $sexo,
                $nivelPericia,
                $tiempo,
                $correcto,
                $comentarios,
                $propuestas,
                $valoracion
            ]
        );
        return $resultado;
    }
}
