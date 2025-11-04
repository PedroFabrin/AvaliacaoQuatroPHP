<div style="display: flex; justify-content: center; align-items: center; height: 100vh; 
            background: linear-gradient(135deg, #e91e63, #9e9e9e);">

    <div style="text-align: center; background-color: #ffffff; padding: 30px; border-radius: 12px; 
                box-shadow: 0 0 15px rgba(0,0,0,0.15); width: 350px;">
        
        <p style="font-size: 22px; font-weight: bold; color: #e91e63; margin-bottom: 20px;">
            <?= isset($categoria) ? "Editar Categoria" : "Criar Categoria" ?>
        </p>

        <form method="POST" action="<?= isset($categoria)? '/api/categorias/atualizar': '/api/categorias' ?>">
            <?php if (isset($categoria)): ?>
                <input type="hidden" name="id" value="<?= $categoria[0]['id'] ?>">
            <?php endif; ?>

            <input type="text" 
                name="nome" 
                value="<?= isset($categoria) ? $categoria[0]['nome'] : '' ?>" 
                placeholder="Nome da categoria"
                style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; 
                       border-radius: 6px; background-color: #fafafa;"/>

            <button type="submit" 
                style="width: 100%; padding: 10px; background-color: #e91e63; color: white; 
                       border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                <?= isset($categoria)? "Atualizar": "Salvar" ?>
            </button>
        </form>

        <br/>

        <form action="/categorias">
            <button 
                style="padding: 10px 20px; background-color: #9e9e9e; color: white; border: none; 
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
