<?php
    include '../conexao.php';
    try{
        $conexao = new PDO($dns,$user,$pass);
        
        $query = "update vendedor set CPF_Vendedor=:cpf_vendedor, Nome_Vendedor=:nome where ID_Vendedor=:id;";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id',$_POST['id_vendedor']);
        $stmt->bindValue(':cpf_vendedor',$_POST['cpf_vendedor']);
        $stmt->bindValue(':nome',$_POST['nome_vendedor']);

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