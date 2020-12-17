<?php $title = 'Delete'; ?>
<?php $currentPage = 'delete'; ?>
<?php $currentGlobal = 'tableManagement'; ?>
<?php $css = 'Ejercicio6.css'; ?>
<?php include('head.php'); ?>
<?php include('Ejercicio6.php'); ?>
<?php include('BaseDatos.php'); ?>

<body>

    <?php


    if (count($_POST) > 0) {
        $baseDatos = new DataBase();
        if(isset($_POST['dcodigo'])) $baseDatos->delete("codigo", intval($_POST['codigo']));
        if(isset($_POST['dnombre'])) $baseDatos->delete("nombre", $_POST['nombre']);
        if(isset($_POST['dapellidos'])) $baseDatos->delete("apellidos", $_POST['apellidos']);
        if(isset($_POST['demail'])) $baseDatos->delete("email", $_POST['email']);
        if(isset($_POST['dtelefono'])) $baseDatos->delete("telefono", intval($_POST['telefono']));
        if(isset($_POST['dedad'])) $baseDatos->delete("edad", intval($_POST['edad']));
        if(isset($_POST['dsexo'])) $baseDatos->delete("sexo", $_POST['sexo']);
        if(isset($_POST['dnivelPericia'])) $baseDatos->delete("nivelPericia", intval($_POST['nivelPericia']));
        if(isset($_POST['dtiempo'])) $baseDatos->delete("tiempo", intval($_POST['tiempo']));
        if(isset($_POST['dcorrecto'])) $baseDatos->delete("correcto", intval($_POST['correcto']));
        if(isset($_POST['dvaloracion'])) $baseDatos->delete("valoracion", intval($_POST['valoracion']));
        if(isset($_POST['dcomentarios'])) $baseDatos->delete("comentarios", $_POST['comentarios']);
        if(isset($_POST['dpropuestas'])) $baseDatos->delete("propuestas", $_POST['propuestas']);
        
    }

    echo
        "
        <form action='#' method='post' name='calculos'>
        <div>
            <h3>Datos generales</h3>
            <div class='inline'>
                <label for='codigo'>Codigo:</label>
                <input id='codigo' name='codigo' type='number' />
                <input type='submit' name = 'dcodigo' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='nombre'>Nombre:</label>
                <input id='nombre' name='nombre' type='text' />
                <input type='submit' name = 'dnombre' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='apellidos'>Apellidos:</label>
                <input id='apellidos' name='apellidos' type='text' />
                <input type='submit' name = 'dapellidos' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='email'>Email:</label>
                <input id='email' name='email' type='text' />
                <input type='submit' name = 'demail' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='telefono'>Telefono:</label>
                <input id='telefono' name='telefono' type='number' />
                <input type='submit' name = 'dtelefono' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='edad'>Edad:</label>
                <input id='edad' name='edad' type='number' />
                <input type='submit' name = 'dedad' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='sexo'>Sexo:</label>
                <input id='sexo' name='sexo' type='text' />
                <input type='submit' name = 'dsexo' value='Eliminar'>
            </div>
        </div>
        <div>
            <h3>Datos especificos</h3>
            <div class='inline'>
                <label for='nivelPericia'>Nivel Pericia:</label>
                <input id='nivelPericia' name='nivelPericia' type='number' />
                <input type='submit' name = 'dnivelPericia' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='tiempo'>Tiempo:</label>
                <input id='tiempo' name='tiempo' type='number' />
                <input type='submit' name = 'dtiempo' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='correcto'>Evaluacion:</label>
                <input id='correcto' name='correcto' type='number' />
                <input type='submit' name = 'dcorrecto' value='Eliminar'>
            </div>
            <div class='inline'>
                <label for='valoracion'>Valoracion:</label>
                <input id='valoracion' name='valoracion' type='number' />
                <input type='submit' name = 'dvaloracion' value='Eliminar'>
            </div>
            <div class='column'>
                <label for='comentarios'>Comentarios:</label>
                <textarea id='comentarios' name='comentarios' rows='10' cols='30'></textarea>
                <input type='submit' name = 'dcomentarios' value='Eliminar'>
            </div>
            <div class='column'>
                <label for='propuestas'>Propuestas:</label>
                <textarea id='propuestas' name='propuestas' rows='10' cols='30'></textarea>
                <input type='submit' name = 'dpropuestas' value='Eliminar'>
            </div>
        </div>
        <div>
            <input type='submit' value='Calcular'>
        </div>
    </form>
        ";
    ?>
</body>
<?php include('footer.php'); ?>