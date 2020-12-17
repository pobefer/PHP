<?php $title = 'Ver Tecnicas'; ?>
<?php $currentPage = 'verTecnicas'; ?>
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
    while ($row = mysqli_fetch_array($respuesta)) {
        $compania = new Compania($row['id'], $row['nombre']);
        $tecnicasCompania = $baseDatos->search(
            'tecnicas',
            [$row['id']],
            'id_compania='
        );
        while ($fila = mysqli_fetch_array($tecnicasCompania)) {
            $tecnica = new Tecnica($fila['id'], $fila['codigo'], $fila['nombre'], $fila['precio'], $compania);
            $tecnicas[] = $tecnica;
        }
        $compania->addTecnicas($tecnicas);
        $companias[] = $compania;
        unset($tecnicas);
    }
    echo "<form action='#' method='POST' class='panelButton'>";
    foreach ($companias as $c) {
        echo "<input type='submit' class='bar-item' name='" . $c->nombre . "' value='" . $c->nombre . "'/>";
    }
    echo "</form>";

    foreach ($companias as $c) {
        if (isset($_POST[$c->nombre])) {
            echo "
            <div class='wrapper'>";
            foreach ($c->tecnicas as $t) {
                echo "<p class='tecnica'>" . $t->codigo . " " . $t->nombre . " " . $t->precio . "</p>";
            }
            echo "
        </div>
        ";
        }
    }

  
    ?>


</body>
<?php include('footer.php'); ?>