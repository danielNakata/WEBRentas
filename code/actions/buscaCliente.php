<?php

    include("../db/Conexion.php");

    $param = base64_decode($_GET["param"]);
    $datos = explode("|", $param);
    $filtro = $datos[0];
    $idpropietario = $datos[1];
    
    $conexion = new Conexion();
    $json = "";
    $con = $conexion->creaConexion();
    
    $sql = "SELECT a.idcliente AS idcliente
            ,a.nombre AS nombre
            ,a.apellidos AS apellidos
            ,a.fechanac AS fechanac
            ,a.idsexo AS idsexo
            ,a.idstatus AS idstatus
            ,a.fechaalta AS fechaalta
            ,a.fechareg AS fechareg
            ,a.idpropietario AS idpropietario
            ,b.sexo	AS sexo
            ,'false' as mostrar
    FROM ".$conexion->name.".tclientes AS a
    INNER JOIN ".$conexion->name.".tcatsexo AS b ON a.idsexo = b.idsexo
    INNER JOIN ".$conexion->name.".tcatstatus AS c ON a.idstatus = c.idstatus
    WHERE idcliente = '".$filtro."' or nombre like '".$filtro."%' 
    ORDER BY a.idstatus ASC, a.apellidos ASC ";
    
    $jsonDatos = "";
    $jsonDatosContacto = "";
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
        $json = "{\"res\":\"1\", \"msg\":\"CLIENTES OBTENIDOS\", \"datos\":[".$jsonDatos."]}";
    }else{
        $json = "{\"res\":\"0\", \"msg\":\"CONSULTANDO LOS CLIENTES: ".$con->error."\"}";
    }
    
    echo $json;
    
    
?>

