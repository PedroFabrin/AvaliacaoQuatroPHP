<p><?= isset($categoria) ? "Editar Categoria" : "Criar Categoria" ?></p>

<form method="POST" action="<?= isset($categoria)? '/AvaliacaoQuatroPHP/avaliacao/api/categorias/atualizar': '/AvaliacaoQuatroPHP/avaliacao/api/categorias' ?>">

    <?php if (isset($categoria)): ?>
        <input type="hidden" name="id" value="<?= $categoria[0]['id'] ?>">
    <?php endif; ?>

    <input type="text" name="nome" value="<?= isset($categoria) ? $categoria[0]['nome'] : '' ?>"/>

    <button type="submit"> <?= isset($categoria)? "Atualizar": "Salvar" ?> </button>

</form>
<br/>
<form action="/AvaliacaoQuatroPHP/avaliacao/categorias">
    <button>Voltar</button>
</form>