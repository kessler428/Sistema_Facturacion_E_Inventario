<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

date_default_timezone_set("America/Costa_Rica"); // ("America/Santiago") por ejemplo
$timestamp = time();
$hoy = getdate($timestamp);   

$fechaTime = $hoy['year']."/".$hoy['mon']."/".$hoy['mday'];
$fecha = $hoy['year']."/".$hoy['mon']."/".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];

$valordeConsulta = (isset($_POST['valordeConsulta'])) ? $_POST['valordeConsulta'] : '';

switch($valordeConsulta){
    case 1:
            $consulta = "SELECT count(*) as numberusuarios FROM usuarios";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data1=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data1, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;

    case 2:
            $consulta = "SELECT count(*) as numberalmacen FROM almacen";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data2=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data2, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;
    case 3:
            $consulta = "SELECT Nivel ,RolUsuario FROM roles_usuarios";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data3=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data3, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;
    case 4:
            $consulta = "SELECT Nivel ,NombreAlmacen FROM tipoalmacenes";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data4=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data4, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;
    case 5: 
            // Usuario
            $correousuario = (isset($_POST['correousuario'])) ? $_POST['correousuario'] : '';


            $consulta = "SELECT * from usuarios as us inner join roles_usuarios as rol on rol.IDRolControlUsuariosPK = us.IDRolControlUsuariosPK where us.UserName = '$correousuario'";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;
    case 6: 
            // Numero de Factura
            
            $consulta = "SELECT * FROM Factura where IsVisible = 1 ORDER by IDFactura DESC LIMIT 1 ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;

    case 7: 
            // Productos      
            
            $consul = "SELECT uno.IDAlmacenuno, 
                            al.Codigo1, 
                            al.Codigo2, 
                            al.NombreArticulo, 
                            al.Modelopresentacion, 
                            al.precioVenta, 
                            al.PrecioCompra, 
                            al.Stock, 
                            al.Marca, 
                            al.Notas,
                            uno.Stock as almacenuno
                        FROM almacen as al 
                        INNER JOIN almacenuno as uno on uno.IDCodigoAlmacenPK = al.IDCodigoAlmacen
                        WHERE al.IsVisible = 1 AND uno.Stock > 0 AND al.IsVisible = 1
                    ";
            
            $consulta = $consul;
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;

    case 8: 
            // Buscar por id            
            $id = (isset($_POST['id'])) ? $_POST['id'] : '';
            
            $consulta = "SELECT 
                            uno.IDAlmacenuno, 
                            al.Codigo1, 
                            al.NombreArticulo, 
                            al.precioVenta, 
                            al.Marca, 
                            al.Modelopresentacion, 
                            uno.Stock 
                        FROM almacenuno  as uno 
                        INNER JOIN almacen as al ON uno.IDAlmacenuno = al.IDCodigoAlmacen 
                        WHERE uno.IDAlmacenuno = '$id' ";    
                           
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;
    case 9:
                    
        $consulta = "SELECT sum(Total) as suma FROM `factura` where Timespace = '$fechaTime' AND IsVisible = 1 AND AlmacenNumero  = 1 AND tipofac = 1";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;

    case 10:
        $consulta = "SELECT count(IDFactura) as suma FROM `factura` where Timespace = '$fechaTime' and AlmacenNumero  = 1 and IsVisible = 1  AND tipofac = 1";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;
    
    
    case 11:
            $consulta = "SELECT al.NombreArticulo,deta.producto, COUNT( deta.producto ) AS total FROM detalledefactura as deta INNER JOIN factura as f on f.IDFactura =  deta.IDFacturaPK INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto
            WHERE AlmacenNumero = 1 GROUP BY deta.producto ORDER BY total DESC LIMIT 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
    
            break;
    case 12:
        $consulta = "SELECT count(IDAlmacenuno) as procd from almacenuno where Stock < 10";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;
    case 13:

        $var = (isset($_POST['id'])) ? $_POST['id'] : '';

        $const = "SELECT deta.IDFacturaDetalle, 
                            deta.Unidades, 
                            al.NombreArticulo, 
                            al.Codigo1, 
                            deta.Precio 
                    FROM detalledefactura AS deta 
                    INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto 
                    WHERE IDFacturaPK = '$var'";
        $consulta = $const;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;
    case 14:

        $var = (isset($_POST['id'])) ? $_POST['id'] : '';

        $const = "SELECT estado, almacen FROM descuento where almacen = '$var'";
        $consulta = $const;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;
    case 15:

        $var = (isset($_POST['id'])) ? $_POST['id'] : '';

        $const = "SELECT PrecioCompra from almacen where IDCodigoAlmacen = '$var'";
        $consulta = $const;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;

    case 16:

        //Clientes.

        $const = "SELECT * from catalogodatos";
        $consulta = $const;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;
}