<?php
    include '../classes/cliente.php';

    $cpfcliente = $_POST['cpf_cliente'];
    $nomecliente = $_POST['nome_cliente'];

    $c = new cliente();
    $c->setCPFCliente($cpfcliente);
    $c->setNomeCliente($nomecliente);
    $c->cadastrar($c->getCPFCliente(), $c->getNomeCliente());
?>

<html>
<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>
<body>
</body>
</html>