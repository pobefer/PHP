<?php $title = 'Load'; ?>
<?php $currentPage = 'loadData'; ?>
<?php $currentGlobal = 'import'; ?>
<?php $css = 'Ejercicio6.css'; ?>
<?php include('head.php'); ?>
<?php include('Ejercicio6.php'); ?>
<?php include('BaseDatos.php'); ?>

<body>
    <?php
    $baseDatos = new DataBase();

    if (isset($_POST['import_data'])) {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $csv_file = fopen($_FILES['file']['tmp_name'], 'r');
                while (($emp_record = fgetcsv($csv_file)) !== FALSE) {
                    $resultset = $baseDatos->search(intval($emp_record[0])) or die("database error:" . mysqli_error($conn));
                    if (mysqli_num_rows($resultset)) {
                        $baseDatos->update(
                            $emp_record[0],
                            $emp_record[1],
                            $emp_record[2],
                            $emp_record[3],
                            $emp_record[4],
                            $emp_record[5],
                            $emp_record[6],
                            $emp_record[7],
                            $emp_record[8],
                            $emp_record[9],
                            $emp_record[10],
                            $emp_record[11],
                            $emp_record[12]
                        );
                    } else {
                        $baseDatos->insert(
                            $emp_record[0],
                            $emp_record[1],
                            $emp_record[2],
                            $emp_record[3],
                            $emp_record[4],
                            $emp_record[5],
                            $emp_record[6],
                            $emp_record[7],
                            $emp_record[8],
                            $emp_record[9],
                            $emp_record[10],
                            $emp_record[11],
                            $emp_record[12]
                        );
                    }
                }
                fclose($csv_file);
                $import_status = '?import_status=success';
            } else {
                $import_status = '?import_status=error';
            }
        } else {
            $import_status = '?import_status=invalid_file';
        }
    }

    echo"
    <div>
        <form action='#' method='post' enctype='multipart/form-data' id='import_form'>
            <div>
                <input type='file' name='file' />
            </div>
            <div>
                <input type='submit' name='import_data' value='IMPORT'>
            </div>
        </form>
    </div>
    ";
    ?>
    
</body>
<?php include('footer.php'); ?>