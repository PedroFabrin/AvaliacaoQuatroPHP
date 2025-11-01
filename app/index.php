<div style="display: flex; justify-content: center; align-items: center; height: 100vh;
            background: linear-gradient(135deg, #e91e63, #9e9e9e);">

    <div style="text-align: center; background-color: #ffffff; padding: 30px; border-radius: 12px;
                box-shadow: 0 0 15px rgba(0,0,0,0.15); width: 400px;">

        <p style="font-size: 24px; font-weight: bold; color: #e91e63; margin-bottom: 20px;">
            Produtos
        </p>

        <ul style="list-style: none; padding: 0; margin: 0;">
            <?php foreach($produtos as $item): ?>
                <li style="margin-bottom: 15px; background-color: #f7f7f7; padding: 10px; border-radius: 8px;">
                    <a href="/produtos/ver?id=<?= $item['id'] ?>"
                       style="text-decoration: none; color: #333; font-weight: 500;">
                        <?= htmlspecialchars($item['nome']) ?> 
                        <span style="color: #777;">(<?= htmlspecialchars($item['categoria_nome']) ?>)</span>
                    </a>

                    <form action="/api/produtos/deletar" method="POST" style="margin-top: 8px;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>"/>
                        <button type="submit"
                                style="padding: 8px 16px; background-color: #e91e63; color: white;
                                       border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                            Excluir
                        </button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>

        <br/>

        <form action="/produtos/criar" style="display: inline-block; margin-right: 10px;">
            <button style="padding: 10px 20px; background-color: #e91e63; color: white;
                           border: none; border-radius: 6px; cursor: pointer; transition: 0.3s; margin-left: 10px">
                Criar
            </button>
        </form>

    </div>
</div>

<style>
    button:hover {
        opacity: 0.85;
        transform: scale(1.03);
    }

    li:hover {
        background-color: #f0f0f0;
        transform: scale(1.02);
        transition: 0.2s;
    }
</style>
