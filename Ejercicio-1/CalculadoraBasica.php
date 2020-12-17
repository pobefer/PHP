<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora con JavaScript</title>
    <link type="text/css" href="CalculadoraBasica.css" rel="stylesheet">
</head>

<body>
    <?php
    session_name('mi_sesion');
    session_start();
    class Calculadora
    {
        public $resultadoPublico;
        public $calculo;


        public function __construct()
        {
            $this->memoria = 0;
            $this->memopriaAux = 0;
            $this->memoriaLimpia = true;
            $this->resultadoPublico = "";
            $this->calculo = $this->resultadoPublico;
        }

        public function getCalculo()
        {
            return $this->calculo;
        }

        public function getResultado()
        {
            return $this->resultadoPublico;
        }

        public function numero($boton)
        {
            $this->resultadoPublico .= $boton;
            $this->pintar();
        }

        public function mrc()
        {
            if (isset($_SESSION['memoria'])) {
                $this->resultadoPublico = $_SESSION['memoria'];
            }
            $_SESSION['contador'] ="";
            $this->pintar();
        }

        public function mNegative()
        {
            if (isset($_SESSION['memoria'])) {
                $_SESSION['memoria'] = eval('return '. $_SESSION['memoria'] . '-'. $_SESSION['contador'] .';');
            } else {
                $_SESSION['memoria'] = eval('return 0 - '.  $_SESSION['contador'] .';');
            }
        }

        public function mPositive()
        {
            if (isset($_SESSION['memoria'])) {
                $_SESSION['memoria'] = eval('return '.$_SESSION['contador'] . '+'. $_SESSION['memoria'] .';');
            } else {
                $_SESSION['memoria'] = eval('return 0 - '.  $_SESSION['contador'] .';');
            }
        }

        public function division()
        {
            $this->resultadoPublico .= "/";
            $this->pintar();
        }

        public function multiplicacion()
        {
            $this->resultadoPublico .= "*";
            $this->pintar();
        }

        public function suma()
        {
            $this->resultadoPublico .= "+";
            $this->pintar();
        }

        public function resta()
        {
            $this->resultadoPublico .= "-";
            $this->pintar();
        }

        public function reset()
        {
            $this->resultadoPublico = "";
            $_SESSION['contador'] ="";
            $this->pintar();
        }

        public function punto()
        {
            if (isset($_SESSION['contador'])) {
                $_SESSION['contador'] .= ".";
            }
            $this->pintar();
        }

        public function pintar()
        {
            $this->calculo = $this->resultadoPublico;
        }

        public function calcular()
        {
            try {
                $this->resultadoPublico  = eval('return '.$_SESSION['contador'] .';');
                $_SESSION['contador'] = "";
                $this->pintar();
            } catch (ParseError $e) {
                $this->resultadoPublico = "Error";
                $_SESSION['contador'] = "";
                $this->pintar();
            }
            
        }
    }

    $miCalculadora = new Calculadora();
    $registro = $miCalculadora->calculo;
    $calculo = "";

    echo "<h2>Calculadora básica</h2>";
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
                <button type='submit' id='mrc' name='mrc' class='gris'>mrc</button>
                <button type='submit' id='mNegative' name='mNegative' class='gris'>m-</button>
                <button type='submit' id='mPositive' name='mPositive' class='gris'>m+</button>
                <button type='submit' id='division' name='division' class='operacion'>/</button>
            </div>
            <div class='fila'>
                <button type='submit' id='siete' name='siete'>7</button>
                <button type='submit' id='ocho' name='ocho'>8</button>
                <button type='submit' id='nueve' name='nueve'>9</button>
                <button type='submit' id='multiplicacion' class='operacion'  name='multiplicacion'>*</button>
            </div>
            <div class='fila'>
                <button type='submit' id='cuatro' name='cuatro'>4</button>
                <button type='submit' id='cinco' name='cinco'>5</button>
                <button type='submit' id='seis' name='seis'>6</button>
                <button type='submit' id='resta' class='operacion' name='resta'>-</button>
            </div>
            <div class='fila'>
                <button type='submit' id='uno' name='uno'>1</button>
                <button type='submit' id='dos' name='dos'>2</button>
                <button type='submit' id='tres' name='tres'>3</button>
                <button type='submit' id='suma' name='suma' class='operacion'>+</button>
            </div>
            <div class='fila'>
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