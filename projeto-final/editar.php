<?php
include("servidor.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $nome = $_POST['nome'];
        $nasc = $_POST['nasc'];
        $ende = $_POST['ende'];
        $cpf = $_POST['cpf'];
        $tel = $_POST['tel'];

        $sql = "UPDATE clientes SET nome='$nome', cpf='$cpf', nascimento='$nasc', ende='$ende', tel='$tel' WHERE id = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "Registro Atualizado";
        } else {
            echo "Falha ao atualizar: " . $conn->error;
        }
    } else {
        echo "ID não encontrado na URL";
    }
}
?>
