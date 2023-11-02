<?php
    // Configurações do banco de dados
    $servername = "localhost";  
    $username = "root"; 
    $password = "";   
    $database = "plano";  

    // Conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    $nome = $_POST['nome'];
    $nasc = $_POST['nasc'];
    $endereço = $_POST['ende'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['tel'];
    
    // Inserção de dados na tabela "Cliente"
    $sql = "INSERT INTO clientes (cpf, endereço, nascimento, nome, telefone) VALUES ('$cpf', '$endereço', $nasc, '$nome', '$telefone')";

    if ($conn->query($sql) == TRUE) {
        echo "Registro inserido com sucesso.";
    } else {
        echo "Erro na inserção: " . $conn->error;
    }
    
    // Feche a conexão quando não precisar mais dela
    $conn->close();

?>