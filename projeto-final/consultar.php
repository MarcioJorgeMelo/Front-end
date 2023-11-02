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
    <link rel="shortcut icon" href="imagens/Devcom-Medical-Health-care-shield.ico" type="image/x-icon">

    <link rel="stylesheet" href="estilos/mediaquery.css">
    <link rel="stylesheet" href="estilos/principalform.css">
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
            <a href="index.html" target="_blank" class="link">Menu</a>
            <a href="sobre.html" target="_blank" class="link">Sobre</a>
            <a href="ouvidoria.html" target="_blank" class="link">Ouvidoria</a>
            <a href="consultar.php" target="_blank" class="link">Consultar</a>
        </nav>
    
    <main>
        
        <h1>Consultar Dados</h1>

        <br>

        <form method="post" action="">
            <p>

                <label for="">Nome:</label>
                
                <input type="text" name="nome" id="inome" placeholder="Digite aqui seu nome" autocomplete="name">

            </p>

            <br>

            <input type="submit" value="Consultar">

        </form>

        <br>

        <a href="index.html"><button>Página principal</button></a>

        <a href="editar.php"><button>Editar</button></a>

    </main>
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