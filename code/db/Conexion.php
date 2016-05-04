<?php

/*
 * Clase de conexion con la base de datos
 */

    class Conexion {
//        public $host = "localhost";
//        public $port = "3306";
//        public $user = "root";
//        public $pass = "";
//        public $name = "dwrentas";
        
        public $host = "mysql1.000webhost.com";
        public $port = "3306";
        public $user = "a9102384_dwrenta";
        public $pass = "S02006480d1";
        public $name = "a9102384_dwrenta";
        
        
//        function creaConexion(){
//            return new mysqli($this->host.":".$this->port
//                    , $this->user
//                    , $this->pass
//                    , $this->name);
//        }
        function creaConexion(){
            return new mysqli($this->host
                    , $this->user
                    , $this->pass
                    , $this->name);
        }
        
    }

?>