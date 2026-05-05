<?php

class Cliente {
    
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function obtenerTodos(){
        $st = $this->pdo->prepare("SELECT * FROM clientes");
        $st->execute();
        return($st->fetchAll(PDO::FETCH_ASSOC));
    }

    public function eliminar($idCliente){
        $st = $this->pdo->prepare("DELETE FROM clientes WHERE id_cliente = :idCliente");
        $st->execute([
            ":idCliente" => $idCliente
        ]);
    }

    public function insertar($nombre,$alias){
        $st = $this->pdo->prepare("INSERT INTO clientes VALUES(
            DEFAULT,:nombre,:alias
        )");
        
        $st->execute([
            ":nombre" => $nombre,
            ":alias" => $alias
        ]);

    }

    public function modificar($idCliente,$nombre,$alias){
        $st = $this->pdo->prepare("UPDATE clientes SET
                nombre = :nombre,
                alias = :alias
            WHERE id_cliente = :idCliente");
        $st->execute([
            ":idCliente" => $idCliente,
            ":nombre" => $nombre,
            ":alias" => $alias
        ]);
    }

}

    