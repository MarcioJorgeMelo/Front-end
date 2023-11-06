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
<style>

@charset "UTF-8";
@import url('https://fonts.googleapis.com/css2?family=Agbalumo&family=Kanit:wght@200&display=swap');

*{
    margin: 0;
    padding: 0px;
    font-family: Arial, Helvetica, sans-serif;
}

body{
    background-color: #1D1A05;
}

header{
    height: auto;
    width: auto;
    margin: auto;
    background-color: #3D5A80;
    color: #F0E7D8;
    text-align: center;
}

header > h1{
    font-family: 'Agbalumo', sans-serif;
    font-size: 3em;
    position: relative;
    text-shadow: 1px 1px black;
}

header > p{
    font-family: 'Kanit', sans-serif;
    font-size: 1.2em;
    text-shadow: 1px 1px black;
}

div#login{
    position: absolute;
    display: inline-block;
    left: 82%;
    top: 3%;
}

span.material-symbols-outlined{
    color: #F0E7D8;
    font-size: 3em;
    text-shadow: 1px 1px black;
}

span.material-symbols-outlined:hover{
    color: #1D1A05;
}

nav{
    background-color: #3D5A80;
    padding-top: 10px;
}

a.link{
    text-decoration: none;
    color: #F0E7D8;
    font-weight: bolder;
    padding: 8px;
    text-shadow: 1px 1px black;
}

a.link:hover{
    color: #1D1A05;
}

main{
    margin: 10px;
    padding: 15px;
    border-radius: 10px;
    background-color: white;
}

main > h1{
    font-family: 'Agbalumo', sans-serif;
}

input.botao{
    display: inline;
    margin-right: 10px;
}

label{
    font-family: 'Agbalumo', sans-serif;
    font-size: 1.2em;
}

input{
    margin-left: 5px;
}

input#inome{
    width: 210px;
}

header > h1{
        font-size: 5em;
    }

    header > p{
        font-size: 1.5em;
    }

    span.material-symbols-outlined{
        font-size: 5em;
        padding-top: 20px;
    }
    
    a.link{
        font-size: 1.5em;
        padding: 30px;
    }

    div#img1{
        width: 900px;
        height: 400px;
    }

    div#img2{
        width: 900px;
        height: 400px;
    }

    div#img3{
        width: 900px;
        height: 400px;
    }

    div.indentar{
        font-size: 1.2em;
    }

    h2, h3{
        font-size: 2em;
    }

    footer{
        font-size: 1.3em;
    }

    label{
        font-size: 1.5em;
    }

    input{
        font-size: 1.5em;
        height: 50px;
        width: 380px;
    }

    input#inome{
        width: 300px;
    }

    caption{
        font-family: 'Agbalumo', sans-serif;
        font-size: 3em;
        font-weight: bold;
        padding: 20px;
    }

    table{
        margin: auto;
        width: 1200px;
        text-align: center;
        font-size: 1.3em;
        border: 1px solid black;
        border-collapse: collapse;
    }

    thead{
        background-color: rgb(179, 177, 177);
    }

    td,th{
        border: 1px solid black;
        padding: 10px;
        font-family: 'Agbalumo', sans-serif;
    }

    tr:nth-child(even){
            background-color: rgb(179, 177, 177);
    }

    div#container{
            overflow-x: auto;
    }

</style>
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
            <a href="index.html" target="_self" class="link">Menu</a>
            <a href="sobre.html" target="_self" class="link">Sobre</a>
            <a href="ouvidoria.html" target="_self" class="link">Ouvidoria</a>
            <a href="consultar.php" target="_self" class="link">Consultar</a>
        </nav>
</body>

<?php

    include("servidor.php");
    $sql = "SELECT * FROM clientes";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    echo "<main>";
    echo"<table border=0.5>";
    echo"<caption>Consulta de dados</caption>";
    echo"   
            <thead>
                <tr>
                    <th>Id:</th>
                    <th>Nome:</th>
                    <th>CPF:</th>
                    <th>Data de nascimento:</th>
                    <th>Telefone:</th>
                    <th>Endereço:</th>
                    <th>Açoes:</th>
                </tr>
            </thead>";
            
        echo "<tbody>";
        while ($row = $res->fetch_object()) {
            echo"<tr>";
            echo "<td>".$row->id."</td>";
            echo "<td>".$row->nome."</td>";
            echo "<td>".$row->cpf."</td>";
            echo "<td>".$row->nascimento."</td>";
            echo "<td>".$row->telefone."</td>";
            echo "<td>".$row->endereço."</td>";
            echo "<td>";
            echo "<a href=Fomulario_Edit.php?id=".$row->id."><button>Editar</button></a>";
            echo "<a href=deletar.php?id=".$row->id."><button>Deletar</button></a>";
            echo "</td>";
            echo "</tr>";
        }
    echo "</tbody>";
    echo "</table>";
    echo "</main>";
?>