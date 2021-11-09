<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$valordeConsulta = (isset($_GET['valordeConsulta'])) ? $_GET['valordeConsulta'] : '';

switch($valordeConsulta){
    case 1:

            $consulta = "SELECT * FROM vistadeudas";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data1['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data1); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;

    case 2:
        $id = (isset($_GET['id'])) ? $_GET['id'] : '';
        $consulta = "SELECT * FROM abonoshis WHERE idFactura = $id";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $data['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data); //enviar el array final en formato json a JS
        $conexion = NULL;        
        break;

    case 3:
            $consulta = "SELECT * FROM vistasaldadas";  
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data1['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data1); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;

    case 4:
            $consulta = "SELECT * FROM catalogodatos";    
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data1['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data1); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;
}