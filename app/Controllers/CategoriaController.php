<?php
    namespace App\Controllers;

    use App\Views\Render;
    use App\Services\CategoriaService;

    class CategoriaController{
        //Funções de Views
        public function index(): string{
            $categoriaService = new CategoriaService();
            $title = "Categorias";
            $categorias = $categoriaService->list();
            return (new Render())->render('categorias/index', compact('title', "categorias"));
        }

        public function criar(): string{
            $title = "Criar Categorias";
            $categoria = null;

            if (isset($_GET['id'])) {
                $categoriaService = new CategoriaService();
                $id = (int) $_GET['id'];
                $categoria = $categoriaService->list($id);
                $title = "Editar Categoria";
            }
            return (new Render())->render('categorias/criar', compact('title', 'categoria'));
        }

        public function ver(int $id): string{
            $categoriaService = new CategoriaService();
            $title = "Ver Categorias";
            $categoria = $categoriaService->list($id);
            return (new Render())->render('categorias/ver', compact('title', 'categoria'));
        }

        //Funções de APIs
        public function list(){
            $categoriaService = new CategoriaService();

            return $categoriaService->list();
        }

        public function create(){
            if(isset($_POST['nome'])){
                $categoriaService = new CategoriaService();

                $nome = $_POST['nome'];

                $categoriaService->create($nome);
            }
        }

        public function delete(int $id){
            $categoriaService = new CategoriaService();

            $categoriaService->delete($id);
        }

        public function update(){
            if(isset($_POST['nome'])){
                $categoriaService = new CategoriaService();

                $id = $_POST['id'];
                $nome = $_POST['nome'];

                $categoriaService->update($id, $nome);
            }
        }
    }
?>