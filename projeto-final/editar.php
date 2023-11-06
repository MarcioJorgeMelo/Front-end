<?php
    $id = $_GET['id'];
    
    $nome = $_POST['nome'];
    $nasc = $_POST['nasc'];
    $ende = $_POST['ende'];
    $cpf = $_POST['cpf'];
    $tel = $_POST['tel'];

    include("servidor.php");

    $sql = "UPDATE clientes SET nome='$nome', cpf='$cpf',nascimento=$nasc,ende='$ende',tel='$tel' WHERE id =$id";
    $result = $conn->query($sql);
    if($result=TRUE){
        echo"Registro Deletado";
    }else{
        echo "Falha ao deletar";
    }
?>
