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

?>