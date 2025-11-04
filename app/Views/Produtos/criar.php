<div style="display: flex; justify-content: center; align-items: center; height: 100vh;
            background: linear-gradient(135deg, #e91e63, #9e9e9e);">

    <div style="text-align: center; background-color: #ffffff; padding: 40px; border-radius: 12px;
                box-shadow: 0 0 15px rgba(0,0,0,0.15); width: 400px;">

        <p style="font-size: 24px; font-weight: bold; color: #e91e63; margin-bottom: 20px;">
            <?= isset($produto) ? "Editar Produto" : "Criar Produto" ?>
        </p>

        <form method="POST" action="<?= isset($produto) ? '/api/produtos/atualizar' : '/api/produtos' ?>">

            <?php if (isset($produto)): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($produto[0]['id']) ?>">
            <?php endif; ?>

            <div style="text-align: left; margin-bottom: 15px;">
                <label style="font-weight: 500; color: #555;">Nome:</label>
                <input type="text" name="nome"
                       value="<?= isset($produto) ? htmlspecialchars($produto[0]['nome']) : '' ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ccc;
                              border-radius: 6px; background-color: #fafafa; margin-top: 5px;" required>
            </div>

            <div style="text-align: left; margin-bottom: 15px;">
                <label style="font-weight: 500; color: #555;">Quantidade:</label>
                <input type="number" name="qtd"
                       value="<?= isset($produto) ? htmlspecialchars($produto[0]['quantidade']) : '' ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ccc;
                              border-radius: 6px; background-color: #fafafa; margin-top: 5px;" required>
            </div>

            <div style="text-align: left; margin-bottom: 15px;">
                <label style="font-weight: 500; color: #555;">Valor:</label>
                <input type="number" step="0.01" name="valor"
                       value="<?= isset($produto) ? htmlspecialchars($produto[0]['valor']) : '' ?>"
                       style="width: 100%; padding: 10px; border: 1px solid #ccc;
                              border-radius: 6px; background-color: #fafafa; margin-top: 5px;" required>
            </div>

            <div style="text-align: left; margin-bottom: 20px;">
                <label style="font-weight: 500; color: #555;">Categoria:</label>
                <select name="categoria_id"
                        style="width: 100%; padding: 10px; border: 1px solid #ccc;
                               border-radius: 6px; background-color: #fafafa; margin-top: 5px;" required>
                    <?php foreach($categorias as $cat): ?>
                        <option value="<?= htmlspecialchars($cat['id']) ?>" 
                            <?= isset($produto) && $produto[0]['categoria_id'] == $cat['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit"
                    style="width: 100%; padding: 10px; background-color: #e91e63; color: white;
                           border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                <?= isset($produto) ? "Atualizar" : "Salvar" ?>
            </button>
        </form>

        <br/>

        <form action="/produtos">
            <button style="padding: 10px 20px; background-color: #9e9e9e; color: white; border: none;
                           border-radius: 6px; cursor: pointer; transition: 0.3s;">
                Voltar
            </button>
        </form>
    </div>
</div>

<style>
    button:hover {
        opacity: 0.85;
        transform: scale(1.03);
    }
</style>
