<!DOCTYPE html>
<html>
<head>
<title>Boneco inserido</title>

<?php
            
            
            $id = NULL;
            $nome_boneco = $_POST['nome_boneco'];
            $genero = $_POST['genero'];
            $tombo = $_POST['tombo'];
            $autor = intval($_POST['autor']);
            $tipo_manip = $_POST['tipo_manipulacao'];
            $altura = $_POST['altura'];
            $comprimento = $_POST['comprimento'];
            $largura = $_POST['largura'];
            $peso = $_POST['peso'];
            $descricao = $_POST['descricao'];

            
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
            $db = new mysqli("localhost", "mamulengo", "M@mulenG0S0rr1S0", "museu_mamulengo");
            
        

            $query = "INSERT INTO bonecos VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $dbstmt = $db->prepare($query);
            $dbstmt->bind_param("issisiiiis", $id, $nome_boneco, $tombo, $autor, $tipo_manip, $altura, $comprimento, $largura, $peso, $descricao);
            $dbstmt->execute();
            
              




        
        ?>

</head>

        <body>
        

                <h2>Boneco Adicionado com Sucesso</h2>

        </body>


</html>