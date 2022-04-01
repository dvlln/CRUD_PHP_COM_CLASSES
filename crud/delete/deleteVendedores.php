<?php
    include '../classes/vendedor.php';
    
    $idvendedor = $_GET['id_vendedor'];

    $v = new vendedor();
    $v->deletar($idvendedor);
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>