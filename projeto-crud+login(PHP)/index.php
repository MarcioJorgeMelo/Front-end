<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Empresa</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="jumbotron">
                <h1 class="display-4">Login</h1>
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" aria-describedby="emailHelp" placeholder="Seu email">
                        <small id="emailHelp" class="form-text text-muted">Entre com seus dados de acesso.</small>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Acessar</button>
                </form>

               <?php 
                    if (isset($_POST['login'])) {

                        include "restrito/conexao.php";
                        
                        $login = mysqli_real_escape_string($conn, $_POST['login']);

                        $senha = mysqli_real_escape_string($conn,md5($_POST['senha']));

                        $sql = "SELECT * FROM `usuarios` WHERE login = '$login' AND senha = '$senha'";

                        if ($result = mysqli_query($conn, $sql)) {
                            
                            $num_registros = mysqli_num_rows($result);

                            if ($num_registros == 1) {
                                $linha = mysqli_fetch_assoc($result);
    
                                if ( ($login == $linha['login']) and ($senha == $linha['senha']) ) {
                                    session_start();
                                    $_SESSION['login'] = "Jorge";
                                    header("location: restrito");
                            }else {
                                echo "Login inválido!";
                            }
                            }else {
                                echo "Login ou senha não encontrados ou inválidos.";
                            }

                        } else {
                            echo "Nenhum resultado do Banco de dados";
                        }
                        

                    }
               ?>
            
            </div>
        </div>
        <div class="col-3"></div>
        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>