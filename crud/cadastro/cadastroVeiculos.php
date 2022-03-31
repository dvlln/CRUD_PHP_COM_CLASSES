<?php
	include '../conexao.php';
	try{
		$conexao = new PDO($dns,$user,$pass);
        $query = 'insert into veiculo value(null, :Tipo, :Marca, :Modelo, :Cor);';

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':Tipo',$_POST['tipo']);
        $stmt->bindValue(':Marca',$_POST['marca']);
        $stmt->bindValue(':Modelo',$_POST['modelo']);
        $stmt->bindValue(':Cor',$_POST['cor']);

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