<?php
 namespace App\Controllers;

 use App\Views\Render;
 use App\Services\UsuarioService;
 use App\Controllers\LoginController;

 class UsuarioController{

    public function criar(): string{
        $title = "Criar Usuarios";
        $noHeader = true; 
        return (new Render())->render('usuarios/criar', compact('title', 'noHeader'));
    }

    public function ver(int $id): string{
        $usuarioService = new UsuarioService();
        $title = "Ver Usuários";
        $usuario = $usuarioService->list($id);
        return (new Render())->render('usuarios/ver', compact('title', 'usuario'));
    }

    //Funções de APIs
    public function list(){
        $usuarioService = new UsuarioService();

        return $usuarioService->list();
    }

    public function create(){
        if(isset($_POST['nome'])){
            $usuarioService = new UsuarioService();

            $nome = $_POST['nome'];
            $cpf =  $_POST['cpf'];
            $senha =  $_POST['senha'];

            $usuarioService->create($nome, $cpf, $senha);
        }
    }

    public function delete(int $id){
        if (isset($_POST['id'])){
            $usuarioService = new UsuarioService();
            $int = (int)$_POST['id'];
            $usuarioService->delete($id);
        }
    }

    public function update(){
        if (isset($_POST['id'])){
            $usuarioService = new UsuarioService();

            $id = (int) $_POST['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];

            $usuarioService->update($id, $nome, $cpf, $senha);
        }
    }

    public function sair(){
        $loginController = new LoginController();
        $loginController->logout();
    }

}
?>