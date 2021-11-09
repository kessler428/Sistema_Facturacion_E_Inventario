<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

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
            $consulta = "SELECT sum(aluno.Stock) as keslerpendejo from almacen AS al INNER JOIN almacenuno as aluno ON aluno.IDAlmacenuno = al.IDCodigoAlmacen WHERE al.IsVisible = 1";       
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
            
            $consulta = "SELECT * FROM Factura ORDER by IDFactura DESC LIMIT 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;

    case 7: 
            // Productos            
            $consulta = "SELECT IDCodigoAlmacen, Codigo1, NombreArticulo, precioVenta FROM almacen WHERE IsVisible = 1 ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;

    case 8: 
            // Buscar por id            
            $id = (isset($_POST['id'])) ? $_POST['id'] : '';
            $consulta = "SELECT IDCodigoAlmacen, Codigo1, NombreArticulo, precioVenta, Marca, Modelopresentacion FROM almacen WHERE IDCodigoAlmacen = '$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;
    case 9:
        // Buscar por id            
        
        $consulta = "SELECT al.IDCodigoAlmacen, al.NombreArticulo, al.Codigo1, aluno.Stock from almacen as al INNER JOIN almacenuno as aluno ON aluno.IDCodigoAlmacenPK = al.IDCodigoAlmacen WHERE aluno.Stock > 0  AND al.IsVisible = 1";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;
    
    case 10:
        $consulta = "SELECT sum(Stock) as almacenuno, (select sum(Stock) from almacendos) as almacendos, (select sum(Stock) as almacentres from almacentres) as almacentres, (select sum(Stock) as almacencuatro from almacencuatro) as almacencuatro from almacenuno";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;

    case 11:

        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        
        $consulta = "SELECT Stock  from almacenuno where IDAlmacenuno = '$id'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;
        break;

    case 12:
           
            $consulta = "SELECT sum(Total) as suma from factura where Timespace = CURDATE() AND tipofac = 1 and IsVisible = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
            break;
    case 13:

            $consulta = "SELECT count(IDFactura) as sumafac from factura WHERE Timespace = CURDATE() AND tipofac = 1 and IsVisible = 1";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;
    case 14:
            $sumasdetodo = 'SELECT sum(aluno.Stock) as uno, sum(aldos.Stock) as dos, sum(altres.Stock) as tres, sum(alcuatro.Stock) as cuatro from almacen AS al INNER JOIN almacenuno as aluno ON aluno.IDAlmacenuno = al.IDCodigoAlmacen INNER JOIN almacendos as aldos ON aldos.IDAlmacendos = al.IDCodigoAlmacen INNER JOIN almacentres as altres ON altres.IDAlmacentres = al.IDCodigoAlmacen INNER JOIN almacencuatro as alcuatro ON alcuatro.IDAlmacencuatro = al.IDCodigoAlmacen WHERE al.IsVisible = 1';

            $consulta = $sumasdetodo;       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;
    case 15:
            $consulta = "SELECT sum(al.precioVenta * (aluno.Stock + aldos.Stock + altres.Stock + alcuatro.Stock)) as venta, sum(al.PrecioCompra * (aluno.Stock + aldos.Stock + altres.Stock + alcuatro.Stock)) as compra, (sum(al.precioVenta * (aluno.Stock + aldos.Stock + altres.Stock + alcuatro.Stock)) - sum(al.PrecioCompra * (aluno.Stock + aldos.Stock + altres.Stock + alcuatro.Stock))) as ganancias from almacen as al INNER JOIN almacenuno as aluno ON aluno.IDCodigoAlmacenPK = al.IDCodigoAlmacen INNER JOIN almacendos as aldos ON aldos.IDCodigoAlmacenPK = al.IDCodigoAlmacen INNER JOIN almacentres as altres ON altres.IDCodigoAlmacenPK = al.IDCodigoAlmacen INNER JOIN almacencuatro as alcuatro ON alcuatro.IDCodigoAlmacenPK = al.IDCodigoAlmacen WHERE al.IsVisible = 1";
            
            $consulta = $consulta;       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;

        break;

    case 16:
            $consult = "SELECT DISTINCT producto as prod, al.NombreArticulo, al.Marca, al.Codigo1, (select sum(Unidades) from detalledefactura where producto = prod) as Cantidades from detalledefactura as deta INNER JOIN factura as fac ON fac.IDFactura = deta.IDFacturaPK INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto WHERE fac.AlmacenNumero = 1 ORDER BY Cantidades asc LIMIT 10";
            
            $consulta = $consult;       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;

    case 17:

            $consulta = "SELECT DISTINCT producto as prod, al.NombreArticulo, al.Marca, al.Codigo1, (select sum(Unidades) from detalledefactura where producto = prod) as Cantidades from detalledefactura as deta INNER JOIN factura as fac ON fac.IDFactura = deta.IDFacturaPK INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto WHERE fac.AlmacenNumero = 1 ORDER BY Cantidades desc LIMIT 10";
                
            $consulta = $consulta;       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;  
    
        break;

    case 18:

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
    case 19:
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
    
    case 20:

        $almacen = (isset($_POST['almacen'])) ? $_POST['almacen'] : '';
        
        $consulta = "SELECT al.IDCodigoAlmacen, al.NombreArticulo, al.Codigo1, aluno.Stock from almacen as al INNER JOIN $almacen as aluno ON aluno.IDCodigoAlmacenPK = al.IDCodigoAlmacen WHERE aluno.Stock > 0  AND al.IsVisible = 1";       
        
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;


        break;

    case 21:

        $almacen = (isset($_POST['almacen'])) ? $_POST['almacen'] : '';
        
        $consulta = "SELECT al.IDCodigoAlmacen, al.NombreArticulo, al.Codigo1, aluno.Stock from almacen as al INNER JOIN $almacen as aluno ON aluno.IDCodigoAlmacenPK = al.IDCodigoAlmacen WHERE aluno.Stock > 0  AND al.IsVisible = 1";       
        
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;
        
        break;
}