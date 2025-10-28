<p><?= isset($produto) ? "Editar Produto" : "Criar Produto" ?></p>

<form method="POST" action="<?= isset($produto) ? '/AvaliacaoQuatroPHP/avaliacao/api/produtos/atualizar' : '/AvaliacaoQuatroPHP/avaliacao/api/produtos' ?>">
    
    <?php if (isset($produto)): ?>
        <input type="hidden" name="id" value="<?= $produto[0]['id'] ?>">
    <?php endif; ?>

    <label>Nome</label>
    <input type="text" name="nome" value="<?= isset($produto) ? htmlspecialchars($produto[0]['nome']) : '' ?>" />
    <br/>

    <label>Quantidade</label>
    <input type="number" name="qtd" value="<?= isset($produto) ? $produto[0]['quantidade'] : '' ?>" />
    <br/>

    <label>Valor</label>
    <input type="number" step="0.01" name="valor" value="<?= isset($produto) ? $produto[0]['valor'] : '' ?>" />
    <br/>

    <label>Categoria</label>
    <select name="categoria_id">
        <?php foreach($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= isset($produto) && $produto[0]['categoria_id'] == $cat['id'] ? 'selected' : '' ?>>
                <?= $cat['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br/>

    <button type="submit"><?= isset($produto) ? "Atualizar" : "Salvar" ?></button>
</form>

<br/>
<form action="/AvaliacaoQuatroPHP/avaliacao/produtos">
    <button>Voltar</button>
</form>
