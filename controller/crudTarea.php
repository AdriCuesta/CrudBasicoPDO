<?php
require_once("../model/tareas.php");
require_once("connection.php");

$conexion = new Connection();
$modeloTarea = new Tarea($conexion->getConexion());

if(isset($_POST['insertar-tarea'])){
    date_default_timezone_set("Europe/Madrid");
    $modeloTarea->insertar(
        date('Y-m-d'),
        date('H:i:s'),
        $_POST['id_cliente'],
        $_POST['tarea'],
        $_POST['estado'],
        $_POST['prioridad'],
        $_POST['fecha_finalizacion'],
        $_POST['persona_peticion']
    );
}
if(isset($_POST['modificar-tarea'])){
    $modeloTarea->modificar(
        $_POST['id_tarea'],
        $_POST['fecha_peticion'],
        $_POST['hora_peticion'],
        $_POST['id_cliente'],
        $_POST['tarea'],
        $_POST['estado'],
        $_POST['prioridad'],
        $_POST['fecha_finalizacion'],
        $_POST['persona_peticion']
    );
}
if(isset($_POST['eliminar-tarea'])){
    $modeloTarea->eliminar($_POST['id_tarea']);
}


header("Location: ../view/index.php");
exit;