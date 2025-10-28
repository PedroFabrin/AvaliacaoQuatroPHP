<p>Categorias</p>

<ul>
    <?php foreach($categorias as $item): ?>
    <li>
        <a href="/AvaliacaoQuatroPHP/avaliacao/categorias/ver?id=<?= $item['id'] ?>">
        <?= $item['nome'] ?>
        </a>
        <form action="/AvaliacaoQuatroPHP/avaliacao/api/categorias/deletar" method="POST">
            <input type="hidden" name="id" value="<?= $item["id"] ?>"/>
            <button type="submit">Excluir</button>
        </form>
    </li>
    <?php endforeach; ?>
    <br/>
    <form action="/AvaliacaoQuatroPHP/avaliacao/categorias/criar">
        <button>Criar</button>
    </form>
    <form action="/AvaliacaoQuatroPHP/avaliacao/produtos">
        <button>Produtos</button>
    </form>
</ul>