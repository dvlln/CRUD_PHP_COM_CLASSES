<?php
    include '../classes/cliente.php';
    
    $idcliente = $_POST['id_cliente'];
    $cpfcliente = $_POST['cpf_cliente'];
    $nomecliente = $_POST['nome_cliente'];

    $c = new cliente();
    $c->setCPFCliente($cpfcliente);
    $c->setNomeCliente($nomecliente);
    $c->alterar($idcliente, $cpfcliente, $nomecliente);
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>