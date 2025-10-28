<div>
    <?php if(!$produto): ?>
        <p>Produto Não Encontrado!</p>
    <?php else: ?>
        <h2>Produto #<?= $produto[0]['id'] ?></h2>  
        <p>Nome: <?= $produto[0]['nome'] ?></p>  
        <p>Quantidade: <?= $produto[0]['quantidade'] ?></p>
        <p>Valor: <?= $produto[0]['valor'] ?></p>
        <p>Categoria: <?= $produto[0]['categoria_nome'] ?></p>
    <?php endif; ?>
    <br/>
    <form action="/AvaliacaoQuatroPHP/avaliacao/produtos/criar" method="GET">
        <input type="hidden" name="id" value="<?= $produto[0]['id'] ?>">
        <button>Editar</button>
    </form>
    <form action="/AvaliacaoQuatroPHP/avaliacao/produtos">
        <button>Voltar</button>
    </form>
</div>
