<p>Categorias</p>

<ul>
    <?php foreach($categorias as $item): ?>
    <li>
        <a href="/Programacao-Web-PHP/avaliacao/categorias/ver?id=<?= $item['id'] ?>">
        <?= $item['nome'] ?>
        </a>
        <form action="/Programacao-Web-PHP/avaliacao/api/categorias/deletar" method="POST">
            <input type="hidden" name="id" value="<?= $item["id"] ?>"/>
            <button type="submit">Excluir</button>
        </form>
    </li>
    <?php endforeach; ?>
    <br/>
    <form action="/Programacao-Web-PHP/avaliacao/categorias/criar">
        <button>Criar</button>
    </form>
    <form action="/Programacao-Web-PHP/avaliacao/produtos">
        <button>Produtos</button>
    </form>
</ul>