<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$valordeConsulta = (isset($_POST['valordeConsulta'])) ? $_POST['valordeConsulta'] : '';

switch($valordeConsulta){
    case 1:

        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $dos = (isset($_POST['dos'])) ? $_POST['dos'] : '';
        $tres = (isset($_POST['tres'])) ? $_POST['tres'] : '';
        $cuatro = (isset($_POST['cuatro'])) ? $_POST['cuatro'] : '';

        $suma = $dos + $tres + $cuatro;

        $consulta = "UPDATE almacendos SET Stock = ((SELECT Stock from almacendos WHERE IDAlmacendos = '$id') + '$dos') WHERE IDAlmacendos = '$id' ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $consulta = "UPDATE almacentres SET Stock = ((SELECT Stock from almacentres WHERE IDAlmacentres = '$id') + '$tres') WHERE IDAlmacentres = '$id' ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "UPDATE almacencuatro SET Stock = ((SELECT Stock from almacencuatro WHERE IDAlmacencuatro = '$id') + '$cuatro') WHERE IDAlmacencuatro = '$id' ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $consulta = "UPDATE almacenuno SET Stock = ((SELECT Stock from almacenuno WHERE IDAlmacenuno = '$id') - '$suma') WHERE IDAlmacenuno = '$id' ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
              
        break;

    case 2:
        $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
        $almacen = (isset($_POST['valor'])) ? $_POST['valor'] : '';

        $consulta = "UPDATE descuento SET estado = '$estado' WHERE almacen = '$almacen' ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        break;

    case 3:
            $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
            $almacen = (isset($_POST['valor'])) ? $_POST['valor'] : '';
    
            $consulta = "SELECT * FROM descuento";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
            $conexion = NULL;
            
            break;
    case 4:
        $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
        $almacen = (isset($_POST['valor'])) ? $_POST['valor'] : '';

        $consulta = "UPDATE usuarios SET estado = '$estado'";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        

        break;
    case 5:

        $consulta = "SELECT estado From usuarios LIMIT 1";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;
        
        break;
    case 6:

        $salida = (isset($_POST['salida'])) ? $_POST['salida'] : '';
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
        $destino = (isset($_POST['destino'])) ? $_POST['destino'] : '';

        if($salida == "almacenuno"){
                    
            $consulta = "UPDATE almacenuno SET Stock = ((SELECT Stock from almacenuno WHERE IDAlmacenuno = '$id') - '$cantidad') WHERE IDAlmacenuno = '$id' ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            if($destino == "almacendos"){
                $consulta = "UPDATE almacendos SET Stock = ((SELECT Stock from almacendos WHERE IDAlmacendos = '$id') + '$cantidad') WHERE IDAlmacendos = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            if($destino == "almacentres"){
                $consulta = "UPDATE almacentres SET Stock = ((SELECT Stock from almacentres WHERE IDAlmacentres = '$id') + '$cantidad') WHERE IDAlmacentres = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            if($destino == "almacencuatro"){
                $consulta = "UPDATE almacencuatro SET Stock = ((SELECT Stock from almacencuatro WHERE IDAlmacencuatro = '$id') + '$cantidad') WHERE IDAlmacencuatro = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
        }
        if($salida == "almacendos"){

            $consulta = "UPDATE almacendos SET Stock = ((SELECT Stock from almacendos WHERE IDAlmacendos = '$id') - '$cantidad') WHERE IDAlmacendos = '$id' ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            if($destino == "almacenuno"){
                $consulta = "UPDATE almacenuno SET Stock = ((SELECT Stock from almacenuno WHERE IDAlmacenuno = '$id') + '$cantidad') WHERE IDAlmacenuno = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            if($destino == "almacentres"){
                $consulta = "UPDATE almacentres SET Stock = ((SELECT Stock from almacentres WHERE IDAlmacentres = '$id') + '$cantidad') WHERE IDAlmacentres = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            if($destino == "almacencuatro"){
                $consulta = "UPDATE almacencuatro SET Stock = ((SELECT Stock from almacencuatro WHERE IDAlmacencuatro = '$id') + '$cantidad') WHERE IDAlmacencuatro = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            
        }
        if($salida == "almacentres"){

            $consulta = "UPDATE almacentres SET Stock = ((SELECT Stock from almacentres WHERE IDAlmacentres = '$id') - '$cantidad') WHERE IDAlmacentres = '$id' ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            if($destino == "almacenuno"){
                $consulta = "UPDATE almacenuno SET Stock = ((SELECT Stock from almacenuno WHERE IDAlmacenuno = '$id') + '$cantidad') WHERE IDAlmacenuno = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            if($destino == "almacendos"){
                $consulta = "UPDATE almacendos SET Stock = ((SELECT Stock from almacendos WHERE IDAlmacendos = '$id') + '$cantidad') WHERE IDAlmacendos = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            if($destino == "almacencuatro"){
                $consulta = "UPDATE almacencuatro SET Stock = ((SELECT Stock from almacencuatro WHERE IDAlmacencuatro = '$id') + '$cantidad') WHERE IDAlmacencuatro = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            
        }
        if($salida == "almacencuatro"){

            $consulta = "UPDATE almacencuatro SET Stock = ((SELECT Stock from almacencuatro WHERE IDAlmacencuatro = '$id') - '$cantidad') WHERE IDAlmacencuatro = '$id' ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            if($destino == "almacenuno"){
                $consulta = "UPDATE almacenuno SET Stock = ((SELECT Stock from almacenuno WHERE IDAlmacenuno = '$id') + '$cantidad') WHERE IDAlmacenuno = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            if($destino == "almacendos"){
                $consulta = "UPDATE almacendos SET Stock = ((SELECT Stock from almacendos WHERE IDAlmacendos = '$id') + '$cantidad') WHERE IDAlmacendos = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            if($destino == "almacentres"){
                $consulta = "UPDATE almacentres SET Stock = ((SELECT Stock from almacentres WHERE IDAlmacentres = '$id') + '$cantidad') WHERE IDAlmacentres = '$id' ";			
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
            }
            
        }
        break;

    case 7:

        $valor = (isset($_POST['valor'])) ? $_POST['valor'] : '';
        $concepto = (isset($_POST['concepto'])) ? $_POST['concepto'] : '';
        $metodopago = (isset($_POST['metodopago'])) ? $_POST['metodopago'] : '';
        $idfactura = (isset($_POST['idfactura'])) ? $_POST['idfactura'] : '';

        $consulta = "INSERT INTO abonoshis(montoAbonado, Concepto, Metododepago, idFactura) VALUES('$valor', '$concepto', '$metodopago', '$idfactura') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();      
        
        if($resultado){
            $data = "exito";
        }else{
            $data = "Revisar";
        }    
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;
        break;

    case 8:

        $use = (isset($_POST['use'])) ? $_POST['use'] : '';
        $comtra = (isset($_POST['comtra'])) ? $_POST['comtra'] : '';

        $consulta = "UPDATE usuarios SET PasswordName = '$comtra' WHERE IdUsuarios = '$use'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if($resultado){
            $data = "exito";
        }else{
            $data = "Revisar";
        }    
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;

        break;
}
