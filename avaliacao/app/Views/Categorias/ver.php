<div>
    <?php if(empty($categoria)): ?>
        <p>Categoria Não Encontrada!</p>
    <?php else: $cat =$categoria[0] ?>
        <h2>Categoria #<?= $cat['id'] ?></h2>  
        <p>Nome: <?= $cat['nome'] ?></p>  
    <?php endif; ?>
    <br/>
    <form action="/Programacao-Web-PHP/avaliacao/categorias/criar" method="GET">
        <input type="hidden" name="id" value="<?= $cat['id'] ?>">
        <button>Editar</button>
    </form>
    <form action="/Programacao-Web-PHP/avaliacao/categorias">
        <button>Voltar</button>
    </form>
</div>