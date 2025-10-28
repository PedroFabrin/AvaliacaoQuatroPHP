<?php
    namespace App\Views;

    class Render{
        function render(string $view, array $params = []){
            //Extrair Parametros para Variáveis
            extract($params);

            //Start Cach
            ob_start();

            //Chamar Arquivos Views
            require __DIR__ . "/$view.php";

            //Colocar Conteudo da View dentro de Variável
            $conteudo = ob_get_clean();

            ob_start();

            //Renderizando a Master Page
            require __DIR__ . "/layout.php";
            return ob_get_clean();
        }
    }
?>