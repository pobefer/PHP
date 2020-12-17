<?php $title = 'Insert'; ?>
<?php $currentPage = 'insert'; ?>
<?php $currentGlobal = 'tableManagement'; ?>
<?php $css = 'Ejercicio6.css'; ?>
<?php include('head.php'); ?>
<?php include('Ejercicio6.php'); ?>
<?php include('BaseDatos.php'); ?>

<body>

    <?php


    if (count($_POST) > 0) {
        $baseDatos = new DataBase();
        $baseDatos->insert(
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

    echo "<div class='wrapper'>
            <div class='inner'>
                <form action='#' method='post' name='calculos'>
                    <div>
                        <h3>Datos generales</h3>
                        <div class='form-group'>
                            <div class='form-wrapper'>
                                <label for='codigo'>Codigo:</label>
                                <input id='codigo' name='codigo' type='number' class='form-control' />
                            </div>
                            <div class='form-wrapper'>
                                <label for='nombre'>Nombre:</label>
                                <input id='nombre' name='nombre' type='text' class='form-control' />
                            </div>
                            <div class='form-wrapper'>
                                <label for='apellidos'>Apellidos:</label>
                                <input id='apellidos' name='apellidos' type='text' class='form-control' />
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='form-group'>
                                <div class='form-wrapper'>
                                    <label for='email'>Email:</label>
                                    <input id='email' name='email' type='text' class='form-control' />
                                </div>
                                <div class='form-wrapper'>
                                    <label for='telefono'>Telefono:</label>
                                    <input id='telefono' name='telefono' type='number' class='form-control' />
                                </div>
                                <div class='form-wrapper'>
                                    <label for='edad'>Edad:</label>
                                    <input id='edad' name='edad' type='number' class='form-control' />
                                </div>
                                <div class='form-wrapper'>
                                    <label for='sexo'>Sexo:</label>
                                    <input id='sexo' name='sexo' type='text' class='form-control' />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3>Datos especificos</h3>
                            <div class='form-group'>
                                <div class='form-wrapper'>
                                    <label for='nivelPericia'>Nivel Pericia:</label>
                                    <input id='nivelPericia' name='nivelPericia' type='number' class='form-control' />
                                </div>
                                <div class='form-wrapper'>
                                    <label for='tiempo'>Tiempo:</label>
                                    <input id='tiempo' name='tiempo' type='number' class='form-control' />
                                </div>
                                <div class='form-wrapper'>
                                    <label for='correcto'>Evaluacion:</label>
                                    <input id='correcto' name='correcto' type='number' class='form-control' />
                                </div>
                                <div class='form-wrapper'>
                                    <label for='valoracion'>Valoracion:</label>
                                    <input id='valoracion' name='valoracion' type='number' class='form-control' />
                                </div>
                            </div>
                            <div class='column'>
                                <label for='comentarios'>Comentarios:</label>
                                <textarea id='comentarios' name='comentarios' rows='10' cols='30'></textarea>
                            </div>
                            <div class='column'>
                                <label for='propuestas'>Propuestas:</label>
                                <textarea id='propuestas' name='propuestas' rows='10' cols='30'></textarea>
                            </div>
                        </div>
                        <div>
                            <input type='submit' value='Calcular'>
                        </div>
                </form>
            </div>
        </div>";
    ?>


</body>
<?php include('footer.php'); ?>