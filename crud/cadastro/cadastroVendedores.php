<?php
	include '../classes/vendedor.php';

    $cpfvendedor = $_POST['cpf_vendedor'];
    $nomevendedor = $_POST['nome_vendedor'];

    $v = new vendedor();
    $v->setCPFVendedor($cpfvendedor);
    $v->setNomeVendedor($nomevendedor);
    $v->cadastrar($v->getCPFVendedor(), $v->getNomeVendedor());
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>