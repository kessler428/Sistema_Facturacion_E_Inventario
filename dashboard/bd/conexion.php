<?php
class Conexion{
     public static function Conectar(){
    
        $Servidor = gethostname();
        $mipc = 'DESKTOP-2G8GBL1';
 
        if(strcmp($Servidor, $mipc ) === 0){ 

            define('servidor','localhost');
            define('nombre_bd','residencial');
            define('usuario','root');
            define('password',''); 
            
        }else{
            define('servidor','localhost');
            define('nombre_bd','u128272301_bravos');
            define('usuario','u128272301_root');
            define('password','rWK$cw9:N'); 
        }        
        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         
        try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);             
            return $conexion; 
        }catch (Exception $e){
            die("El error de Conexión es :".$e->getMessage());
        }         
     } 
 }
?>