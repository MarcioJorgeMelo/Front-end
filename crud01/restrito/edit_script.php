<?php 
    include "../validar.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Alteração de cadastro</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php 
                include "conexao.php";

                $id = $_POST['id'];
                $nome = $_POST['nome']; 
                $endereco = $_POST['endereco']; 
                $telefone = $_POST['telefone']; 
                $email = $_POST['email']; 
                $nascimento = $_POST['nascimento']; 

                $sql = "UPDATE pessoas SET nome='$nome', endereco='$endereco', telefone='$telefone', email='$email', nascimento='$nascimento' WHERE codigo = $id";

                if (mysqli_query($conn, $sql)) {
                    mensagem("$nome alterado com sucesso!", 'success');
                }else {
                    mensagem("$nome não alterado.", 'danger');
                }

                function mensagem($texto, $tipo){
                    echo "<div class='alert alert-$tipo' role='alert'>
                    $texto
                  </div>";
                }
            ?>
            <hr>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>