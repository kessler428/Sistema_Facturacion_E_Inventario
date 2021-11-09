<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT Timespace, COUNT(IDFactura) as contado FROM factura
WHERE Timespace >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND Timespace < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY GROUP BY Timespace";   

$resultado = $conexion->prepare($consulta);
$resultado->execute();

$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS

$consulta1 = "SELECT Timespace, COUNT(IDFactura) as contado FROM factura
WHERE Timespace >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND Timespace < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY GROUP BY Timespace";   

$resultado1 = $conexion->prepare($consulta1);
$resultado1->execute();

$semana=$resultado1->fetchAll(PDO::FETCH_ASSOC);
print json_encode($semana, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS

$conexion = NULL;
