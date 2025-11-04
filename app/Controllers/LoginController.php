<?php
namespace App\Controllers;
use App\Services\LoginService;

class LoginController {
    private LoginService $service;

    public function __construct(){
        $this->service = new LoginService();
    }

    public function index(){
        $title = "Login";
        $noHeader = true; 

        require __DIR__ . '/../Views/Login/index.php';
    }
    
    public function autenticar(){
        $cpf = $_POST['cpf'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $usuario = $this->service->autenticar($cpf, $senha);

        if($usuario){
            if(!isset($_SESSION['usuario_id'])){
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];   
            }

            header('Location: /produtos');
            exit;
        } else{
            $erro = "Cpf ou Senha inválidos";
            require __DIR__ . "/../Views/Login/index.php";
        }
    }

    public function logout(){
        session_destroy();
        header('Location: /login');
        exit;
    }
}