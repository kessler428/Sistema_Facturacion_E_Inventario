<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$agregarproducto = (isset($_POST['agregarproducto'])) ? $_POST['agregarproducto'] : '';

switch($agregarproducto){

    case 1:
        //Agregar CLientes
        $nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
        $numerodecedula = (isset($_POST['numerodecedula'])) ? $_POST['numerodecedula'] : '';
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $comentario = (isset($_POST['comentario'])) ? $_POST['comentario'] : '';

        $consulta = "INSERT INTO catalogodatos(Primer_Nombre_Empresa, Apellidos, NumeroRUC_Cedula, Direccion, Numero_Telefonico, Email, Comentario) VALUES('$nombres', '$apellido', '$numerodecedula', '$direccion', '$telefono', '$email', '$comentario') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if($resultado){
            $data = 'LISTO';
        }else{
            $data = 'ERROR';
        }        
        break;
    case 2:

        //Agregar Productos
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
        $codigo1 = (isset($_POST['codigo1'])) ? $_POST['codigo1'] : '';
        $codigo2 = (isset($_POST['codigo2'])) ? $_POST['codigo2'] : '';
        $marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
        $modelopresentacion = (isset($_POST['modelopresentacion'])) ? $_POST['modelopresentacion'] : '';
        $pventa = (isset($_POST['pventa'])) ? $_POST['pventa'] : '';
        $pcompra = (isset($_POST['pcompra'])) ? $_POST['pcompra'] : '';
        $stock = (isset($_POST['stock'])) ? $_POST['stock'] : '';
        $comentario = (isset($_POST['comentario'])) ? $_POST['comentario'] : '';

        $consulta = "SELECT * FROM almacen WHERE Codigo1 = '$codigo1'";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $unidad = intval($stock);
        
        $valor=$resultado->fetchAll(PDO::FETCH_ASSOC);

        if($valor == NULL){
            
            $consulta = "INSERT INTO almacen(NombreArticulo, Codigo1, Codigo2, Marca, Modelopresentacion, precioVenta, PrecioCompra, Stock,  Notas) VALUES('$nombre', '$codigo1', '$codigo2', '$marca', '$modelopresentacion', '$pventa', '$pcompra', '$stock', '$comentario') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            //Agregamos a los almacenes
            $consulta = "INSERT INTO almacenuno(IDCodigoAlmacenPK, Stock, Notas) VALUES((SELECT IDCodigoAlmacen  FROM almacen ORDER BY IDCodigoAlmacen DESC LIMIT 1), '$unidad', '$comentario') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $consulta = "INSERT INTO almacendos(IDCodigoAlmacenPK, Stock, Notas) VALUES((SELECT IDCodigoAlmacen  FROM almacen ORDER BY IDCodigoAlmacen DESC LIMIT 1), '0', '$comentario') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $consulta = "INSERT INTO almacentres(IDCodigoAlmacenPK, Stock, Notas) VALUES((SELECT IDCodigoAlmacen  FROM almacen ORDER BY IDCodigoAlmacen DESC LIMIT 1), '0', '$comentario') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $consulta = "INSERT INTO almacencuatro(IDCodigoAlmacenPK, Stock, Notas) VALUES((SELECT IDCodigoAlmacen  FROM almacen ORDER BY IDCodigoAlmacen DESC LIMIT 1), '0', '$comentario') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            if($resultado){
                $data = 2;
            }else{
                $data = 3;
            }
            
        }else{
            $data = 1;
            break;            
        }

        break;
    case 3:
        //Agregar Usuarios al sistema

        $nombreUsuario = (isset($_POST['nombreUsuario'])) ? $_POST['nombreUsuario'] : '';
        $contra = (isset($_POST['contra'])) ? $_POST['contra'] : '';
        $rolesdetrabajadores = (isset($_POST['rolesdetrabajadores'])) ? $_POST['rolesdetrabajadores'] : '';

        $consulta = "INSERT INTO usuarios(IDRolControlUsuariosPK, UserName, PasswordName) VALUES('$rolesdetrabajadores', '$nombreUsuario', '$contra') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if($resultado){
            $data = 'LISTO';
        }else{
            $data = 'ERROR';
        } 

        break;
    case 4:
        
        //Actualizar los productos

        $idcodigoalmacen = (isset($_POST['id'])) ? $_POST['id'] : '';

        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
        $codigo1 = (isset($_POST['codigo1'])) ? $_POST['codigo1'] : '';
        $codigo2 = (isset($_POST['codigo2'])) ? $_POST['codigo2'] : '';
        $marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
        $modelopresentacion = (isset($_POST['modelopresentacion'])) ? $_POST['modelopresentacion'] : '';
        $pventa = (isset($_POST['pventa'])) ? $_POST['pventa'] : '';
        $pcompra = (isset($_POST['pcompra'])) ? $_POST['pcompra'] : '';
        $comentario = (isset($_POST['comentario'])) ? $_POST['comentario'] : '';
        $Stock = (isset($_POST['Stock'])) ? $_POST['Stock'] : '';

        $consulta = "UPDATE almacen SET NombreArticulo = '$nombre', Marca = '$marca', Modelopresentacion = '$modelopresentacion', Codigo1 = '$codigo1', Codigo2 = '$codigo2', precioVenta = '$pventa', precioCompra = '$pcompra', Notas = '$comentario' WHERE IDCodigoAlmacen = '$idcodigoalmacen'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "UPDATE almacenuno SET Stock= '$Stock' WHERE IDCodigoAlmacenPK = '$idcodigoalmacen'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        //$consulta = "SELECT * FROM almacen WHERE IDCodigoAlmacen ='$idcodigoalmacen' ";       
        $consulta = "SELECT al.IDCodigoAlmacen, 
                        al.Codigo1, 
                        al.Codigo2, 
                        al.NombreArticulo, 
                        al.Modelopresentacion, 
                        al.precioVenta, 
                        al.PrecioCompra, 
                        uno.Stock, 
                        al.Marca, 
                        al.Notas,
                        uno.Stock as almacenuno,
                        dos.Stock as almacendos,
                        tres.Stock as almacentres,
                        cuatro.Stock as almacencuatro
                    FROM almacen as al 
                    INNER JOIN almacenuno as uno on uno.IDCodigoAlmacenPK = al.IDCodigoAlmacen 
                    INNER JOIN almacendos as dos on dos.IDCodigoAlmacenPK = al.IDCodigoAlmacen
                    INNER JOIN almacentres as tres on tres.IDCodigoAlmacenPK = al.IDCodigoAlmacen
                    INNER JOIN almacencuatro as cuatro on cuatro.IDCodigoAlmacenPK = al.IDCodigoAlmacen
                    WHERE al.IsVisible = 1 and IDCodigoAlmacen ='$idcodigoalmacen'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        if($resultado){
            //$data = 'LISTO';
        }else{
            $data = 'ERROR';
        }
        break;
    case 5:
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';

        $consulta = "UPDATE almacen SET IsVisible = '0' WHERE IDCodigoAlmacen = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data = "LISTO";
        
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;