<?php
    include("../db/Conexion.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $idcatalogo = $_GET["idcatalogo"];
    $conexion = new Conexion();
    $con = $conexion->creaConexion();
    $sql = "";
    $json = "";
    switch ($idcatalogo){
        case 1:
            $sql = "select idtporenta as idtiporenta, desctiporenta as descripcion from ".$conexion->name.".tcattiporenta order by idtporenta asc";
            break;
        case 2:
            $sql = "select idstatus as idstatus, statusinmueble as descripcion from ".$conexion->name.".tcatstatusinmueble order by idstatus asc";
            break;
        default:
            $sql = "select 0 as id, 'CATALOGO NO SELECCIONADO ".$idcatalogo."' as msg ";
            break;
    }
    if($resultado = $con->query($sql)){
        $cols = $resultado->fetch_fields();
        $jsonDatos = "";
        while($fila = $resultado->fetch_assoc()){
            $jsonDatos .= "{";
            foreach ($cols as $col){
                $jsonDatos .= "\"".$col->name."\":\"".$fila[$col->name]."\",";
            }
            $jsonDatos = substr($jsonDatos, 0, (strlen($jsonDatos)-1))."},";
        }
        $jsonDatos = substr($jsonDatos, 0, (strlen($jsonDatos)-1));
        $json = "{\"res\":\"1\", \"msg\":\"CATALOGO OBTENIDO\", \"datos\":[".$jsonDatos."]}";
    }else{
        $json = "{\"res\":\"0\", \"msg\":\"CONSULTANDO CATALOGOS: ".$con->error."\"}";
    }
    
    echo $json;
?>
