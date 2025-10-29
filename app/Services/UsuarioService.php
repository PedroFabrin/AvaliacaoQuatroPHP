<?php

namespace App\Services;

use App\Config\Database;
use PDO;
use Exception;

class UsuarioService {

    private $db;

    public function __construct() {
        // instanciar a conexão
        $this->db = Database::getConnection();
    }

    /**
     * Função para validar CPF
     */
    private function validarCPF(string $cpf): bool {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se tem 11 dígitos
        if (strlen($cpf) != 11) return false;

        // Elimina CPFs com todos os dígitos iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        // Validação dos dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) return false;
        }

        return true;
    }

    /**
     * Cria um novo usuário
     */
    public function create(
        string $nome,
        string $cpf,
        string $senha
    ) {
        // Valida CPF antes de inserir
        if (!$this->validarCPF($cpf)) {
            throw new Exception("CPF inválido.");
        }

        $sql = "INSERT INTO usuario (
            nome, cpf, senha
        ) VALUES (:nome, :cpf, :senha)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':senha' => password_hash($senha, PASSWORD_BCRYPT) // segurança extra
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * Atualiza um usuário existente
     */
    public function update(
        int $id,
        string $nome,
        string $cpf,
        string $senha
    ) {
        // Valida CPF antes de atualizar
        if (!$this->validarCPF($cpf)) {
            throw new Exception("CPF inválido.");
        }

        $sql = "UPDATE usuario 
                SET nome = :nome,
                    cpf = :cpf,
                    senha = :senha
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':senha' => password_hash($senha, PASSWORD_BCRYPT),
            ':id' => $id
        ]);
    }

    /**
     * Exclui um usuário
     */
    public function delete(int $id) {
        $sql = "DELETE FROM usuario WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Lista usuários (todos ou por ID)
     */
    public function list(?int $id = null) {
        $where = "";
        if ($id) {
            $where = " WHERE u.id = :id";
        }

        $sql = "SELECT u.* 
                FROM usuario u
                $where";

        $stmt = $this->db->prepare($sql);

        if ($id) {
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
