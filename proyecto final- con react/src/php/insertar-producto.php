<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'vars.php';

#verificar si vienen los parametros requeridos
if (empty($_POST["ID"])) {
    http_response_code(400);
    exit("Falta ID"); #Terminar el script definitivamente
}

if (empty($_POST["EQUIPO "])) {
    http_response_code(400);
    exit("falta MARCA DE EQUIPO"); #Terminar el script definitivamente
}
if (empty($_POST["ALMACENAMIENTO"])) {
    http_response_code(400);
    exit("falta ALMACENAMIENTO DE EQUIPO"); #Terminar el script definitivamente
}
if (empty($_POST["COLOR"])) {
    http_response_code(400);
    exit("falta COLOR DEL EQUIPO"); #Terminar el script definitivamente
}
if (empty($_POST["TIPO DE EQUIPO"])) {
    http_response_code(400);
    exit("falta TIPO"); #Terminar el script definitivamente
}
if (empty($_POST["STOCK"])) {
    http_response_code(400);
    exit("falta STOCK"); #Terminar el script definitivamente
}
if (empty($_POST["STOCKMIN"])) {
    http_response_code(400);
    exit("falta STOCKMIN"); #Terminar el script definitivamente
}
if (empty($_POST["STOCKMAX"])) {
    http_response_code(400);
    exit("falta STOCKMAX"); #Terminar el script definitivamente
}
if (empty($_POST["CC"])) {
    http_response_code(400);
    exit("falta CC"); #Terminar el script definitivamente
}
if (empty($_POST["CV"])) {
    http_response_code(400);
    exit("falta CV"); #Terminar el script definitivamente
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$calzado = [
    "ID_EQ" => $_POST["ID"],
    "MARCA_EQ" => $_POST["MARCA EQUIPO"],
    "ALM_EQ" => $_POST["ALMACENAMIENTO EQUIPO"],
    "COL_EQ" => $_POST["COLOR"],
    "TIPO_EQ" => $_POST["TIPO DE EQUIPO"],
    "STOCK_EQ" => $_POST["STOCK"],
    "STOCKMIN_EQ" => $_POST["STOCKMIN"],
    "STOCKMAX_EQ" => $_POST["STOCKMAX"],
    "CC_EQ" => $_POST["CC"],
    "CV_EQ" => $_POST["CV"]
];

try {
    # preparando la consulta
    $sentencia = $conex->prepare("INSERT INTO EQUIPO (ID_EQ, MARCA_EQ, ALM_EQ, COL_EQ, TIPO_EQ, STOCK_EQ, STOCKMIN_EQ, STOCKMAX_EQ, CC_EQ, CV_EQ)  
    VALUES EQUIPO (ID_EQ, MARCA_EQ, ALM_EQ, COL_EQ, TIPO_EQ, STOCK_EQ, STOCKMIN_EQ, STOCKMAX_EQ, CC_EQ, CV_EQ);");
    $resultado = $sentencia->execute($calzado);
    
    http_response_code(200);
    echo "Datos insertados";

} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: ".$exc->getMessage();
}

?>
