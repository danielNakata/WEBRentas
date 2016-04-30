<?php

/*
 * Clase de conexion con la base de datos
 */

    class Conexion {
        public $host = "localhost";
        public $port = "3306";
        public $user = "root";
        public $pass = "";
        public $name = "dwrentas";
        
        
        function creaConexion(){
            return new mysqli($this->host.":".$this->port
                    , $this->user
                    , $this->pass
                    , $this->name);
        }
        
    }

?>