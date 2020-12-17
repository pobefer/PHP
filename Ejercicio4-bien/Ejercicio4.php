<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora con JavaScript</title>
    <link type="text/css" href="Ejercicio6.css" rel="stylesheet">
    
</head>

<body>

<?php
$params = array(
    'x-rapidapi-key' => '37ae8490c2mshb30f4931f70e872p163836jsn310fb764c9eb',
	'x-rapidapi-host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com'
);
$encoded_params = array();
foreach ($params as $k => $v){

    $encoded_params[] = urlencode($k).'='.urlencode($v);
}
#
# llamar a la API y decodificar la respuesta
#
$url = "https://apidojo-yahoo-finance-v1.p.rapidapi.com/auto-complete/?".implode('&', $encoded_params);
$rsp = file_get_contents($url);
$rsp_obj = unserialize($rsp);
echo $rsp_obj->getBody();
?>
</body>

<footer>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" /></a>
    </footer>
</body>
</html>