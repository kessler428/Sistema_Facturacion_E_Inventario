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

        $consulta = "INSERT INTO almacen(NombreArticulo, Codigo1, Codigo2, Marca, Modelopresentacion, precioVenta, PrecioCompra, Stock,  Notas) VALUES('$nombre', '$codigo1', '$codigo2', '$marca', '$modelopresentacion', '$pventa', '$pcompra', '$stock', '$comentario') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if($resultado){
            $data = 'LISTO';
        }else{
            $data = 'ERROR';
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
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

