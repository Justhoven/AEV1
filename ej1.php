<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    
    <?php
        //INTRODUCE AQUÍ TU CÓDIGO
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $paquetes = $_POST["paquetes"];
    $tamano = $_POST["tamano"];
    $peso = $_POST["peso"];
    $zona = $_POST["zona"];
    $transporte = $_POST["transporte"];
    $precioT = 0;
    $precioTP = 0;
    $precioTPZ = 0;
    $precioTOTAL = 0;
}

    if ($tamano <= 0.5){
        $precioT = $tamano * 50;
    } elseif ($tamano <= 1){
        $precioT = $tamano * 75;
    } else {
        $precioT = $tamano * 100;
    }

    if ($peso < 5){
        $precioTP = $precioT;
    } elseif ($peso <10){
        $precioTP = $precioT * 1.25;
    } elseif ($peso <15){
        $precioTP = $precioT * 1.5;
    } else {
        echo "El paquete es demasiado pesado y no será enviado.";
    }

    if ($zona == "Península"){
        $precioTPZ = $precioTP;
    } elseif ($zona == "Baleares"){
        if ($transporte == "marítimo"){
            $precioTPZ = $precioTP;
        } elseif ($transporte == "aéreo"){
            $precioTPZ = $precioTP * 1.1;
        }
        
    } elseif ($zona == "Canarias"){
        $precioTPZ = $precioTP * 1.1;
    }

    $precioTOTAL = $precioTPZ * $paquetes;
    echo "El precio total por su pedido será de $precioTOTAL euros.";

    ?>
    
    <form method="POST" action="">
        <label for="paquetes">PAQUETES:</label>
        <input type="number" id="paquetes" name="paquetes" value="">
        <label for="tamano">TAMAÑO:</label>
        <input type="number" id="tamano" name="tamano" value="">
        <label for="peso">PESO:</label>
        <input type="number" id="peso" name="peso" value="">
        <label for="zona">ZONA:</label>
        <input id="zona" name="zona" value="">
        <label for="transporte">TRANSPORTE:</label>
        <input id="transporte" name="transporte" value="">
        <input type="submit" value="Calcular">
    </form>
</body>
</html>