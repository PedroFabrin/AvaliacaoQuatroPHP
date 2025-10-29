<?php
namespace App\Controllers;
use App\Services\LoginService;

class LoginController {
    private LoginService $service;

    public function __construct(){
        $this->service = new LoginService();
    }

    public function index(){
        require __DIR__ . '/../Views/Login/index.php';
    }
    
    public function autenticar(){
        $cpf = $_POST['cpf'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $usuario = $this->service->autenticar($cpf, $senha);

        if($usuario){
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            header('Location: /produtos/index.php');
            exit;
        } else{
            $erro = "Cpf ou Senha inválidos";
            require __DIR__ . "/../Views/Login/index.php";
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: /Login/index.php');
        exit;
    }
}