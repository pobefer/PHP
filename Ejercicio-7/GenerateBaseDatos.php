<?php $title = 'GenerarBase de Datos'; ?>
<?php $currentPage = 'basedatos'; ?>
<?php $currentGlobal = 'basedatos'; ?>
<?php $css = 'estilos.css'; ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('BaseDatos.php'); ?>

<body>
    <?php
        $db = new DataBase();
        $db->hardcodeInsert();
    ?>
</body>
<?php include('footer.php'); ?>