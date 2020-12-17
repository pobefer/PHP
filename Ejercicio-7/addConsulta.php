<?php $title = 'Anadir Consulta'; ?>
<?php $currentPage = 'addConsulta'; ?>
<?php $currentGlobal = 'consultas'; ?>
<?php $css = 'estilos.css'; ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('BaseDatos.php'); ?>
<?php include('Tecnica.php'); ?>

<body>
    <?php
    $baseDatos = new DataBase();

    if (isset($_POST['submit'])) {
        if ($_POST['nombre'] == "") {
            echo "<p>Rellenecorrectamente el formulario</p>";
        } else {
            $existe = $baseDatos->search(
                'consulta',
                [$_POST['nombre']],
                'nombre ='
            );

            if ($row = mysqli_fetch_array($existe)) {
                echo "<p>Este campo ya existe el formulario</p>";
            } else {
                $baseDatos = new DataBase();
                $baseDatos->insert(
                    'consulta',
                    ['nombre'],
                    [$_POST['nombre']],
                    '?'
                );
                echo "<p>Sucsses</p>";
            }
        }
    }
    echo "
    <form action='#' method='post' name='formulario'>
        <label for='codigo'>Nombre:</label>
        <input type='text' name='nombre'/>
        <input type='submit' name='submit'/>
    </form>
    ";


    ?>
</body>
<?php include('footer.php'); ?>