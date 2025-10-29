<?php

namespace App\Services;

use App\Config\Database;
use PDO;

class ProdutoService {
    private PDO $db;

    public function __construct() {
        // instaciar a conexão
        $this->db = Database::getConnection();
    }

    // CRUD
    public function create(
        string $nome,
        int $qtd,
        float $valor,
        int $categoria_id,
    ) {
        // instrução SQL INSERT
        $sql = "INSERT INTO produtos (
            nome, quantidade, valor, categoria_id
        ) VALUES (:nome, :qtd, :valor, :categoria_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':qtd' => $qtd,
            ':valor' => $valor,
            ':categoria_id' => $categoria_id
        ]);
        return $this->db->lastInsertId();
    }

    public function update(
        int $id,
        string $nome,
        int $qtd,
        float $valor,
        int $categoria_id
    ) {
        // instrução sql UPDATE
        $sql = "UPDATE produtos SET nome = :nome,
                    quantidade = :qtd, valor = :valor, categoria_id = :categoria_id 
                    WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        // passar parametros
        return $stmt->execute([
            ':nome' => $nome,
            ':qtd' => $qtd,
            ':valor' => $valor,
            ':categoria_id' => $categoria_id,
            ':id' => $id
        ]);

    }

    public function delete(int $id) {
        // instrução sql DELETE
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function list(?int $id = null) {
        $where = "";
        if($id) {
            $where = " WHERE p.id = :id";
        }

        // instrução sql SELECT
        $sql = "SELECT p.*, c.nome AS categoria_nome FROM produtos p JOIN categorias c ON c.id = p.categoria_id $where";
        $stmt = $this->db->prepare($sql);

        if ($id) {
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll();
    }
}