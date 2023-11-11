<?php
    include("servidor.php");

    if($_SERVER['REQUEST_METHOD']== "POST"){
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        
        $query = "SELECT id FROM clientes WHERE cpf = '$cpf' AND senha = '$senha'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // Usuário autenticado com sucesso, redireciona para a página inicial
            header("Location: index.html");
          
            exit();
        } else {
            $error = "Nome de usuário ou senha incorretos";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="imagens/Devcom-Medical-Health-care-shield.ico" type="image/x-icon">
    <link rel="stylesheet" href="estilos/principalform.css">
    <link rel="stylesheet" href="estilos/mediaquery.css">
    <link rel="stylesheet" href="script.js">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>

    <header id="menu">
        <h1>CallMed</h1>
        <p>O plano que cabe no seu bolso!</p>
        <div id="login">
            <a href="TelaLogin.php" target="_blank">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
            </a>
        </div>
    </header>

    <nav>
        <a href="#menu" target="_self" class="link">Menu</a>
        <a href="sobre.html" target="_self" class="link">Sobre</a>
        <a href="ouvidoria.html" target="_self" class="link">Ouvidoria</a>
        <a href="consultar.php" target="_self" class="link">Consultar</a>
    </nav>

    <main>
        <h2>Login</h2>
        <form method="post" action="">

            <label for="cpf">CPF do usuário:</label>
            <input type="text" name="cpf" placeholder="Digite seu CPF">
            <br>

            <br>

            <label for="password">Senha:</label>
            <input type="password" name="senha" placeholder="Digite sua senha"><br><br>

            <input type="submit" value="Login">

            <button><a href="form.html" id="irplogin">Não, quero me cadastrar.</a></button>

        </form>
    </main>
    <?php
    if (isset($error)) {
        echo "<main>";
        echo "<p>$error</p>";
        echo "</main>";
        echo "<script>alert('CPF ou senha incorretos.')</script>";
    }
    ?>
    <?php
    function validaCPF($cpf) {
        // Remove caracteres não numéricos do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Calcula o primeiro dígito verificador
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += $cpf[$i] * (10 - $i);
        }
        $digito1 = 11 - ($soma % 11);
        if ($digito1 > 9) {
            $digito1 = 0;
        }

        // Verifica se o primeiro dígito verificador é válido
        if ($digito1 != $cpf[9]) {
            return false;
        }

        // Calcula o segundo dígito verificador
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += $cpf[$i] * (11 - $i);
        }
        $digito2 = 11 - ($soma % 11);
        if ($digito2 > 9) {
            $digito2 = 0;
        }

        // Verifica se o segundo dígito verificador é válido
        if ($digito2 != $cpf[10]) {
            return false;
        }
        return true;
        }
    ?>
</body>
</html>