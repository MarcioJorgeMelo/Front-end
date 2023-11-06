<?php
    $id = $_GET['id'];
    include("servidor.php");

    $sql = "SELECT id, cpf, nascimento, telefone, endereço, nome FROM clientes where id=$id";
    $sql = "DELETE FROM clientes WHERE id= $id";
    $result = $conn->query($sql);
    if($result=TRUE){
        echo"Registro Deletado";
    }else{
        echo "Falha ao deletar";
    }

?>