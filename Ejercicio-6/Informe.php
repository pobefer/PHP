<?php $title = 'Informe'; ?>
<?php $currentPage = 'informe'; ?>
<?php $currentGlobal = 'informe'; ?>
<?php $css = 'Ejercicio6.css'; ?>
<?php include('head.php'); ?>
<?php include('Ejercicio6.php'); ?>
<?php include('BaseDatos.php'); ?>

<body>
    <?php

    class Informe
    {
        public $edad;
        public $hombres;
        public $mujeres;
        public $pericia;
        public $tiempo;
        public $evaluacion;
        public $puntuacion;
        public $contador;

        public function __construct()
        {
            $this->edad=0;
            $this->hombres=0;
            $this->mujeres=0;
            $this->pericia=0;
            $this->tiempo=0;
            $this->evaluacion=0;
            $this->puntuacion=0;
            $this->contador=0;
        }

        function sexo($sexo)
        {
            if ($sexo == 'M') {
                $this->hombres = $this->hombres + 1;
            }
            if ($sexo == 'F') {
                $this->mujeres = $this->mujeres + 1;
            }
        }
        function edad($edad)
        {
            $this->edad = $this->edad + $edad;
        }

        function pericia($pericia)
        {
            $this->pericia = $this->pericia + $pericia;
        }

        function tiempo($tiempo)
        {
            $this->tiempo = $this->tiempo + $tiempo;
        }

        function evaluacion($evaluacion)
        {
            $this->evaluacion = $this->evaluacion + $evaluacion;
        }

        function puntuacion($puntuacion)
        {
            $this->contador = $this->contador + 1;
            $this->puntuacion = $this->puntuacion + $puntuacion;
        }

        function calcular(){
            $aux = $this->hombres;
            $this->hombres = ($this->hombres/($this->hombres + $this->mujeres))*100;
            $this->mujeres = ($this->mujeres/($aux + $this->mujeres))*100;
            $this->puntuacion =  $this->puntuacion/ $this->contador;
            $this->evaluacion = ($this->evaluacion/ $this->contador)*100;
            $this->tiempo = $this->tiempo/ $this->contador;
            $this->pericia = $this->pericia/ $this->contador;
            $this->edad = $this->edad / $this->contador;
        }
    }

    $baseDatos = new DataBase();
    $respuesta = $baseDatos->findAll();
    $informe = new Informe();
    while ($row = mysqli_fetch_array($respuesta)) {
        $informe->sexo($row['sexo']);
        $informe->edad(intval($row['edad']));
        $informe->pericia(intval($row['nivelPericia']));
        $informe->tiempo(intval($row['tiempo']));
        $informe->evaluacion(intval($row['correcto']));
        $informe->puntuacion(intval($row['valoracion']));
    }
    $informe->calcular();

    echo 
    "
    <div>
        <p>Edad media de los usuarios ->  ". $informe->edad ." </p>
        <p>% Mujeres ->  ". $informe->mujeres ." </p>
        <p>% Hombres ->  ". $informe->hombres ." </p>
        <p>Valor medio del nivel o pericia informática de los usuarios ->  ". $informe->pericia ." </p>
        <p>Tiempo medio para la tarea ->  ". $informe->tiempo ." </p>
        <p>Porcentaje de usuarios que han realizado la tarea correctamente -> " . $informe->evaluacion ."</p>
        <p>Valor medio de la puntuación de los usuarios sobre la aplicación ->  ". $informe->puntuacion ." </p>
    </div>
    ";

    ?>

    
</body>
<?php include('footer.php'); ?>