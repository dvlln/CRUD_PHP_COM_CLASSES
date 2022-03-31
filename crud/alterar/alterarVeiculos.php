<?php
    include '../conexao.php';
    try{
        $conexao = new PDO($dns,$user,$pass);
        
        $query = "update veiculo set ID_Veiculo=:id, Tipo=:tipo, Marca=:marca, Modelo=:modelo, Cor=:cor where ID_Veiculo=:id;";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id',$_POST['id_veiculo']);
        $stmt->bindValue(':tipo',$_POST['tipo']);
        $stmt->bindValue(':marca',$_POST['marca']);
        $stmt->bindValue(':modelo',$_POST['modelo']);
        $stmt->bindValue(':cor',$_POST['cor']);

        $stmt->execute();

        echo "<img src='../images/pedido.png' style='width: 100%; height: 100%;'/>";

    } catch(PDOException $error){
        echo "Error: ".$error->getMessage();
        echo '<br>'.'<a href="../home.php">Voltar</a>';
    }
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>