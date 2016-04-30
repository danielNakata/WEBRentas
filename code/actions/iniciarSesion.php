<?php

/* 
 * Archivo para hacer la conexion con mysql
 */
include("../db/Conexion.php");

$param = base64_decode($_GET["session"]);
$datos = explode("|", $param);
$txtUsuario = $datos[0];
$txtContrasena = $datos[1];
$conexion = new Conexion();
$json = "";
$con = $conexion->creaConexion();
$pass = md5($txtContrasena);
$sql = "select count(*) AS existe from ".$conexion->name.".tusuarios where usuario = '".$txtUsuario."' and contrasena = PASSWORD('".$pass."') ";
try{
    if($resultado = $con->query($sql)){
        $fila = $resultado->fetch_assoc();
        $existe = $fila["existe"];

        if($existe === "1"){
            $sql = "select a.idusr as idusr, a.usuario as usuario, a.nombre as nombre "
                    .", a.apellidos as apellidos, a.idperfil as idperfil, a.idestatus as idestatus "
                    .", a.idpropietario as idpropietario "
                    .", b.idestatus as idestatusprop "
                    ." from ".$conexion->name.".tusuarios a "
                    ." inner join ".$conexion->name.".tpropietarios b on a.idpropietario = b.idpropietario "
                    ." where a.usuario = '".$txtUsuario."' and contrasena = PASSWORD('".$pass."') ";
            if($resultado = $con->query($sql)){
                $cols = $resultado->fetch_fields();
                $jsonDatos = "";
                while($fila = $resultado->fetch_assoc()){
                    $jsonDatos = "{";
                    foreach($cols as $campo){
                        $jsonDatos .= "\"".$campo->name."\":\"".$fila[$campo->name]."\",";
                    }
                    $jsonDatos = substr($jsonDatos, 0, (strlen($jsonDatos)-1))."},";
                }
                
                $jsonDatos = substr($jsonDatos, 0, (strlen($jsonDatos)-1));
                $json = "{\"res\":\"1\", \"msg\":\"INICIO DE SESION OK\", \"datos\":[".$jsonDatos."]}";
            }else{
                $json = "{\"res\":\"0\", \"msg\":\"VALIDANDO DATOS DEL USUARIO: ".$con->error."\"}";
            }
        }else{
            $json = "{\"res\":\"0\", \"msg\":\"USUARIO NO VALIDO\"}";
        }
    }else{
        $json = "{\"res\":\"0\", \"msg\":\"VALIDANDO USUARIO Y CONTRASEÑA: ".$con->error."\"}";
    }
}catch(Exception $ex){
    $json = "{\"res\":\"0\", \"msg\":\"ALGO PASO:".$ex->getMessage()." \"}";
}

echo $json;

?>