<!-- Views/Login/index.php -->
<p>Login</p>

<?php if (isset($erro)) : ?>
    <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form action="/Login/autenticar" method="POST">
    <label for="cpf">CPF:</label><br/>
    <input type="text" id="cpf" name="cpf" required><br/><br/>

    <label for="senha">Senha:</label><br/>
    <input type="password" id="senha" name="senha" required><br/><br/>

    <button type="submit">Entrar</button>
</form>

<br/>

<form action="/Produtos/index">
    <button>Voltar para Produtos</button>
</form>
