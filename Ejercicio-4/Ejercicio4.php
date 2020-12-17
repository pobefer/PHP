<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora con JavaScript</title>
    <link type="text/css" href="Ejercicio6.css" rel="stylesheet">
    
</head>

<body>
    <main>
        <h1>Calculadora Coordenadas</h1>
        <h2>Datos Entrada</h2>
        <?php
        class Calculadora
        {
            protected $lat1;
            protected $lat2;
            protected $lon1;
            protected $lon2;
            protected $XYControl;
            protected $MillesControl;
            protected $distanciaKms;
            protected $distanciaMilles;
            public $MensajedistanciaKms;
            public $MensajedistanciaMillas;


            public function __construct($lat1, $lat2, $lon1, $lon2)
            {
                $this->XYControl = 111.30;
                $this->MillesControl = 1.609;
                $this->lat1 = $lat1;
                $this->lat2 = $lat2;
                $this->lon1 = $lon1;
                $this->lon2 = $lon2;
            }

            public function obtenerDistancia(){
                $distanciaY =  pow(($this->lat2-$this->lat1)*$this->XYControl, 2);
                $distanciaX  =  pow(($this->lon2-$this->lon1)*$this->XYControl, 2);
                $this->distanciaKms = sqrt($distanciaX+$distanciaY);
                $this->distanciaMilles= $this->distanciaKms / $this->MillesControl;
                $this->obtenerMensaje();
                
            }

            public function obtenerMensaje()
            {
                $this->MensajedistanciaKms =  "<input id='kms' type='text' value='". $this->distanciaKms ."'/>";
                $this->MensajedistanciaMillas =  "<input id='millas' type='text'  value='". $this->distanciaMilles ."'/>";
            }
        }

        $calculadora = new Calculadora(0,0,0,0);
        
        if (count($_POST)>0) {
            $calculadora = new Calculadora($_POST["lat1"],$_POST["lat2"],$_POST["lon1"],$_POST["lon2"]);
            $calculadora->obtenerDistancia();
        }
        echo "
        <form action='#' method='post' name='calculos'>
            <div class='point'>
                <h3>Origen</h3>
                <div class='inline'>
                    <label for='lat1'>Latitud</label>
                    <input id='lat1' name='lat1' type='text' />
                    <label for='lon1'>Longitud</label>
                    <input id='lon1' name='lon1' type='text' />
                </div>
            </div>
            <div class='point'>
                <h3>Destino</h3>
                <div class='inline'>
                    <label for='lat2'>Latitud</label>
                    <input id='lat2' name='lat2' type='text' />
                    <label for='lon2'>Longitud</label>
                    <input id='lon2' name='lon2' type='text' />
                </div>
            </div>
            <div>
            <label for='resultado'></label><input type='submit'value='Calcular'>
            </div>
        </form>
        ";
       
        echo "
        <h2>Datos Entrada</h2>
        <section class='result'>
            <h3>Resultado</h3>
            <div class='inline'>
                <label for='kms'>Distancia</label>
                ". $calculadora->MensajedistanciaKms ."
                <label>Kilometros</label>
            </div>
            <div class='inline'>
                <label for='millas'>Distancia</label>
                ". $calculadora->MensajedistanciaMillas ."
                <label>Millas</label>
            </div>
        </section>
        ";
        ?>
    </main>
    <footer>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" /></a>
    </footer>
</body>
</html>