<?php $title = 'Ver Companias'; ?>
<?php $currentPage = 'verCompanias'; ?>
<?php $currentGlobal = 'companias'; ?>
<?php $css = 'estilos.css'; ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('BaseDatos.php'); ?>

<body>
    <?php
    $baseDatos = new DataBase();
    $respuesta = $baseDatos->findAll(
        'compania'
    );
    while ($row = mysqli_fetch_array($respuesta)) {
        echo "
     <div class='column'>
     <p>" . $row['nombre'] . "</p>
     </div>
     ";
    }

    ?>
</body>
<?php include('footer.php'); ?>