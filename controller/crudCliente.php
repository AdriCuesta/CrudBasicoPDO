<?php
require_once("../model/clientes.php");
require_once("connection.php");

$conexion = new Connection();
$modeloCliente = new Cliente($conexion->getConexion());

if(isset($_POST['insertar-cliente'])){
    $modeloCliente->insertar($_POST['nombre'],$_POST['alias']);
}
if(isset($_POST['modificar-cliente'])){
    $modeloCliente->modificar($_POST['id'],$_POST['nombre'],$_POST['alias']);
}
if(isset($_POST['eliminar-cliente'])){
    $modeloCliente->eliminar($_POST['id']);
}


header("Location: ../view/index.php");
exit;