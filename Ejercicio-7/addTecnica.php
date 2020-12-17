<?php $title = 'Anadir Tecnica'; ?>
<?php $currentPage = 'addTecnica'; ?>
<?php $currentGlobal = 'tecnicas'; ?>
<?php $css = 'estilos.css'; ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('BaseDatos.php'); ?>
<?php include('Compania.php'); ?>
<?php include('Tecnica.php'); ?>

<body>
    <?php
    $baseDatos = new DataBase();
    $respuesta = $baseDatos->findAll(
        'compania'
    );


    if (isset($_POST['a'])) {
        if (
            $_POST['codigo'] == ""
            || $_POST['nombre'] == ""
            || $_POST['precio'] == ""
            || floatval($_POST['precio']) == 0
        ) {
            echo "<p>Rellene Correctamente el formulario</p>";
        } else {
            $existe = $baseDatos->search(
                'tecnicas',
                [$_POST['codigo'], $_POST['nombre'], $_POST['compania']],
                'codigo=? and nombre =? and id_compania='
            );

            if ($row = mysqli_fetch_array($existe)) {
                echo "<p>Este campo ya existe el formulario</p>";
            } else {
                $baseDatos = new DataBase();
                $baseDatos->insert(
                    'tecnicas',
                    ['codigo', 'nombre', 'precio', 'id_compania'],
                    [$_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['compania']]
                );
                echo "<p>Sucsses</p>";
            }
        }

        //meterlo en base de datos

    }
    echo "
    <form  action='#' method='POST' class='form-insert'>
        <div class='form-title'>
            <h2>Tecnica</h2>
        </div>
        <div>
            <label for='compania'></label>
            <span><select name='compania'>
    ";

    while ($row = mysqli_fetch_array($respuesta)) {
        $compania = new Compania($row['id'], $row['nombre']);

        echo " <option value='" . $compania->id . "'>" . $compania->nombre . "</option>";
    }

    echo "
    </select></span>
    </div>

    <div class='lineaInsert'><label for='codigo'>Codigo:</label>
        <input type='text' id='codigo' name='codigo' />
    </div>
    <div class='lineaInsert'><label for='nombre'>Nombre:</label>
        <input type='text' id='nombre' name='nombre' />
    </div>
    <div class='lineaInsert'><label for='precio'>Precio:</label>
        <input type='text' id='precio' name='precio' />
    </div>
    <div class='insertSubmit'>
        <input class='inputSubmit' type='submit' name='a' value='Insertar'/>
    </div>

</form>
    ";


    ?>


</body>
<?php include('footer.php'); ?>