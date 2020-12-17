<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora con JavaScript</title>
    <link type="text/css" href="Ejercicio6.css" rel="stylesheet">
</head>

<body>
    <h1>US MARKET</h1>
<?php

$curl = curl_init();
$f = tmpfile();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-summary?region=US",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_STDERR  => $f,
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
        "x-rapidapi-key: 37ae8490c2mshb30f4931f70e872p163836jsn310fb764c9eb"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $json = json_decode($response, true);
    echo "<table  class='contendor'>";
    echo "<tr class='cabecera'>";
    echo "<th class='cCabecera'>Market</th>";
    echo "<th class='cCabecera'>Exchange Name</th>";
    echo "<th class='cCabecera'>%</th>";
    echo "<th class='cCabecera'>CLosed AT</th>";
    echo "</tr>";
    foreach ($json['marketSummaryResponse']['result'] as $value) {
        echo "<tr class='linea'>";
        echo "<td class='cLinea'>".$value['market']."</td>";
        echo "<td class='cLinea'>".$value['fullExchangeName']."</td>";
        echo "<td class='cLinea'>".$value['regularMarketChangePercent']['fmt']."</td>";
        echo "<td class='cLinea'>".$value['regularMarketPreviousClose']['fmt']."</td>";
        echo "</tr>";
    }
    echo "</table >";
    
}
?>

<footer>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" /></a>
    </footer>
</body>

</html>