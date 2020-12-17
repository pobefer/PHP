<?php $title = 'Create Data Base'; ?>
<?php $currentPage = 'createDataBase'; ?>
<?php $currentGlobal = 'dbManagement'; ?>
<?php $css = 'Ejercicio6.css'; ?>
<?php include('head.php'); ?>
<?php include('Ejercicio6.php'); ?>
<?php include('BaseDatos.php'); ?>
<body>
<?php
    $myDB = new DataBase();
?>
</body>
<?php include('footer.php'); ?>