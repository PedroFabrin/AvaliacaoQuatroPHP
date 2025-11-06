<!-- Views/Login/index.php -->
<style>
    body {
        padding: 0 !important;  
        margin: 0;
    }

    main {
        margin-top: 0 !important; 
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    button:hover {
        opacity: 0.85;
        transform: scale(1.03);
    }
</style>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;
            background: linear-gradient(135deg, #ffffff, #9e9e9e);">

    <div style="text-align: center; background-color: #ffffff; padding: 40px; border-radius: 12px;
                box-shadow: 0 0 15px rgba(0,0,0,0.15); width: 350px;">

        <p style="font-size: 24px; font-weight: bold; color: #e91e63; margin-bottom: 20px;">
            Login
        </p>

        <?php if (isset($erro)) : ?>
            <p style="color: red; font-weight: bold; margin-bottom: 15px;">
                <?= htmlspecialchars($erro) ?>
            </p>
        <?php endif; ?>

        <form action="/api/login" method="POST">
            <div style="text-align: left; margin-bottom: 15px;">
                <label for="cpf" style="font-weight: 500; color: #555;">CPF:</label><br/>
                <input type="text" id="cpf" name="cpf" required
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; 
                              border-radius: 6px; background-color: #fafafa; margin-top: 5px;">
            </div>

            <div style="text-align: left; margin-bottom: 20px;">
                <label for="senha" style="font-weight: 500; color: #555;">Senha:</label><br/>
                <input type="password" id="senha" name="senha" required
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; 
                              border-radius: 6px; background-color: #fafafa; margin-top: 5px;">
            </div>

            <button type="submit" 
                    style="width: 100%; padding: 10px; background-color: #e91e63; color: white; 
                           border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                Entrar
            </button>
        </form>

        <br/>

        <form action="/usuarios/criar" style="margin-bottom: 10px;">
            <button style="width: 100%; padding: 10px 20px; background-color: #ff4081; color: white; 
                           border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                Criar Usuário
            </button>
        </form>

    </div>
</div>
