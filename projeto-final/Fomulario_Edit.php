<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
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
            <a href="form.html" target="_blank">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
            </a>
        </div>
    </header>
    <nav>
        <a href="index.html" target="_self" class="link">Menu</a>
        <a href="sobre.html" target="_self" class="link">Sobre</a>
        <a href="ouvidoria.html" target="_self" class="link">Ouvidoria</a>
        <a href="consultar.php" target="_self" class="link">Consultar</a>
    </nav>

<?php
    $id = $_GET['id'];
    
    include("servidor.php");

    $sql = "SELECT cpf, nascimento, telefone, endereço, nome FROM clientes WHERE id = '$id'";

    echo"<main>";
    echo "<form action=editar.php method='post'>";
    $result = $conn->query($sql);

    if ($result) {
        foreach ($result as $row) {

        echo "<label for=nome>Nome:</label>";
        echo"<input type=text id=nome name=nome placeholder='Digite aqui seu nome' value='" . $row['nome'] . "'>";
        echo "<br><br>";

        echo "<label for=telefone>Telefone:</label>";
        echo "<input type=number id=tel name=tel placeholder='Digite aqui seu Telefone' value='" . $row['telefone'] . "'>";
        echo "<br><br>";

        echo "<label for=cpf>Cpf:</label>";
        echo "<input type=text id=cpf name=cpf placeholder='Digite aqui seu CPF' value='" . $row['cpf'] . "'>";
        echo "<br><br>";

        echo "<label for=endereço>Endereço:</label>";
        echo "<input type=text id=ende name=ende placeholder='Digite aqui seu Endereço:' value='" . $row['endereço'] . "'>";
        echo "<br><br>";

        echo "<label for=nasc>Data de nascimento:</label>";
        echo "<input type=date id=nasc name=nasc placeholder='Digite aqui sua data de nascimento:' value='" . $row['nascimento'] . "'>";
        echo "<br><br>";

        echo "<input type=submit value='Salvar alterações'>";
    }
    } else {
        echo "Erro na consulta: " . $conn->errorInfo(); 
    }
    echo"</main>";
?>