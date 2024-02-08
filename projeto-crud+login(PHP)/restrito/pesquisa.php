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
    <title>Pesquisa</title>
</head>
<body>

    <?php 
        
        $pesquisa = $_POST['busca'] ?? "";

        include "conexao.php";

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

        $dados = mysqli_query($conn, $sql);
    
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>
                <nav class="navbar navbar-light bg-light">
                
                    <form class="form-inline" action="pesquisa.php" method="POST">
                        <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="busca" autofocus>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                
                </nav>

                <table class="table table-striped">
                    
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de nascimento</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        <?php 
                            
                            while ($linha =     mysqli_fetch_assoc($dados)) {
                                
                                $codigo = $linha['codigo'];
                                $nome = $linha['nome'];
                                $endereco = $linha['endereco'];
                                $telefone = $linha['telefone'];
                                $email = $linha['email'];
                                $nascimento = $linha['nascimento'];
                                $nascimento = mostra_data($nascimento);
                                $foto = $linha['foto'];
                                if (!$foto == null) {
                                    $mostra_foto = "<img src='img/$foto' class='lista_foto'>";
                                } else {
                                    $mostra_foto = '';
                                }

                                echo "<tr>
                                        <th>$mostra_foto</th>
                                        <th scope='row'>$nome</th>
                                        <td>$endereco</td>
                                        <td>$telefone</td>
                                        <td>$email</td>
                                        <td>$nascimento</td>
                                        <td width = 150px>
                                        
                                        <a href ='cadastro_edit.php?id=$codigo' class ='btn btn-success btn-sn'>Editar</a>
                                        
                                        <a href ='#' class ='btn btn-danger btn-sn' data-toggle = 'modal' data-target = '#confirma' onclick = ".'"'."pegar_dados($codigo, '$nome')".'"'.">Excluir</a>
                                        
                                        </td>

                                    </tr>";

                            }
                        ?>  

                    </tbody>
                </table>
                <a href="index.php" class="btn btn-info">Voltar ao início</a>
            </div>

        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exclusão de cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="excluir.php" method="POST">
        <p>Deseja realmente excluir</p>
        <p id="nome_pessoa">Nome da pessoa</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <input type="hidden" name="id" id="codigo" value="">
        <input type="hidden" name="nome" id="nome_pessoa1" value="">
        <input type="submit" value="Sim" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

<script type="text/javascript">
    function pegar_dados(id, nome){
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('codigo').value = id;
        document.getElementById('nome_pessoa1').value = nome;
    }
</script>