<?php
session_start();
$loggedIn = false;
$loginError = '';

// Dados de login fixos para demonstração (diferentes da intranet)
define('EXTRA_USER', 'cliente01');
define('EXTRA_PASS', 'parceria456');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ext_username']) && isset($_POST['ext_password'])) {
        if ($_POST['ext_username'] === EXTRA_USER && $_POST['ext_password'] === EXTRA_PASS) {
            $_SESSION['extranet_user'] = $_POST['ext_username'];
            $loggedIn = true;
        } else {
            $loginError = 'Usuário ou senha inválidos.';
        }
    }
}

if (isset($_SESSION['extranet_user'])) {
    $loggedIn = true;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extranet TechSolutions</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: #eef1f5; color: #333; }
        .container { width: 80%; margin: auto; overflow: hidden; padding: 20px; }
        header { background: #28a745; color: #fff; padding: 20px 0; text-align: center; }
        header h1 { margin: 0; font-size: 28px; }
        nav ul { list-style-type: none; padding: 0; text-align: center; background: #1e7e34; margin-bottom: 20px;}
        nav ul li { display: inline; margin-right: 20px; }
        nav ul li a { color: white; text-decoration: none; padding: 10px 15px; display: inline-block; }
        nav ul li a:hover { background: #155724; }
        .content { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 12px rgba(0,0,0,0.08); }
        .login-form { width: 320px; margin: 60px auto; padding: 25px; background: #fff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); text-align: left; }
        .login-form h2 { text-align: center; color: #28a745; margin-bottom: 25px; }
        .login-form label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        .login-form input[type="text"], .login-form input[type="password"] { width: calc(100% - 22px); padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; }
        .login-form input[type="submit"] { background: #28a745; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-size: 16px; transition: background-color 0.3s ease; }
        .login-form input[type="submit"]:hover { background: #1e7e34; }
        .error { color: #dc3545; text-align: center; margin-bottom: 15px; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px;}
        .info-box { background: #d1ecf1; border: 1px solid #bee5eb; color: #0c5460; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .info-box h3 { margin-top: 0; color: #0c5460; }
        footer { text-align: center; margin-top: 30px; padding: 15px; background: #28a745; color: white; }
        .logout-link { float: right; color: white; padding: 10px; text-decoration: none; }
    </style>
</head>
<body>
    <header>
        <div class="container">
             <?php if ($loggedIn): ?>
                <a href="?logout=true" class="logout-link">Sair</a>
            <?php endif; ?>
            <h1>Extranet TechSolutions - Portal do Cliente/Fornecedor</h1>
        </div>
    </header>

    <?php if ($loggedIn): ?>
    <nav>
        <ul>
            <li><a href="#projetos">Meus Projetos</a></li>
            <li><a href="#faturas">Minhas Faturas</a></li>
            <li><a href="#suporte">Suporte</a></li>
            <li><a href="#documentos">Documentos</a></li>
        </ul>
    </nav>
    <div class="container content">
        <h2>Bem-vindo à Extranet, <?php echo htmlspecialchars($_SESSION['extranet_user']); ?>!</h2>
        <p>Aqui você pode acompanhar seus projetos, faturas e solicitar suporte.</p>

        <section id="projetos" class="info-box">
            <h3>Acompanhamento de Projetos</h3>
            <p>Visualize o status dos seus projetos em andamento:</p>
            <ul>
                <li><strong>Projeto Alpha:</strong> Migração de Servidor - <em>Status: Em Andamento (75%)</em></li>
                <li><strong>Projeto Beta:</strong> Implementação de Rede Filial - <em>Status: Concluído</em> [inspirado em cite: 11]</li>
                <li><a href="#">Ver todos os projetos...</a></li>
            </ul>
            <p>Você pode solicitar uma nova análise de infraestrutura ou verificar relatórios de conclusão de projetos. [cite: 11]</p>
        </section>

        <section id="faturas" class="info-box">
            <h3>Minhas Faturas</h3>
            <p>Acesse suas faturas e histórico de pagamentos:</p>
            <ul>
                <li>Fatura #2025-001 - Vencimento: 10/06/2025 - <a href="#">Baixar PDF</a> [inspirado em cite: 17, 18]</li>
                <li>Fatura #2025-002 - Vencimento: 10/07/2025 - <a href="#">Baixar PDF</a></li>
                <li><a href="#">Ver histórico completo...</a></li>
            </ul>
             <p>Notas fiscais são enviadas por e-mail e ficam disponíveis aqui. [cite: 17]</p>
        </section>

        <section id="suporte" class="info-box">
            <h3>Suporte Técnico</h3>
            <p>Precisa de ajuda? Abra um chamado de suporte ou consulte nossa FAQ.</p>
            <ul>
                <li><a href="#">Abrir Novo Chamado</a></li>
                <li><a href="#">Consultar Chamados Existentes</a></li>
                <li><a href="#">FAQ e Base de Conhecimento</a></li>
            </ul>
        </section>
        
        <section id="documentos" class="info-box">
            <h3>Documentos Importantes</h3>
            <p>Acesse documentos relevantes, como fichas técnicas de equipamentos adquiridos ou contratos.</p>
            <ul>
                <li><a href="#">Ficha Técnica - Servidor XYZ</a> [inspirado em cite: 14]</li>
                <li><a href="#">Contrato de Manutenção Preventiva</a> [inspirado em cite: 11]</li>
            </ul>
        </section>

    </div>
    <?php else: ?>
    <div class="login-form">
        <h2>Acesso à Extranet</h2>
        <?php if ($loginError): ?>
            <p class="error"><?php echo $loginError; ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <div>
                <label for="ext_username">Usuário (Cliente/Fornecedor):</label>
                <input type="text" id="ext_username" name="ext_username" required placeholder="Ex: cliente01">
            </div>
            <div>
                <label for="ext_password">Senha:</label>
                <input type="password" id="ext_password" name="ext_password" required placeholder="Ex: parceria456">
            </div>
            <div>
                <input type="submit" value="Acessar Portal">
            </div>
        </form>
        <p style="text-align:center; font-size:0.9em; color:#666; margin-top: 15px;">Use 'cliente01' / 'parceria456' para testar.</p>
    </div>
    <?php endif; ?>

    <footer>
        <p>Extranet TechSolutions &copy; <?php echo date("Y"); ?> - Portal Seguro</p>
    </footer>
    <script>
        <?php if ($loggedIn): ?>
        console.log("Usuário logado na Extranet: <?php echo htmlspecialchars($_SESSION['extranet_user']); ?>");
        // Exemplo de funcionalidade JavaScript para a extranet
        // Poderia ser usado para carregar dados via AJAX, etc.
        document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetSection = document.querySelector(this.getAttribute('href'));
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
        <?php endif; ?>
    </script>
</body>
</html>