<?php $title = 'Search'; ?>
<?php $currentPage = 'search'; ?>
<?php $currentGlobal = 'tableManagement'; ?>
<?php $css = 'Ejercicio6.css'; ?>
<?php include('head.php'); ?>
<?php include('Ejercicio6.php'); ?>
<?php include('BaseDatos.php'); ?>

<body>
    <?php

   
    echo
        "
        <form action='#' method='post' name='calculos'>
        <div class='inline'>
            <label for='codigo'>Codigo:</label>
            <input id='codigo' name='codigo' type='number' />
            <input type='submit' name = 'dcodigo' value='Buscar'>
        </div>
        </form>
        ";
    if (count($_POST) > 0) {
        $baseDatos = new DataBase();
        $respuesta = $baseDatos->search(
            intval($_POST["codigo"])
        );
        while ($row = mysqli_fetch_array($respuesta)) {
            echo "
            <div class='column'>
            <p>Codigo: " . $row['codigo'] . "</p>
            <p>nombre: " . $row['nombre'] . "</p>
            <p>apellidos: " . $row['apellidos'] . "</p>
            <p>email: " . $row['email'] . "</p>
            <p>sexo: " . $row['sexo'] . "</p>
            <p>edad: " . $row['edad'] . "</p>
            <p>telefono: " . $row['telefono'] . "</p>
            <p>Nivel Pericia: " . $row['nivelPericia'] . "</p>
            <p>Tiempo Testeando: " . $row['tiempo'] . "</p>
            <p>Valoracion: " . $row['valoracion'] . "</p>
            <p>Evaluacion: " . $row['correcto'] . "</p>
            <p>Comentarios: " . $row['comentarios'] . "</p>
            <p>Propuestas: " . $row['propuestas'] . "</p>
            </div>
            ";
        }
    }
    ?>
</body>
<?php include('footer.php'); ?>