<?php $title = 'update'; ?>
<?php $currentPage = 'update'; ?>
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
            <input type='submit' name = 'search' value='Buscar'>
        </div>
        </form>
        ";
    if (count($_POST) > 0) {
        $baseDatos = new DataBase();
        if (isset($_POST['update'])) {
            $baseDatos->update(
                $_POST["codigo"],
                $_POST["nombre"],
                $_POST["apellidos"],
                $_POST["email"],
                $_POST["telefono"],
                $_POST["edad"],
                $_POST["sexo"],
                $_POST["nivelPericia"],
                $_POST["tiempo"],
                $_POST["correcto"],
                $_POST["valoracion"],
                $_POST["comentarios"],
                $_POST["propuestas"]
            );
        }


        if (isset($_POST['search'])) {

            $respuesta = $baseDatos->search(
                intval($_POST["codigo"])
            );
            while ($row = mysqli_fetch_array($respuesta)) {

                echo
                    "
        <form action='#' method='post' name='calculos'>
        <div>
            <h3>Datos generales</h3>
            <div class='inline'>
                <label for='codigo'>Codigo:</label>
                <input id='codigo' readonly name='codigo' type='number' value=". $row['codigo'] ." />
                <label for='nombre'>Nombre:</label>
                <input id='nombre' name='nombre' type='text' value=".$row['nombre']." />
                <label for='apellidos'>Apellidos:</label>
                <input id='apellidos' name='apellidos' type='text' value=" . $row['apellidos'] . " />
            </div>
            <div class='inline'>
                <label for='email'>Email:</label>
                <input id='email' name='email' type='text' value=" . $row['email'] . " />
                <label for='telefono'>Telefono:</label>
                <input id='telefono' name='telefono' type='number' value=" . $row['telefono'] . " />
                <label for='edad'>Edad:</label>
                <input id='edad' name='edad' type='number' value=" . $row['edad'] . " />
                <label for='sexo'>Sexo:</label>
                <input id='sexo' name='sexo' type='text' value=" . $row['sexo'] . " />
            </div>
        </div>
        <div>
            <h3>Datos especificos</h3>
            <div class='inline'>
                <label for='nivelPericia'>Nivel Pericia:</label>
                <input id='nivelPericia' name='nivelPericia' type='number' value=" . $row['nivelPericia'] . " />
                <label for='tiempo'>Tiempo:</label>
                <input id='tiempo' name='tiempo' type='number' value=" . $row['tiempo'] . " />
                <label for='correcto'>Evaluacion:</label>
                <input id='correcto' name='correcto' type='number' value=" . $row['correcto'] . " />
                <label for='valoracion'>Valoracion:</label>
                <input id='valoracion' name='valoracion' type='number' value=" . $row['valoracion'] . " />
            </div>
            <div class='column'>
                <label for='comentarios'>Comentarios:</label>
                <textarea id='comentarios' name='comentarios' rows='10' cols='30' placeholder=". $row['comentarios']." ></textarea>
            </div>
            <div class='column'>
                <label for='propuestas'>Propuestas:</label>
                <textarea id='propuestas' name='propuestas' rows='10' cols='30' placeholder=" . $row['propuestas'] . " ></textarea>
            </div>
        </div>
        <div>
            <input type='submit' value='Calcular' name = 'update'>
        </div>
    </form>
        ";
            }
        }
    }
    ?>
</body>
<?php include('footer.php'); ?>