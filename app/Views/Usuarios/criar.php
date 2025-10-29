<p><?= isset($usuario) ? "Editar Usuario" : "Criar Usuario" ?></p>

<form method="POST" action="<?= isset($usuario) ? '/api/usuarios/atualizar' : '/api/usuarios' ?>">
    
    <?php if (isset($usuario)): ?>
        <input type="hidden" name="id" value="<?= $usuario[0]['id'] ?>">
    <?php endif; ?>

    <label>Nome</label>
    <input type="text" name="nome" value="<?= isset($usuario) ? htmlspecialchars($usuario[0]['nome']) : '' ?>" />
    <br/>

    <label for="cpf">CPF</label>
    <input 
        type="text" 
        id="cpf" 
        name="cpf" 
        maxlength="14"
        pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" 
        title="Digite o CPF no formato 000.000.000-00"
        value="<?= isset($usuario) ? htmlspecialchars($usuario[0]['cpf']) : '' ?>" 
        required
    />
    <br/>
    <!-- <script>
    document.getElementById('cpf').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // remove tudo que não for número
        if (value.length > 11) value = value.slice(0, 11);
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        e.target.value = value;
    });
    </script> -->



    <label>Senha</label>
    <input type="password"  name="senha" value="<?= isset($usuario) ? $usuario[0]['senha'] : '' ?>" />
    <br/>

    <button type="submit"><?= isset($usuario) ? "Atualizar" : "Salvar" ?></button>
</form>

<br/>
<form action="/produtos">
    <button>Voltar</button>
</form>
