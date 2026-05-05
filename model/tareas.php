<?php

class Tarea {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodas(){
        $st = $this->pdo->prepare("SELECT * FROM tareas");
        $st->execute();
        return($st->fetchAll(PDO::FETCH_ASSOC));
    }

    public function eliminar($idTarea){
        $st = $this->pdo->prepare("DELETE FROM tareas WHERE id_tarea = :idTarea");
        $st->bindParam(":idTarea",$idTarea,PDO::PARAM_INT);
        $st->execute();
    }

    public function insertar($fechaPeticion,$horaPeticion,$idCliente,$tarea,$estado,$prioridad,$fechaFinalizacion,$personaPeticion){
        $st = $this->pdo->prepare("INSERT INTO tareas VALUES(
            DEFAULT,:fechaPeticion,:horaPeticion,:idCliente,:tarea,:estado,:prioridad,:fechaFinalizacion,:personaPeticion
        )");

        $st->bindParam(":fechaPeticion",$fechaPeticion,PDO::PARAM_STR);
        $st->bindParam(":horaPeticion",$horaPeticion,PDO::PARAM_STR);
        $st->bindParam(":idCliente",$idCliente,PDO::PARAM_INT);
        $st->bindParam(":tarea",$tarea,PDO::PARAM_STR);
        $st->bindParam(":estado",$estado,PDO::PARAM_INT);
        $st->bindParam(":prioridad",$prioridad,PDO::PARAM_INT);
        $st->bindParam(":fechaFinalizacion",$fechaFinalizacion,PDO::PARAM_STR);
        $st->bindParam(":personaPeticion",$personaPeticion,PDO::PARAM_STR);

        $st->execute();

        /**
         * También se puede bindear de la siguiente forma:
         * 
         *  $st->execute([
         *      ":fechaPeticion" => $fechaPeticion,
         *      ":horaPeticion" => $horaPeticion,
         *      ":idCliente" => $idCliente,
         *      ":tarea" => $tarea,
         *      ":estado" => $estado,
         *      ":prioridad" => $prioridad,
         *      ":fechaFinalizacion" => $fechaFinalizacion,
         *      ":personaPeticion" => $personaPeticion
         * ]);
         */

    }

    public function modificar($idTarea,$fechaPeticion,$horaPeticion,$idCliente,$tarea,$estado,$prioridad,$fechaFinalizacion,$personaPeticion){
        $st = $this->pdo->prepare("UPDATE tareas SET
            fecha_peticion = :fechaPeticion,
            hora_peticion = :horaPeticion,
            id_cliente = :idCliente,
            tarea = :tarea,
            estado = :estado,
            prioridad = :prioridad,
            fecha_finalizacion = :fechaFinalizacion,
            persona_peticion = :personaPeticion

            WHERE id_tarea = :idTarea
            ");

        $st->bindParam(":idTarea",$idTarea,PDO::PARAM_INT);
        $st->bindParam(":fechaPeticion",$fechaPeticion,PDO::PARAM_STR);
        $st->bindParam(":horaPeticion",$horaPeticion,PDO::PARAM_STR);
        $st->bindParam(":idCliente",$idCliente,PDO::PARAM_INT);
        $st->bindParam(":tarea",$tarea,PDO::PARAM_STR);
        $st->bindParam(":estado",$estado,PDO::PARAM_INT);
        $st->bindParam(":prioridad",$prioridad,PDO::PARAM_INT);
        $st->bindParam(":fechaFinalizacion",$fechaFinalizacion,PDO::PARAM_STR);
        $st->bindParam(":personaPeticion",$personaPeticion,PDO::PARAM_STR);

        $st->execute();
    }

}