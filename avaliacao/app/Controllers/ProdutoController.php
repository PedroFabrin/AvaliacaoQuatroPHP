<?php
    namespace App\Controllers;

    use App\Views\Render;
    use App\Services\ProdutoService;
    use App\Services\CategoriaService;

    class ProdutoController{
        

        //Funções de Views
        public function index(): string{
            $produtoService = new ProdutoService();
            $title = "Produtos";
            $produtos = $produtoService->list();
            return (new Render())->render('produtos/index', compact('title', "produtos"));
        }

        public function criar(): string{
            $categoriaService = new CategoriaService();
            $title = "Criar Produtos";
            $produto = null;

            if (isset($_GET['id'])) {
                $produtoService = new ProdutoService();
                $id = (int) $_GET['id'];
                $produto = $produtoService->list($id);
                $title = "Editar Produto";
            }

            $categorias = $categoriaService->list();
            return (new Render())->render('produtos/criar', compact('title', 'produto', 'categorias'));
        }

        public function ver(int $id): string{
            $produtoService = new ProdutoService();
            $title = "Ver Produtos";
            $produto = $produtoService->list($id);
            return (new Render())->render('produtos/ver', compact('title', 'produto'));
        }

        //Funções de APIs
        public function list(){
            $produtoService = new ProdutoService();

            return $produtoService->list();
        }

        public function create(){
            if(isset($_POST['nome'])){
                $produtoService = new ProdutoService();

                $nome = $_POST['nome'];
                $qtd = (int) $_POST['qtd'];
                $valor = (float) $_POST['valor'];
                $categoria_id = (int) $_POST['categoria_id'];

                $produtoService->create($nome, $qtd, $valor, $categoria_id);
            }
        }

        public function delete(int $id){
            if (isset($_POST['id'])){
                $produtoService = new ProdutoService();
                $int = (int)$_POST['id'];
                $produtoService->delete($id);
            }
        }

        public function update(){
            if (isset($_POST['id'])){
                $produtoService = new ProdutoService();

                $id = (int) $_POST['id'];
                $nome = $_POST['nome'];
                $qtd = (int)$_POST['qtd'];
                $valor = (float)$_POST['valor'];
                $categoria_id = (int)$_POST['categoria_id'];

                $produtoService->update($id, $nome, $qtd, $valor, $categoria_id);
            }
        }
    }
?>