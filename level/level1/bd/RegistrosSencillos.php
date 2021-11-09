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

$valorderegistros = (isset($_POST['valorderegistros'])) ? $_POST['valorderegistros'] : '';

switch($valorderegistros){
        case 1:
                $stocknew = (isset($_POST['stocknew'])) ? $_POST['stocknew'] : '';
                $sumadre = (isset($_POST['sumadre'])) ? $_POST['sumadre'] : '';

                $id = (isset($_POST['id'])) ? $_POST['id'] : '';

                $consultaid = "SELECT alma.IDCodigoAlmacen, 
                                        alma.Codigo1, 
                                        alma.Codigo2, 
                                        alma.NombreArticulo, 
                                        alma.Marca, 
                                        alma.Modelopresentacion, 
                                        aluno.stock, 
                                        alma.precioVenta, 
                                        alma.Notas, 
                                        aluno.IDAlmacenuno 
                                FROM almacen as alma 
                                INNER JOIN almacenuno as aluno on aluno.IDCodigoAlmacenPK = alma.IDCodigoAlmacen 
                                WHERE aluno.IsVisible = 1 AND aluno.IDAlmacenuno = '$id' ";

                $consulta = "UPDATE almacenuno SET Stock = '$stocknew' WHERE IDAlmacenuno = '$id' ";       
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();

                /* Para insertar en el Historial */
                $consulta = "INSERT INTO historialstock(producto, Stock, TimeSpace, Horainsertada, Numeroalmacen) Values('$id', '$sumadre', '$fechaTime','$fecha', '1' )";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                /* Finalizamos */

                $consulta = $consultaid;       
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();

                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
                //$conexion = NULL;

                break;
        case 2:
                //Insertar la Factura

                $NumeroAlmacen = (isset($_POST['NumeroAlmacen'])) ? $_POST['NumeroAlmacen'] : '';
                $Total = (isset($_POST['Total'])) ? $_POST['Total'] : '';
                $SubTotal = (isset($_POST['SubTotal'])) ? $_POST['SubTotal'] : '';
                $Monto = (isset($_POST['Monto'])) ? $_POST['Monto'] : '';
                $cambio = (isset($_POST['cambio'])) ? $_POST['cambio'] : '';
                $descuento = (isset($_POST['descuento'])) ? $_POST['descuento'] : '';
                $nameuser = (isset($_POST['nameuser'])) ? $_POST['nameuser'] : '';
                $tipofac = (isset($_POST['tipofac'])) ? $_POST['tipofac'] : '';
                
                $consulta = "INSERT INTO factura(AlmacenNumero, SubTotal, Total, montopagado, cambio, descuento, cliente, Timespace, fechaEmision, tipofac) VALUES('$NumeroAlmacen', '$SubTotal','$Total', '$Monto', '$cambio', '$descuento', '$nameuser', '$fechaTime', '$fecha', '$tipofac') ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();        
                
                if($tipofac == '2'){

                        $consulta = "SELECT MAX(IDFactura) AS idfac FROM factura";			
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();      
                        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
                        $valordeid = $data[0]["idfac"];

                        $consulta = "INSERT INTO abonoshis(montoAbonado, Concepto, idFactura) VALUES('0', '','$valordeid') ";			
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute(); 
                }

                break;
        case 3:
                //Detalles de la Factura

                $codigoproducto = (isset($_POST['codigoproducto'])) ? $_POST['codigoproducto'] : '';
                $cantidades = (isset($_POST['cantidades'])) ? $_POST['cantidades'] : '';
                $precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
                $precioUnit = (isset($_POST['precioUnit'])) ? $_POST['precioUnit'] : '';

                $consulta = "SELECT MAX(IDFactura) AS idfac FROM factura";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();      
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

                $valordeid = $data[0]["idfac"];
                
                $consulta = "INSERT INTO detalledefactura(Unidades, producto, Precio, IDFacturaPK, preciounit, TimeSpace) VALUES('$cantidades', '$codigoproducto', '$precio', '$valordeid', '$precioUnit','$fechaTime') ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();  
                
                $consulta = "UPDATE almacenuno set Stock =  ((select Stock from almacenuno where IDAlmacenuno = '$codigoproducto') - '$cantidades') where IDAlmacenuno = '$codigoproducto'";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();  
                                               
                break;
}