<div style="display: flex; justify-content: center; align-items: center; height: 100vh;
            background: linear-gradient(135deg, #e91e63, #9e9e9e);">

    <div style="text-align: center; background-color: #ffffff; padding: 30px; border-radius: 12px;
                box-shadow: 0 0 15px rgba(0,0,0,0.15); width: 350px;">

        <?php if(empty($categoria)): ?>
            <p style="font-size: 20px; font-weight: bold; color: #e91e63;">
                Categoria Não Encontrada!
            </p>
        <?php else: $cat = $categoria[0]; ?>
            <h2 style="color: #e91e63; margin-bottom: 15px;">
                Categoria #<?= htmlspecialchars($cat['id']) ?>
            </h2>
            <p style="font-size: 18px; color: #333; margin-bottom: 20px;">
                Nome: <strong><?= htmlspecialchars($cat['nome']) ?></strong>
            </p>

            <form action="/categorias/criar" method="GET" style="margin-bottom: 10px;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($cat['id']) ?>">
                <button style="padding: 10px 20px; background-color: #e91e63; color: white; 
                               border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                    Editar
                </button>
            </form>
        <?php endif; ?>

        <form action="/categorias">
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
