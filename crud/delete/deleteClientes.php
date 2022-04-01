<?php
    include '../classes/cliente.php';
    
    $idcliente = $_GET['id_cliente'];

    $c = new cliente();
    $c->deletar($idcliente);
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>