<?php
	include '../conexao.php';
	try{
		$conexao = new PDO($dns,$user,$pass);
        $query = 'insert into vendedor value(null, :CPF_Vendedor, :Nome);';

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':CPF_Vendedor',$_POST['cpf_vendedor']);
        $stmt->bindValue(':Nome',$_POST['nome_vendedor']);

        $stmt->execute();
        echo "<img src='../images/jequiti.jpg' style='width: 100%; height: 100%;'/>";

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