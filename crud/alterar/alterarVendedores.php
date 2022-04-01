<?php
    include '../classes/vendedor.php';
    
    $idvendedor = $_POST['id_vendedor'];
    $cpfvendedor = $_POST['cpf_vendedor'];
    $nomevendedor = $_POST['nome_vendedor'];

    $v = new vendedor();
    $v->setCPFvendedor($cpfvendedor);
    $v->setNomevendedor($nomevendedor);
    $v->alterar($idvendedor, $cpfvendedor, $nomevendedor);
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>