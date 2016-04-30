<?php
    
include("../db/Conexion.php");
/* 
 * Archivo para registrar inmuebles
 */
    $param = base64_decode($_GET["param"]);
    $datos = explode("|", $param);
    
    $descripcion = $datos[0];
    $calle = $datos[1];
    $renta = $datos[2];
    $deposito = $datos[3];
    $idtipopago = $datos[4];
    $numext = $datos[5];
    $numint = $datos[6];
    $colonia = $datos[7];
    $codpost = $datos[8];
    $delmun = $datos[9];
    $estado = $datos[10];
    $idpropietario = $datos[11];
    $idusr = $datos[12];
    
    $conexion = new Conexion();
    $json = "";
    $con = $conexion->creaConexion();
    
    /*valida primero si existe la descripcion*/
    $sql = "SELECT COUNT(*) as vlexiste "
            . " from ".$conexion->name.".tinmuebles "
            . " where idpropietario = ".$idpropietario." and descripcion like '%".$descripcion."%' ";
    
    if($resultado = $con->query($sql)){
        $fila = $resultado->fetch_assoc();
        $existe = $fila["vlexiste"];
        if(($existe === 0)||($existe === "0")){
            $sql = "SELECT IFNULL(MAX(idinmueble),0) as maximo "
                    . " from ".$conexion->name.".tinmuebles where idpropietario = ".$idpropietario." ";
            if($resultado2 = $con->query($sql)){
                $fila = $resultado2->fetch_assoc();
                $existe = $fila["maximo"];
                $existe = $existe + 1;
                $sql = "insert into ".$conexion->name.".tinmuebles "
                        . " (idinmueble, descripcion, calle, montorenta, deposito, idtiporenta, "
                        . " numext, numint, colonia, codpost, delmun, estado, fechareg, idusrreg, idpropietario) "
                        . " values(".$existe.", '".$descripcion."', '".$calle."', ".$renta.", ".$deposito.", ".$idtipopago.", "
                        . " '".$numext."', '".$numint."', '".$colonia."', '".$codpost."', '".$delmun."', "
                        . " '".$estado."', current_timestamp, ".$idusr.", ".$idpropietario." )";
                if($resultado3 = $con->query($sql)){
                    if($con->affected_rows > 0){
                        $json = "{\"res\":\"1\", \"msg\":\"INMUEBLE REGISTRADO CORRECTAMENTE\", \"idinmueble\":\"".$existe."\" }";
                    }else{
                        $json = "{\"res\":\"0\", \"msg\":\"INMUEBLE NO SE PUDO REGISTRAR\" }";
                    }
                }else{
                    $json = "{\"res\":\"0\", \"msg\":\"REGISTRANDO EL INMUEBLE: ".$con->error."\"}";
                }
            }else{
                $json = "{\"res\":\"0\", \"msg\":\"OBTENIENDO EL MAXIMO IDENTIFICADOR DEL INMUEBLE: ".$con->error."\"}";
            }
        }else{
            $json = " {\"res\":\"0\", \"msg\":\"EL INMUEBLE INDICADO YA EXISTE\"  } ";
        }
    }else{
        $json = "{\"res\":\"0\", \"msg\":\"VALIDANDO QUE EXISTE EL INMUEBLE: ".$con->error."\"}";
    }
    
    echo $json;

?>

