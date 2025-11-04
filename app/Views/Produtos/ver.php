<div style="display: flex; justify-content: center; align-items: center; height: 100vh;
            background: linear-gradient(135deg, #e91e63, #9e9e9e);">

    <div style="text-align: center; background-color: #ffffff; padding: 30px; border-radius: 12px;
                box-shadow: 0 0 15px rgba(0,0,0,0.15); width: 400px;">

        <?php if(!$produto): ?>
            <p style="font-size: 20px; color: #e91e63; font-weight: bold;">Produto Não Encontrado!</p>
        <?php else: ?>
            <h2 style="color: #e91e63; margin-bottom: 20px;">
                Produto #<?= htmlspecialchars($produto[0]['id']) ?>
            </h2>

            <p><strong>Nome:</strong> <?= htmlspecialchars($produto[0]['nome']) ?></p>
            <p><strong>Quantidade:</strong> <?= htmlspecialchars($produto[0]['quantidade']) ?></p>
            <p><strong>Valor:</strong> R$ <?= number_format($produto[0]['valor'], 2, ',', '.') ?></p>
            <p><strong>Categoria:</strong> <?= htmlspecialchars($produto[0]['categoria_nome']) ?></p>
        <?php endif; ?>

        <br/>

        <form action="/produtos/criar" method="GET" style="display: inline-block; margin-right: 10px;">
            <input type="hidden" name="id" value="<?= htmlspecialchars($produto[0]['id'] ?? '') ?>">
            <button style="padding: 10px 20px; background-color: #e91e63; color: white;
                           border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                Editar
            </button>
        </form>

        <form action="/produtos" style="display: inline-block;">
            <button style="padding: 10px 20px; background-color: #9e9e9e; color: white;
                           border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
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

    p {
        color: #333;
        margin: 8px 0;
    }
</style>
