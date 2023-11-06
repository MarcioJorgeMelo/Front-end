<?php
include("servidor.php");
    switch ($_REQUEST["acao"]){
        case 'cadastrar':
                $nome = $_POST['nome'];
                $nasc = $_POST['nasc'];
                $endereço = $_POST['ende'];
                $cpf = $_POST['cpf'];
                $telefone = $_POST['tel'];

                $sql = "INSERT INTO clientes (cpf, endereço, nascimento, nome, telefone) VALUES ('$cpf', '$endereço', '$nasci', '$nome', '$telefone')";

                $res = $conn -> query($sql)
        break;
        case 'editar':
                $nome = $_POST['nome'];
                $nasc = $_POST['nasc'];
                $endereço = $_POST['ende'];
                $cpf = $_POST['cpf'];
                $telefone = $_POST['tel'];

                $sql = "UPDATE clientes SET
                        cpf= '{$cpf}',
                        endereço='{$endereço}',
                        nascimento='{$nasc}',
                        nome='{$nome}',
                        telefone='{$telefone}'

                        WHERE
                            id=".$_REQUEST["id"];

                $res = $conn -> query($sql);

                if($res==true){
                    print "<script>alert('Editado com sucesso.')</script>";
                }else{
                    echo "<script>alert('Erro na inserção.')</script>" . $conn->error;
                }

            break;

        case 'excluir':
            
            break;
    };