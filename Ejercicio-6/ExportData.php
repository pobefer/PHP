<?php $title = 'Export Data'; ?>
<?php $currentPage = 'exportData'; ?>
<?php $currentGlobal = 'import'; ?>
<?php $css = 'Ejercicio6.css'; ?>
<?php include('head.php'); ?>
<?php include('Ejercicio6.php'); ?>
<?php include('BaseDatos.php'); ?>

<body>
    <?php

    $baseDatos = new DataBase();
    $query = $baseDatos->findAll();

    if ($query->num_rows > 0) {
        $delimiter = ",";
        $filename = "pruebasUsabilidad.csv";
        
        $archivo_csv = fopen($filename, 'w');
       
        if ($archivo_csv) {
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary"); 
            header("Content-disposition: attachment; filename=\"pruebasUsabilidad.csv\""); 
            $fields = array(
                'codigo', 'nombre', 'apellidos',
                'email', 'telefono',
                'edad', 'sexo',
                'nivelPericia', 'tiempo',
                'correcto', 'comentarios',
                'propuestas', 'valoracion'
            );
            $outputBuffer = fopen("php://output", 'w');
            fputcsv($outputBuffer, $fields);
            
            while ($row = $query->fetch_assoc()) {
                $sexo = ($row['sexo'] == 'M') ? 'Hombre' : 'Mujer';
                $correcto = ($row['correcto'] == 0) ? 'No Correcto' : 'Correcto';
                $lineData = array(
                    $row['codigo'],
                    $row['nombre'],
                    $row['apellidos'],
                    $row['email'],
                    $row['edad'],
                    $sexo,
                    $row['nivelPericia'],
                    $row['tiempo'],
                    $correcto,
                    $row['comentarios'],
                    $row['propuestas'],
                    $row['telefono'],
                    $row['valoracion']
                );
                fputcsv($outputBuffer, $lineData);
            }

            fclose($outputBuffer);
        } else {

            echo "El archivo no existe o no se pudo crear";
        }
    }

    ?>
</body>
<?php include('footer.php'); ?>