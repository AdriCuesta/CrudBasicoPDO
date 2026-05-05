<?php
class Connection {

    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $baseDatos = "tarea_clientes_bd";

    public function getConexion(){

        $dsn = "mysql:host=$this->host;dbname=$this->baseDatos";
        return(new PDO($dsn,$this->usuario,$this->contrasena));

    }
}