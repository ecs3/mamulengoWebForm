<!DOCTYPE html>
<html>
<head>
<title>Boneco inserido</title>


    <?php


        //pegar todas as variaveis
        $id = NULL;
        $nome_boneco = $_POST['nome_boneco'];
        $genero = $_POST['genero'];
        $tombo = $_POST['tombo'];
        $artista = $_POST['artista'];
        $tipo_manip = $_POST['tipo_manipulacao'];
        $situacao = $_POST['situacao'];
        $posse = $_POST['posse'];

        //teste variaveis
        print "$nome_boneco, $genero, $tombo, $artista, $tipo_manip, $situacao, $posse ";

      
        //TOTAL    
        $query_TOTAL = "SELECT * FROM bonecos WHERE nome_do_boneco LIKE '%$nome_boneco%' AND genero LIKE '%$genero%' AND tombo LIKE '%$tombo%' AND artista_id LIKE '%$artista%' AND tipo_manipulacao LIKE '%$tipo_manip%' AND situacao LIKE '%$situacao%' AND posse LIKE '%$posse%'";
        
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $db = new mysqli("localhost", "mamulengo", "M@mulenG0S0rr1S0", "museu_mamulengo");
                //teste conecao
                if (!$db) {
                    echo "Desculpe, nao foi possivel conectar ao servidor do banco de dados";
                    exit;
                    } else{
                        //echo"tudo certo";
                    }

            $result = $db->query($query_TOTAL);
            $linha_bonec = $result->fetch_assoc();
     ?>

</head>
<body>


<div id="conteudo">
    <h1>Lista de Bonecos</h1>
    <table border="3">
    <tr>
    <td>Genero</td>
    <td>Situacao</td>
    <td>Posse</td>
        <td>Tombo</td>
        <td>Nome</td>
        <td>Artista</td>
        <td>Comprimento</td>
        <td>Largura</td>
        <td>Altura</td>
        <td>Peso</td>
        <td>Tipo de Manipulacao</td>
        <td>Descricao</td>
    </tr>
    
    <?php
        if($result){ do{
          
            // next 4 lines: busca o nome do artista atraves do id do artista
            
            $art_id = $linha_bonec['artista_id'];
            //echo "\n", gettype($art_id), $art_id, "\n";
            
            
            
          
          $query2 = "SELECT nome_artistico FROM artistas WHERE artista_id = $art_id";
          $result2 = $db->query($query2);
          $linha_bonec_art = $result2->fetch_assoc();

    ?>
    <tr>
    <td> <?php echo $linha_bonec['genero'] ?> </td>
    <td> <?php echo $linha_bonec['situacao'] ?> </td>
    <td> <?php echo $linha_bonec['posse'] ?> </td>
        <td> <?php echo $linha_bonec['tombo'] ?> </td>
        <td><?php echo $linha_bonec['nome_do_boneco'] ?></td>
        <td><?php echo $linha_bonec_art['nome_artistico'] ?></td>
        <td> <?php echo $linha_bonec['altura_centimetros'] ?> </td>
        <td> <?php echo $linha_bonec['comprimento_centimetros'] ?> </td>
        <td> <?php echo $linha_bonec['largura_centimetros'] ?> </td>
        <td> <?php echo $linha_bonec['peso_gramas'] ?> </td>
        <td> <?php echo $linha_bonec['tipo_manipulacao'] ?> </td>
        <td> <?php echo $linha_bonec['descricao'] ?> </td>
    </tr>

    <?php

        } while ($linha_bonec = $result->fetch_assoc());
    }//fecha o if

    ?>
    




    </table>


</div>




</body>
</html>