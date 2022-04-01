<?php
    include '../classes/veiculo.php';
    
    $idveiculo = $_GET['id_veiculo'];

    $v = new veiculo();
    $v->deletar($idveiculo);
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>