<?php 
    include "../validar.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Alteração de cadastro</title>
</head>
<body>

    <?php 
        include "conexao.php";

        $id = $_GET['id'] ?? '';

        $sql = "SELECT * FROM pessoas WHERE codigo = $id";

        $dados = mysqli_query($conn, $sql);

        $linha = mysqli_fetch_assoc($dados);

    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Cadastro</h1>
                <form action="edit_script.php" method="POST">
                    
                    <div class="form-group">

                        <label for="nome">Nome completo:</label>

                        <input type="text" id="inome" name="nome" class="form-control" required value="<?= $linha['nome']?>">

                    </div>

                    <div class="form-group">

                        <label for="endereco">Endereço:</label>

                        <input type="text" id="iendereco" name="endereco" class="form-control" value="<?= $linha['endereco']?>">

                    </div>

                    <div class="form-group">

                        <label for="telefone">Telefone:</label>

                        <input type="text" id="itelefone" name="telefone" class="form-control" value="<?= $linha['telefone']?>">

                    </div>

                    <div class="form-group">

                        <label for="email">Email:</label>

                        <input type="email" id="iemail" name="email" class="form-control" value="<?= $linha['email']?>">

                    </div>

                    <div class="form-group">

                        <label for="nascimento">Data de nascimento:</label>

                        <input type="date" id="inascimento" name="nascimento" class="form-control" value="<?= $linha['nascimento']?>">

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-success">Salvar alterações</button>

                        <input type="hidden" name="id" value="<?= $linha['codigo']?>">

                    </div>

                </form>

                <a href="index.php" class="btn btn-info">Voltar ao início</a>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
