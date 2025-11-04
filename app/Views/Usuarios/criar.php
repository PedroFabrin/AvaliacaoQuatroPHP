<style>
    body {
        padding: 0 !important;  
        margin: 0;
    }

    main {
        margin-top: 0 !important; 
       
    }

    button:hover {
        opacity: 0.85;
        transform: scale(1.03);
    }
</style>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;
            background: linear-gradient(135deg, #e91e63, #9e9e9e);">

    <div style="text-align: center; background-color: #ffffff; padding: 30px; border-radius: 12px;
                box-shadow: 0 0 15px rgba(0,0,0,0.15); width: 400px;">

        <p style="font-size: 22px; color: #e91e63; font-weight: bold; margin-bottom: 20px;">
            <?= isset($usuario) ? "Editar Usuário" : "Criar Usuário" ?>
        </p>

        <form method="POST" action="<?= isset($usuario) ? '/api/usuarios/atualizar' : '/api/usuarios' ?>">
            
            <?php if (isset($usuario)): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario[0]['id']) ?>">
            <?php endif; ?>

            <div style="text-align: left; margin-bottom: 10px;">
                <label><strong>Nome</strong></label><br/>
                <input type="text" name="nome" 
                    value="<?= isset($usuario) ? htmlspecialchars($usuario[0]['nome']) : '' ?>"
                    style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <div style="text-align: left; margin-bottom: 10px;">
                <label for="cpf"><strong>CPF</strong></label><br/>
                <input type="text" id="cpf" name="cpf" maxlength="14"
                    pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" 
                    title="Digite o CPF no formato 000.000.000-00"
                    value="<?= isset($usuario) ? htmlspecialchars($usuario[0]['cpf']) : '' ?>"
                    required
                    style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <div style="text-align: left; margin-bottom: 15px;">
                <label><strong>Senha</strong></label><br/>
                <input type="password" name="senha" 
                    value="<?= isset($usuario) ? htmlspecialchars($usuario[0]['senha']) : '' ?>"
                    style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <button type="submit" 
                style="padding: 10px 20px; background-color: #e91e63; color: white; border: none;
                       border-radius: 6px; cursor: pointer; transition: 0.3s; margin-right: 10px;">
                <?= isset($usuario) ? "Atualizar" : "Salvar" ?>
            </button>
        </form>

        <form action="/login" style="display: inline-block; margin-top: 15px;">
            <button style="padding: 10px 20px; background-color: #9e9e9e; color: white;
                           border: none; border-radius: 6px; cursor: pointer; transition: 0.3s; margin-right: 10px">
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
