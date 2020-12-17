<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora con JavaScript</title>
    <link type="text/css" href="CalculadoraCientifica2.css" rel="stylesheet">
</head>

<body>
    <?php
    include('Calculadora.php');
    session_name('calculadoraAvanzada');
    session_start();

    $miCalculadora = new CalculadoraAvanzada();
    $registro = $miCalculadora->calculo;
    $calculo = "";

    echo "<h2>Calculadora Cientifica</h2>";
    echo " <div class='calculadora'>";
    echo "<div>";


    if (isset($_POST["mrc"])) {
        $miCalculadora->mrc();
    }
    if (isset($_POST["mNegative"])) {
        $miCalculadora->mNegative();
    }
    if (isset($_POST["mPositive"])) {
        $miCalculadora->mPositive();
    }
    if (isset($_POST["division"])) {
        $miCalculadora->division();
    }
    if (isset($_POST["siete"])) {
        $miCalculadora->numero(7);
    }
    if (isset($_POST["ocho"])) {
        $miCalculadora->numero(8);
    }
    if (isset($_POST["nueve"])) {
        $miCalculadora->numero(9);
    }
    if (isset($_POST["multiplicacion"])) {
        $miCalculadora->multiplicacion();
    }
    if (isset($_POST["cuatro"])) {
        $miCalculadora->numero(4);
    }
    if (isset($_POST["cinco"])) {
        $miCalculadora->numero(5);
    }
    if (isset($_POST["seis"])) {
        $miCalculadora->numero(6);
    }
    if (isset($_POST["resta"])) {
        $miCalculadora->resta();
    }
    if (isset($_POST["uno"])) {
        $miCalculadora->numero(1);
    }
    if (isset($_POST["dos"])) {
        $miCalculadora->numero(2);
    }
    if (isset($_POST["tres"])) {
        $miCalculadora->numero(3);
    }
    if (isset($_POST["suma"])) {
        $miCalculadora->suma();
    }
    if (isset($_POST["cero"])) {
        $miCalculadora->numero(0);
    }
    if (isset($_POST["punto"])) {
        $miCalculadora->punto();
    }
    if (isset($_POST["reset"])) {
        $miCalculadora->reset();
    }
    if (isset($_POST["calcular"])) {
        $miCalculadora->calcular();
    }
    if (isset($_POST["sqrt"])) {
        $miCalculadora->sqrt();
    }
    if (isset($_POST["exponencial"])) {
        $miCalculadora->exponencial();
    }
    if (isset($_POST["sin"])) {
        $miCalculadora->sin();
    }
    if (isset($_POST["cos"])) {
        $miCalculadora->cos();
    }
    if (isset($_POST["tan"])) {
        $miCalculadora->tan();
    }
    if (isset($_POST["factorial"])) {
        $miCalculadora->factorial();
    }
    if (isset($_POST["exp10"])) {
        $miCalculadora->exp10();
    }
    if (isset($_POST["log"])) {
        $miCalculadora->log();
    }
    if (isset($_POST["exp"])) {
        $miCalculadora->exp();
    }
    if (isset($_POST["mod"])) {
        $miCalculadora->mod();
    }
    if (isset($_POST["signo"])) {
        $miCalculadora->signo();
    }
    if (isset($_POST["pi"])) {
        $miCalculadora->pi();
    }
    if (isset($_POST["e"])) {
        $miCalculadora->e();
    }
    if (isset($_POST["pA"])) {
        $miCalculadora->pA();
    }
    if (isset($_POST["pC"])) {
        $miCalculadora->pC();
    }

    $calculo = $miCalculadora->getCalculo();
    if (isset($_SESSION['contador'])) {
        $_SESSION['contador'] .= $calculo;
    } else {
        $_SESSION['contador'] = $calculo;
    }
    $registro =  $_SESSION['contador'];

    echo "<div class='cajon'><label for='resultado'>Resultado</label><input id='resultado' readonly placeholder='" . $registro . "'></div>";


    echo "</div>";
    echo "
    <form action='#' method='POST'>
    <div class='fila'>
        <button type='submit' id='sqrt' name='sqrt' class='operacion'>sqrt</button>
        <button type='submit' id='exponencial' name='exponencial' class='operacion'>x*</button>
        <button type='submit' id='sin' name='sin' class='operacion'>sin</button>
        <button type='submit' id='cos' name='cos' class='operacion'>cos</button>
        <button type='submit' id='tan' name='tan' class='operacion'>tan</button>
    </div>
    <div class='fila'>
        <button type='submit' id='factorial' name='factorial' class='operacion'>n!</button>
        <button type='submit' id='exp10' name='exp10' class='operacion'>10*</button>
        <button type='submit' id='log' name='log' class='operacion'>log</button>
        <button type='submit' id='exp' name='exp' class='operacion'>Exp</button>
        <button type='submit' id='mod' name='mod' class='operacion'>Mod</button>
    </div>
    <div class='fila'>
        <button type='submit' id='signo' name='signo' class='operacion'>+-</button>
        <button type='submit' id='mrc' name='mrc' class='gris'>mrc</button>
        <button type='submit' id='mNegative' name='mNegative' class='gris'>m-</button>
        <button type='submit' id='mPositive' name='mPositive' class='gris'>m+</button>
        <button type='submit' id='division' name='division' class='operacion'>/</button>
    </div>
    <div class='fila'>
        <button type='submit' id='pi' name='pi' class='gris'>pi</button>
        <button type='submit' id='siete' name='siete'>7</button>
        <button type='submit' id='ocho' name='ocho'>8</button>
        <button type='submit' id='nueve' name='nueve'>9</button>
        <button type='submit' id='multiplicacion' class='operacion' name='multiplicacion'>*</button>
    </div>
    <div class='fila'>
        <button type='submit' id='e' name='e' class='gris'>e</button>
        <button type='submit' id='cuatro' name='cuatro'>4</button>
        <button type='submit' id='cinco' name='cinco'>5</button>
        <button type='submit' id='seis' name='seis'>6</button>
        <button type='submit' id='resta' class='operacion' name='resta'>-</button>
    </div>
    <div class='fila'>
        <button type='submit' id='pA' name='pA' class='gris'>(</button>
        <button type='submit' id='uno' name='uno'>1</button>
        <button type='submit' id='dos' name='dos'>2</button>
        <button type='submit' id='tres' name='tres'>3</button>
        <button type='submit' id='suma' name='suma' class='operacion'>+</button>
    </div>
    <div class='fila'>
        <button type='submit' id='pC' name='pC' class='gris'>)</button>
        <button type='submit' id='cero' name='cero'>0</button>
        <button type='submit' id='punto' name='punto'>.</button>
        <button type='submit' id='reset' name='reset'>C</button>
        <button type='submit' id='calcular' name='calcular'>=</button>
    </div>
</form>
    ";
    echo "</div>";
    ?>
   
    <footer>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" /></a>
    </footer>
</body>

</html>