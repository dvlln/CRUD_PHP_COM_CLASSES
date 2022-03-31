<?php
    include '../conexao.php';
    try{
        $conexao = new PDO($dns,$user,$pass);
        
        $query = "update cliente set CPF_Cliente=:cpf_cliente, Nome_Cliente=:nome where ID_Cliente=:id;";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id',$_POST['id_cliente']);
        $stmt->bindValue(':cpf_cliente',$_POST['cpf_cliente']);
        $stmt->bindValue(':nome',$_POST['nome_cliente']);

        $stmt->execute();
        echo "<img src='../images/pedido.png' style='width: 100%; height: 100%;'/>";
        

    } catch(PDOException $error){
        echo "Error: ".$error->getMessage();
    }
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>