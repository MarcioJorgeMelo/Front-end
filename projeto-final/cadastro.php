<?php
    include("servidor.php");
    
    $nome = $_POST['nome'];
    $nasc = $_POST['nasc'];
    $endereço = $_POST['ende'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['tel'];
    $senha = $_POST['senha'];
    
    // Inserção de dados na tabela "Cliente"
    $sql = "INSERT INTO clientes (cpf, endereço, nascimento, nome, telefone,senha) VALUES ('$cpf', '$endereço', '$nasc', '$nome', '$telefone','$senha')";

    if ($conn->query($sql) == TRUE) {
        echo "<script>alert('Registro inserido com sucesso.')</script>";
    } else {
        echo "<script>alert('Erro na inserção.')</script>" . $conn->error();
    }
    
    // Feche a conexão quando não precisar mais dela
    $conn->close();

?>