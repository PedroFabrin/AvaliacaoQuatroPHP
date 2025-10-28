<p>Produtos</p>

<ul>
    <?php foreach($produtos as $item): ?>
        <li>
            <a href="/AvaliacaoQuatroPHP/avaliacao/produtos/ver?id=<?= $item['id'] ?>">
                <?= $item['nome'] ?> (<?= $item['categoria_nome'] ?>)
            </a>
            <form action="/AvaliacaoQuatroPHP/avaliacao/api/produtos/deletar" method="POST">
                <input type="hidden" name="id" value="<?= $item["id"] ?>"/>
                <button type="submit">Excluir</button>
            </form>
        </li>
    <?php endforeach; ?>
    <br/>
    <form action="/AvaliacaoQuatroPHP/avaliacao/produtos/criar">
        <button>Criar</button>
    </form>
    <form action="/AvaliacaoQuatroPHP/avaliacao/categorias">
        <button>Categorias</button>
    </form>
</ul>
