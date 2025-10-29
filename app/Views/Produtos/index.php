<p>Produtos</p>

<ul>
    <?php foreach($produtos as $item): ?>
        <li>
            <a href="/produtos/ver?id=<?= $item['id'] ?>">
                <?= $item['nome'] ?> (<?= $item['categoria_nome'] ?>)
            </a>
            <form action="/api/produtos/deletar" method="POST">
                <input type="hidden" name="id" value="<?= $item["id"] ?>"/>
                <button type="submit">Excluir</button>
            </form>
        </li>
    <?php endforeach; ?>
    <br/>
    <form action="/produtos/criar">
        <button>Criar</button>
    </form>
    <form action="/categorias">
        <button>Categorias</button>
    </form>
</ul>
