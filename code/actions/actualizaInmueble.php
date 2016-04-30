<?php

include("../db/Conexion.php");
/* 
 * Archivo para registrar inmuebles
 */
    $param = base64_decode($_GET["param"]);
    $datos = explode("|", $param);
    
    $idinmueble = $datos[0];
    $descripcion = $datos[1];
    $calle = $datos[2];
    $renta = $datos[3];
    $deposito = $datos[4];
    $idtipopago = $datos[5];
    $numext = $datos[6];
    $numint = $datos[7];
    $colonia = $datos[8];
    $codpost = $datos[9];
    $delmun = $datos[10];
    $estado = $datos[11];
    $idpropietario = $datos[12];
    $idestatus = $datos[13];
    $idusr = $datos[14];
    
    $conexion = new Conexion();
    $json = "";
    $con = $conexion->creaConexion();
    
    /*valida primero si existe la descripcion*/
    $sql = "update ".$conexion->name.".tinmuebles set descripcion = '".$descripcion."',"
            . " calle ='".$calle."', "
            . " numext = '".$numext."', "
            . " numint = '".$numint."', "
            . " codpost= '".$codpost."', "
            . " colonia= '".$colonia."', "
            . " delmun = '".$delmun."', "
            . " estado = '".$estado."', "
            . " montorenta ='".$renta."', "
            . " deposito= '".$deposito."',  "
            . " idtiporenta= '".$idtipopago."', "
            . " idstatus = '".$idestatus."', "
            . " fechamod = current_timestamp,  "
            . " idusrmod = '".$idusr."' "
            . " where idinmueble = ".$idinmueble." and idpropietario = ".$idpropietario." " ;
    
    $con->query($sql);
    if($con->affected_rows > 0){
        $json = "{\"res\":\"1\", \"msg\":\"DATOS ACTUALIZADOS CORRECTAMENTE \"}";
    }else{
        $json = "{\"res\":\"0\", \"msg\":\"NO SE ACTUALIZARON LOS DATOS\"}";
    }
    
    echo $json;

?>
