<?php
    include("../db/Conexion.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $param = base64_decode($_GET["param"]);
    $datos = explode("|", $param);
    $filtro = $datos[0];
    $idpropietario = $datos[1];
    
    $conexion = new Conexion();
    $json = "";
    $con = $conexion->creaConexion();
    
    $sql = "SELECT a.idinmueble AS idinmueble "
	." ,a.descripcion AS descripcion "
	." ,a.calle AS calle  "
	." ,a.numext AS numext  "
	." ,a.numint AS numint  "
	." ,a.codpost AS codpost  "
	." ,a.colonia AS colonia  "
	." ,a.delmun AS delmun  "
	." ,a.estado AS estado  "
	." ,a.fechaultimarenta AS fechaultimarenga  "
	." ,a.fechaultimopago AS fechaultimopago  "
	." ,a.idcliente AS idcliente  "
	." ,a.montorenta AS montorenta  "
	." ,a.fechareg AS fechareg  "
	." ,a.idpropietario AS idpropietario  "
	." ,a.deposito AS deposito  "
	." ,a.idstatus AS idestatus  "
	." ,b.statusinmueble AS estatus  "
	." ,a.idtiporenta AS idtiporenta  "
	." ,c.desctiporenta AS tiporenta  "
        ." ,'false' AS mostrar "
        ." FROM ".$conexion->name.".tinmuebles a  "
        ." INNER JOIN ".$conexion->name.".tcatstatusinmueble b ON a.idstatus = b.idstatus   "
        ." INNER JOIN ".$conexion->name.".tcattiporenta c ON c.idtporenta  = a.idtiporenta  "
        ." WHERE a.idpropietario = ".$idpropietario." "
        . " AND (a.idinmueble = '".$filtro."' OR a.descripcion LIKE '".$filtro."%')  "
        ." ORDER BY a.idstatus ASC, a.idinmueble ";
    $jsonDatos = "";
    if($resultado = $con->query($sql)){
        $cols = $resultado->fetch_fields();
        while($fila = $resultado->fetch_assoc()){
            $jsonDatos .= "{";
            foreach($cols as $col){
                $jsonDatos .= "\"".$col->name."\":\"".$fila[$col->name]."\",";
            }
            $jsonDatos = substr($jsonDatos, 0, (strlen($jsonDatos)-1))."},";
        }
        $jsonDatos = substr($jsonDatos, 0, (strlen($jsonDatos)-1));
        $json = "{\"res\":\"1\", \"msg\":\"INMUEBLES OBTENIDOS\", \"datos\":[".$jsonDatos."]}";
    }else{
        $json = "{\"res\":\"0\", \"msg\":\"CONSULTANDO LOS INMUEBLES: ".$con->error."\"}";
    }
    
    echo $json;

?>

