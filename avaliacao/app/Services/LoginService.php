<?php
namespace App\Services;

use App\Config\Database;
use PDO;

class LoginService{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function autenticar(string $cpf, string $senha){
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        $sql = "SELECT * FROM usuarios WHERE REPLACE(REPLACE(REPLACE(cpf, '.', ''), '-', ''), ' ', '') = :cpf LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario && password_verify($senha, $usuario['senha'])){
            return $usuario;
        }
        return null;
    }
}