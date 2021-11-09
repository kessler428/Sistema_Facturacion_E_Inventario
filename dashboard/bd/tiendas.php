<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$valordeConsulta = (isset($_POST['valordeConsulta'])) ? $_POST['valordeConsulta'] : '';

switch($valordeConsulta){
    case 1:

        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        
        if($id == 1){
            $consulta = "SELECT sum(Total) as suma FROM `factura` where Timespace = CURDATE() AND IsVisible = 1 AND AlmacenNumero  = 1 and tipofac = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
    
            break;
        }
        if($id == 2){
            $consulta = "SELECT sum(Total) as suma FROM `factura` where Timespace = CURDATE() AND IsVisible = 1 AND AlmacenNumero  = 2 and tipofac = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;    
            break;
        }
        if($id == 3){
            $consulta = "SELECT sum(Total) as suma FROM `factura` where Timespace = CURDATE() AND IsVisible = 1 AND AlmacenNumero  = 3 and tipofac = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;    
            break;

        }
        if($id == 4){
            $consulta = "SELECT sum(Total) as suma FROM `factura` where Timespace = CURDATE() AND IsVisible = 1 AND AlmacenNumero  = 4 and tipofac = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;    
            break;

        }

    case 2:
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        
        if($id == 1){
            $consulta = "SELECT count(IDFactura) as suma FROM `factura` where Timespace = CURDATE() and AlmacenNumero  = 1 and IsVisible = 1 and tipofac = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
    
            break;
        }
        if($id == 2){
            $consulta = "SELECT count(IDFactura) as suma FROM `factura` where Timespace = CURDATE() and AlmacenNumero  = 2 and IsVisible = 1 and tipofac = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
    
            break;
        }
        if($id == 3){
            $consulta = "SELECT count(IDFactura) as suma FROM `factura` where Timespace = CURDATE() and AlmacenNumero  = 3 and IsVisible = 1 and tipofac = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
    
            break;
        }
        if($id == 4){
            $consulta = "SELECT count(IDFactura) as suma FROM `factura` where Timespace = CURDATE() and AlmacenNumero  = 4 and IsVisible = 1 and tipofac = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
    
            break;
        }

    case 3:

        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        
        if($id == 1){
            $consulta = "SELECT sum(al.PrecioCompra * aluno.Stock) as inversion from almacen as al INNER JOIN almacenuno as aluno ON al.IDCodigoAlmacen = aluno.IDCodigoAlmacenPK WHERE al.IsVisible = 1 AND aluno.Stock > 0";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data3=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data3, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
            break;
        }
        if($id == 2){
            $consulta = "SELECT sum(al.PrecioCompra * aldos.Stock) as inversion from almacen as al INNER JOIN almacendos as aldos ON al.IDCodigoAlmacen = aldos.IDCodigoAlmacenPK WHERE al.IsVisible = 1 AND aldos.Stock > 0";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data3=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data3, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
            break;
        }
        if($id == 3){
            $consulta = "SELECT sum(al.PrecioCompra * altres.Stock) as inversion from almacen as al INNER JOIN almacentres as altres ON al.IDCodigoAlmacen = altres.IDCodigoAlmacenPK WHERE al.IsVisible = 1 AND altres.Stock > 0";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data3=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data3, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
            break;
        }
        if($id == 4){
            $consulta = "SELECT sum(al.PrecioCompra * alcuatro.Stock) as inversion from almacen as al INNER JOIN almacencuatro as alcuatro ON al.IDCodigoAlmacen = alcuatro.IDCodigoAlmacenPK WHERE al.IsVisible = 1 AND alcuatro.Stock > 0";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data3=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data3, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
            break;
        }

}