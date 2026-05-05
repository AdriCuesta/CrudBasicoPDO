<?php

require_once('../model/tareas.php');
require_once('../model/clientes.php');
require_once('../controller/connection.php');

function escribirRegistros($registros){
  foreach($registros as $registro){
    echo "<tr> ";
    foreach($registro as $valorColumna){
      echo "<td>$valorColumna</td>";
    } 
    echo "</tr>";
            
  }
}

$conexion = new Connection();
$pdo = $conexion->getConexion();

$modeloTarea = new Tarea($pdo);
$modeloCliente = new Cliente($pdo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDconPDO</title>
</head>

<body>

    <div>
        <h3>REGISTRO DE USUARIOS</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Alias</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  escribirRegistros($modeloCliente->obtenerTodos());
                ?>
                <tr>
                    <form action="../controller/crudCliente.php" method="post">
                        <th>
                            <select name="id">
                                <?php
                                foreach ($modeloCliente->obtenerTodos() as $cliente) {
                                    echo "<option value='" . $cliente['id_cliente'] . "'>" . $cliente['id_cliente'] . " - " . $cliente['alias'] . "</option>";
                                }
                            ?>
                            </select>
                        </th>
                        <th>
                            <input type="text" name="nombre">
                        </th>
                        <th>
                            <input type="text" name="alias">
                        </th>
                        <th>
                            <button type="submit" name="insertar-cliente">Añadir</button>
                        </th>
                        <th>
                            <button type="submit" name="modificar-cliente">Modificar</button>
                        </th>
                        <th>
                            <button type="submit" name="eliminar-cliente">Eliminar</button>
                        </th>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h3>REGISTRO DE TAREAS</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha de peticion</th>
                    <th scope="col">Hora de peticion</th>
                    <th scope="col">ID del cliente</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Fecha de finalización</th>
                    <th scope="col">Peticion de la persona</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  escribirRegistros($modeloTarea->obtenerTodas());
                  ?>
                <tr>
                    <form action="../controller/crudTarea.php" method="post">
                        <th>
                            <select name="id">
                                <?php
                                    foreach ($modeloTarea->obtenerTodas() as $tarea) {
                                        echo "<option value='" . $tarea['id_tarea'] . "'>" . $tarea['id_tarea'] . "</option>";
                                    }
                                ?>
                            </select>
                        </th>
                        <th>
                            <input type="date" name="fecha_peticion">
                        </th>
                        <th>
                            <input type="time" name="hora_peticion">
                        </th>
                        <th>
                            <select name="id_cliente">
                                <?php
                                    foreach ($modeloCliente->obtenerTodos() as $cliente) {
                                        echo "<option value='" . $cliente['id_cliente'] . "'>" . $cliente['id_cliente'] . " - " . $cliente['alias'] . "</option>";
                                    }
                                ?>
                            </select>
                        </th>
                        <th>
                            <input type="text" name="tarea">
                        </th>
                        <th>
                            <input type="Number" name="estado">
                        </th>
                        <th>
                            <input type="Number" name="prioridad">
                        </th>
                        <th>
                            <input type="date" name="fecha_finalizacion">
                        </th>
                        <th>
                            <input type="Text" name="persona_peticion">
                        </th>
                        <th>
                            <button type="submit" name="insertar-tarea">Añadir</button>
                        </th>
                        <th>
                            <button type="submit" name="modificar-tarea">Modificar</button>
                        </th>
                        <th>
                            <button type="submit" name="eliminar-tarea">Eliminar</button>
                        </th>
                    </form>
                </tr>
            </tbody>
        </table>



    </div>

</body>

</html>