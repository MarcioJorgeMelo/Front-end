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

    $resultado = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $sql = "SELECT * FROM clientes WHERE nome LIKE '%$nome%'";
        $resultado = $conn->query($sql);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Dados</title>
</head>
<body>
    <h2>Consultar Dados</h2>
    <form method="post" action="">
        Nome: <input type="text" name="nome">
        <br><br>
        <input type="submit" value="Consultar">
    </form>
    <br>
    <a href="index.html"><button>Página principal</button></a>
    <a href="editar.php"><button>Editar</button></a>
<?php
    if ($resultado !== null && $resultado->num_rows > 0) {
        echo "<h3>Resultados:</h3>";
        echo "<table>";
        while ($row = $resultado->fetch_assoc()) {
            echo 
            "<td></td>  " . $row['nome'] . 
            "<td></td>  " . $row['nascimento'].
            "<td></td>  " . $row['endereço'] .
            "<td></td>  " . $row['cpf'] .
            "<td></td>  ". $row['telefone'] . "<br>";
        }
        echo "</table>";
    } elseif ($resultado !== null && $resultado->num_rows === 0) {
        echo "Nenhum resultado encontrado.";
    }
?>