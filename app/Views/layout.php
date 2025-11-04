<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($title ?? '') ?></title>
    <style>
        /* Reset simples */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }

        /* Header moderno */
        header {
            width: 100%;
            background: #e91e63;
            padding: 12px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        header nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between; /* separa esquerda e direita */
            align-items: center;
        }

        .nav-left, .nav-right {
            display: flex;
            gap: 15px;
        }

        header nav a {
            text-decoration: none;
            color: white;
            font-weight: 600;
            padding: 10px 18px;
            border-radius: 8px;
            transition: all 0.3s ease;
            background-color: rgba(255,255,255,0.1);
        }

        header nav a:hover {
            background-color: rgba(255,255,255,0.3);
            transform: scale(1.05);
        }

        body {
            padding-top: 30px;
            overflow-y: hidden;
        }
    </style>
</head>
<body>
    
    <?php if (!isset($noHeader) || !$noHeader): ?>
    <header>
        <nav>
            <div class="nav-left">
                <a href="/produtos">Produtos</a>
                <a href="/categorias">Categorias</a>
            </div>
            <div class="nav-right">
                <a href="/api/usuarios/sair">Sair</a>
            </div>
        </nav>
    </header>
    <?php endif; ?>

    <main>
        <?= $conteudo ?? '' ?>
    </main>
</body>
</html>
