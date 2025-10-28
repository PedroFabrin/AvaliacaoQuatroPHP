<p><?= isset($categoria) ? "Editar Categoria" : "Criar Categoria" ?></p>

<form method="POST" action="<?= isset($categoria)? '/Programacao-Web-PHP/avaliacao/api/categorias/atualizar': '/Programacao-Web-PHP/avaliacao/api/categorias' ?>">

    <?php if (isset($categoria)): ?>
        <input type="hidden" name="id" value="<?= $categoria[0]['id'] ?>">
    <?php endif; ?>

    <input type="text" name="nome" value="<?= isset($categoria) ? $categoria[0]['nome'] : '' ?>"/>

    <button type="submit"> <?= isset($categoria)? "Atualizar": "Salvar" ?> </button>

</form>
<br/>
<form action="/Programacao-Web-PHP/avaliacao/categorias">
    <button>Voltar</button>
</form>