<?php

include("../db/Conexion.php");
/* 
 * Archivo para registrar clientes
 */
    $param = base64_decode($_GET["param"]);
    $datos = explode("|", $param);
    
    $nombre = $datos[0];
    $apellidos = $datos[1];
    $fechanac = $datos[2];
    $idsexo = $datos[3];
    $idstatus = $datos[4];
    $idusrreg = $datos[5];
    $idpropietario = $datos[6];
    
    $conexion = new Conexion();
    $json = "";
    $con = $conexion->creaConexion();
    
    $sql = "select count(*)as vlexiste from ".$conexion->name.".tclientes "
            . " where nombre = '".$nombre."' and apellidos = '".$apellidos."' ";
    
    if($resultado = $con->query($sql)){
        $fila = $resultado->fetch_assoc();
        $existe = $fila["vlexiste"];
        if(($existe === 0)||($existe === "0")){
            $sql = "select ifnull(max(idcliente),0) as maximo "
                    . " from ".$conexion->name.".tclientes ";
            if($resultado2 = $con->query($sql)){
                $fila = $resultado2->fetch_assoc();
                $existe = $fila["maximo"];
                $existe = $existe + 1;
                
                $sql = "insert into ".$conexion->name.".tclientes(idcliente, nombre, apellidos, fechanac, idsexo, idstatus, "
                        . " fechaalta, fechareg, idusrreg, idpropietario) values ( "
                        . " ".$existe.", '".$nombre."', '".$apellidos."', '".$fechanac."', ".$idsexo.", ".$idstatus.", "
                        . " today(),current_timestamp, ".$idusrreg.", ".$idpropietario.")  ";
                if($resultado3 = $con->query($sql)){
                    if($con->affected_rows > 0){
                        $json = "{\"res\":\"1\", \"msg\":\"CLIENTE REGISTRADO CORRECTAMENTE\", \"idcliente\":\"".$existe."\" }";
                    }else{
                        $json = "{\"res\":\"0\", \"msg\":\"CLIENTE NO SE PUDO REGISTRAR\" }";
                    }
                }else{
                    $json = "{\"res\":\"0\", \"msg\":\"REGISTRANDO EL CLIENTE: ".$con->error."\"}";
                }
            } else {
                $json = "{\"res\":\"0\", \"msg\":\"OBTENIENDO EL MAXIMO IDENTIFICADOR DEL CLIENTE: ".$con->error."\"}";
            }
        } else {
            $json = " {\"res\":\"0\", \"msg\":\"EL CLIENTE INDICADO YA EXISTE\"  } ";
        }
    } else {
        $json = "{\"res\":\"0\", \"msg\":\"VALIDANDO QUE EXISTE EL CLIENTE: ".$con->error."\"}";
    }
    
    
    echo $json;
?>

