<?php

namespace App\Services;

use App\Config\Database;
use PDO;

class CategoriaService {
    private PDO $db;

    public function __construct() {
        // instaciar a conexão
        $this->db = Database::getConnection();
    }

    public function create(
        string $nome,

    ) {
        // instrução SQL INSERT
        $sql = "INSERT INTO categorias (
            nome
        ) VALUES (:nome)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
        ]);
        return $this->db->lastInsertId();
    }

    public function update(
        int $id,
        string $nome,
    ) {
        // instrução sql UPDATE
        $sql = "UPDATE categorias SET nome = :nome
                    WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete(int $id) {
        // instrução sql DELETE
        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function list(?int $id = null) {
        $where = "";
        if($id) {
            $where = " WHERE id = :id";
        }

        // instrução sql SELECT
        $sql = "SELECT * FROM categorias $where";
        $stmt = $this->db->prepare($sql);

        if ($id) {
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll();
    }

}