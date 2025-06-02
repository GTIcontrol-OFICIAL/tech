<?php
session_start();
$loggedIn = false;
$loginError = '';

// Dados de login fixos para demonstração
define('INTRA_USER', 'funcionario');
define('INTRA_PASS', 'tech123');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] === INTRA_USER && $_POST['password'] === INTRA_PASS) {
            $_SESSION['intranet_user'] = $_POST['username'];
            $loggedIn = true;
        } else {
            $loginError = 'Usuário ou senha inválidos.';
        }
    }
}

if (isset($_SESSION['intranet_user'])) {
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
    <title>Intranet TechSolutions</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: #f0f8ff; color: #333; }
        .container { width: 85%; margin: auto; overflow: hidden; padding: 20px; }
        header { background: #007bff; color: #fff; padding: 20px 0; text-align: center; }
        header h1 { margin: 0; font-size: 28px; }
        nav ul { list-style-type: none; padding: 0; text-align: center; background: #0056b3; margin-bottom: 20px;}
        nav ul li { display: inline; margin-right: 20px; }
        nav ul li a { color: white; text-decoration: none; padding: 10px 15px; display: inline-block; }
        nav ul li a:hover { background: #003d80; }
        .content { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .login-form { width: 300px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .login-form h2 { text-align: center; color: #007bff; }
        .login-form label { display: block; margin-bottom: 8px; }
        .login-form input[type="text"], .login-form input[type="password"] { width: calc(100% - 22px); padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
        .login-form input[type="submit"] { background: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        .login-form input[type="submit"]:hover { background: #0056b3; }
        .error { color: red; text-align: center; margin-bottom: 10px; }
        .widget { background: #e9ecef; padding: 15px; margin-bottom: 15px; border-radius: 5px; }
        .widget h3 { margin-top: 0; color: #007bff; }
        footer { text-align: center; margin-top: 30px; padding: 15px; background: #007bff; color: white; }
        .logout-link { float: right; color: white; padding: 10px; text-decoration: none; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <?php if ($loggedIn): ?>
                <a href="?logout=true" class="logout-link">Sair</a>
            <?php endif; ?>
            <h1>Intranet TechSolutions</h1>
        </div>
    </header>

    <?php if ($loggedIn): ?>
    <nav>
        <ul>
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#operacoes">Operações</a></li>
            <li><a href="#projetos">Projetos</a></li>
            <li><a href="#comercial">Comercial</a></li>
            <li><a href="#admin">Administrativo</a></li>
            <li><a href="#sig">SIG</a></li>
            <li><a href="#sie">SIE</a></li>
        </ul>
    </nav>
    <div class="container content">
        <h2>Bem-vindo à Intranet, <?php echo htmlspecialchars($_SESSION['intranet_user']); ?>!</h2>
        <p>Esta é a área restrita para colaboradores da TechSolutions.</p>

        <section id="dashboard" class="widget">
            <h3>Dashboard</h3>
            <p>Visão geral das atividades e comunicados internos.</p>
            </section>

        <section id="operacoes" class="widget">
            <h3>Departamento de Operações</h3>
            <p>Acesso rápido aos sistemas de operações:</p>
            <ul>
                <li>Cadastro de equipamentos [cite: 11]</li>
                <li>Registro de manutenções [cite: 11]</li>
                <li>Controle de estoque de peças [cite: 11]</li>
                <li>Monitoramento de redes [cite: 11]</li>
            </ul>
        </section>

        <section id="projetos" class="widget">
            <h3>Departamento de Projetos</h3>
             <p>Recursos para gerenciamento de projetos:</p>
            <ul>
                <li>Solicitação de análise de infraestrutura [cite: 11]</li>
                <li>Ordem de serviço para implementação [cite: 11]</li>
                <li>Relatório de conclusão de projeto [cite: 11]</li>
                <li>Aprovação de orçamentos [cite: 11]</li>
            </ul>
        </section>

        <section id="comercial" class="widget">
            <h3>Departamento Comercial</h3>
            <p>Ferramentas para a equipe comercial:</p>
            <ul>
                <li>Cadastro de clientes [cite: 11]</li>
                <li>Emissão de propostas comerciais [cite: 11]</li>
                <li>Faturamento de serviços [cite: 11]</li>
                <li>Atualização de contratos [cite: 11]</li>
            </ul>
        </section>

        <section id="admin" class="widget">
            <h3>Departamento Administrativo</h3>
            <p>Informações e sistemas administrativos:</p>
            <ul>
                <li>Folha de pagamento [cite: 11]</li>
                <li>Controle de horas trabalhadas [cite: 11]</li>
                <li>Recrutamento e seleção [cite: 11]</li>
                <li>Pagamento de fornecedores [cite: 11]</li>
            </ul>
        </section>

         <section id="sig" class="widget">
            <h3>SIG – Sistemas de Informações Gerenciais</h3>
            <p>Acesso aos relatórios gerenciais:</p>
            <ul>
                <li>Operações: Equipamentos em manutenção x disponíveis, Tempo médio de atendimento técnico. [cite: 19]</li>
                <li>Projetos: Projetos concluídos no mês, Custo real vs. orçado por projeto. [cite: 19]</li>
                <li>Comercial: Faturamento mensal (meta x realizado), Ticket médio por cliente. [cite: 19]</li>
                <li>Administrativo: Folha de pagamento (custo x receita), Despesas com fornecedores. [cite: 20]</li>
            </ul>
        </section>

        <section id="sie" class="widget">
            <h3>SIE - Sistema de Informação para Executivo</h3>
            <p>Ferramentas de comunicação e colaboração:</p>
            <ul>
                <li><strong>Teams:</strong> Gerenciamento de arquivos, calendários, chats e reuniões. [cite: 21]</li>
                <li><strong>Outlook:</strong> Acompanhamento de tarefas, contatos, comunicação departamental. [cite: 22]</li>
            </ul>
        </section>

    </div>
    <?php else: ?>
    <div class="login-form">
        <h2>Login da Intranet</h2>
        <?php if ($loginError): ?>
            <p class="error"><?php echo $loginError; ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <div>
                <label for="username">Usuário (MySQL):</label>
                <input type="text" id="username" name="username" required placeholder="Ex: funcionario">
            </div>
            <div>
                <label for="password">Senha (MySQL):</label>
                <input type="password" id="password" name="password" required placeholder="Ex: tech123">
            </div>
            <div>
                <input type="submit" value="Entrar">
            </div>
        </form>
        <p style="text-align:center; font-size:0.9em; color:#666;">Use 'funcionario' / 'tech123' para testar.</p>
    </div>
    <?php endif; ?>

    <footer>
        <p>Intranet TechSolutions &copy; <?php echo date("Y"); ?> - Acesso Restrito</p>
    </footer>
    <script>
        // Script para navegação por abas (simples)
        document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                // Poderia adicionar lógica para mostrar/esconder seções
                // Mas para este exemplo, apenas rola para a seção
                const targetSection = document.querySelector(this.getAttribute('href'));
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
        <?php if ($loggedIn): ?>
        console.log("Usuário logado na Intranet: <?php echo htmlspecialchars($_SESSION['intranet_user']); ?>");
        <?php endif; ?>
    </script>
</body>
</html>