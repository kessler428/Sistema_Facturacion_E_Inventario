<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

date_default_timezone_set("America/Costa_Rica"); // ("America/Santiago") por ejemplo
$timestamp = time();
$hoy = getdate($timestamp);   

$fechaTime = $hoy['year']."/".$hoy['mon']."/".$hoy['mday'];
$fecha = $hoy['year']."/".$hoy['mon']."/".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];


$verproducto = (isset($_POST['verproducto'])) ? $_POST['verproducto'] : '';

switch($verproducto){

    case 1:

        $id = (isset($_POST['id'])) ? $_POST['id'] : '';

        $consulta = "UPDATE factura SET IsVisible = '0' WHERE IDFactura = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  

        $consulta = "SELECT deta.Unidades, deta.producto, fac.AlmacenNumero FROM factura as fac INNER JOIN detalledefactura as deta ON fac.IDFactura = deta.IDFacturaPK WHERE fac.IDFactura = '$id'";
        $resultado = $conexion->prepare($consulta);
        $data = $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $dat) {
            $numero = $dat["AlmacenNumero"];            
            if($numero == 1){

                $StockNew = $dat['Unidades'];                
                $produc = $dat['producto'];
                
                $tock = "SELECT Stock from almacenuno where IDCodigoAlmacenPK = '$produc'";
                $resultado = $conexion->prepare($tock);
                $cantidadvieja = $resultado->execute();
                $cantidadvieja = $resultado->fetchAll(PDO::FETCH_ASSOC);
                $val = ($cantidadvieja[0]["Stock"]);
    
                $consulta1 = "UPDATE almacenuno set Stock = ($val + $StockNew) WHERE IDCodigoAlmacenPK = '$produc'";
                $resultado = $conexion->prepare($consulta1);
                $resultado->execute();
    
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            }
            
            if($numero == 2){

                $StockNew = $dat['Unidades'];                
                $produc = $dat['producto'];
                
                $tock = "SELECT Stock from almacendos where IDCodigoAlmacenPK = '$produc'";
                $resultado = $conexion->prepare($tock);
                $cantidadvieja = $resultado->execute();
                $cantidadvieja = $resultado->fetchAll(PDO::FETCH_ASSOC);
                $val = ($cantidadvieja[0]["Stock"]);
    
                $consulta1 = "UPDATE almacendos set Stock = ($val + $StockNew) WHERE IDCodigoAlmacenPK = '$produc'";
                $resultado = $conexion->prepare($consulta1);
                $resultado->execute();
    
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            }
            if($numero == 3){

                $StockNew = $dat['Unidades'];                
                $produc = $dat['producto'];
                
                $tock = "SELECT Stock from almacentres where IDCodigoAlmacenPK = '$produc'";
                $resultado = $conexion->prepare($tock);
                $cantidadvieja = $resultado->execute();
                $cantidadvieja = $resultado->fetchAll(PDO::FETCH_ASSOC);
                $val = ($cantidadvieja[0]["Stock"]);
    
                $consulta1 = "UPDATE almacentres set Stock = ($val + $StockNew) WHERE IDCodigoAlmacenPK = '$produc'";
                $resultado = $conexion->prepare($consulta1);
                $resultado->execute();
    
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            }
            if($numero == 4){

                $StockNew = $dat['Unidades'];                
                $produc = $dat['producto'];
                
                $tock = "SELECT Stock from almacencuatro where IDCodigoAlmacenPK = '$produc'";
                $resultado = $conexion->prepare($tock);
                $cantidadvieja = $resultado->execute();
                $cantidadvieja = $resultado->fetchAll(PDO::FETCH_ASSOC);
                $val = ($cantidadvieja[0]["Stock"]);
    
                $consulta1 = "UPDATE almacencuatro set Stock = ($val + $StockNew) WHERE IDCodigoAlmacenPK = '$produc'";
                $resultado = $conexion->prepare($consulta1);
                $resultado->execute();
    
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            }
        }   

        break;
    case 2:
        $consulta = "SELECT 
                        (Select count(IDFactura) FROM factura where AlmacenNumero = 1) AS numerofac1, 
                        (Select count(IDFactura) FROM factura where AlmacenNumero = 2) AS numerofac2, 
                        (Select count(IDFactura) FROM factura where AlmacenNumero = 3) AS numerofac3, 
                        (Select count(IDFactura) FROM factura where AlmacenNumero = 4) AS numerofac4,
                        (Select SUM(Total) FROM factura where AlmacenNumero = 1) AS suma1,
                        (Select SUM(Total) FROM factura where AlmacenNumero = 2) AS suma2,
                        (Select SUM(Total) FROM factura where AlmacenNumero = 3) AS suma3,
                        (Select SUM(Total) FROM factura where AlmacenNumero = 4) AS suma4
                    FROM factura WHERE IsVisible = 1 AND Timespace = '$fechaTime' LIMIT 1";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;
        break;
    
}