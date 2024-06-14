<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'vars.php';

# Verificar si vienen los parametros requeridos
if (empty($_POST["ID"])) {
    http_response_code(400);
    exit("Falta ID"); # Terminar el script definitivamente
}

if (empty($_POST["MARCA"])) {
    http_response_code(400);
    exit("Falta MARCA"); # Terminar el script definitivamente
}

if (empty($_POST["TIPO DE EQUIPO"])) {
    http_response_code(400);
    exit("Falta TIPO"); # Terminar el script definitivamente
}

if (empty($_POST["COLOR DE EQUIPO"])) {
    http_response_code(400);
    exit("Falta COLOR"); # Terminar el script definitivamente
}

if (empty($_POST["ALMACENAMIENTO"])) {
    http_response_code(400);
    exit("Falta ALMACENAMIENTO"); # Terminar el script definitivamente
}

if (empty($_POST["STOCK"])) {
    http_response_code(400);
    exit("Falta STOCK"); # Terminar el script definitivamente
}

if (empty($_POST["STOCKMIN"])) {
    http_response_code(400);
    exit("Falta STOCKMIN"); # Terminar el script definitivamente
}

if (empty($_POST["STOCKMAX"])) {
    http_response_code(400);
    exit("Falta STOCKMAX"); # Terminar el script definitivamente
}

if (empty($_POST["CC"])) {
    http_response_code(400);
    exit("Falta CC"); # Terminar el script definitivamente
}

if (empty($_POST["CV"])) {
    http_response_code(400);
    exit("Falta CV"); # Terminar el script definitivamente
}

try {
    $conex = new PDO("sqlite:" . $nombre_fichero);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $calzado = [
        "ID_EQ" => $_POST["ID"],
        "MARCA_EQ" => $_POST["MARCA EQUIPO"],
        "TIP_EQ" => $_POST["TIPO DE EQUIPO"],
        "COL_EQ" => $_POST["COLOR DE EQUIPO"],
        "ALM_EQ" => $_POST["ALMACENAMIENTO"],
        "STOCK_EQ" => $_POST["STOCK"],
        "STOCKMIN_EQ" => $_POST["STOCKMIN"],
        "STOCKMAX_EQ" => $_POST["STOCKMAX"],
        "CC_EQ" => $_POST["CC"],
        "CV_EQ" => $_POST["CV"]
    ];
    # Preparando la consulta
    $sentencia = $conex->prepare("UPDATE EQUIPO 
        SET MARCA_EQ=:MARCA_CAL, MARCA_EQ=:MARCA_EQ, COL_EQ=:COL_EQ,TIP_EQ=:TIP_EQ, 
        STOCK_EQ=:STOCK_EQ, STOCKMIN_EQ=:STOCKMIN_EQ, STOCKMAX_EQ=:STOCKMAX_EQ, CC_CAL=:CC_EQ, CV_EQ=:CV_EQ
        WHERE ID_EQ=:ID_EQ;");
    $resultado = $sentencia->execute($calzado);
    
    http_response_code(200);
    echo "Datos actualizados";

} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: ".$exc->getMessage();
}
?>
