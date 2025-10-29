<p>Categorias</p>

<ul>
    <?php foreach($categorias as $item): ?>
    <li>
        <a href="/categorias/ver?id=<?= $item['id'] ?>">
        <?= $item['nome'] ?>
        </a>
        <form action="/api/categorias/deletar" method="POST">
            <input type="hidden" name="id" value="<?= $item["id"] ?>"/>
            <button type="submit">Excluir</button>
        </form>
    </li>
    <?php endforeach; ?>
    <br/>
    <form action="/categorias/criar">
        <button>Criar</button>
    </form>
    <form action="/produtos">
        <button>Produtos</button>
    </form>
</ul>