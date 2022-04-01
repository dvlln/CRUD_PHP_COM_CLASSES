<?php
    include '../classes/veiculo.php';

    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];

    $v = new veiculo();
    $v->setTipo($tipo);
    $v->setMarca($marca);
    $v->setModelo($modelo);
    $v->setCor($cor);
    $v->cadastrar($v->getTipo(), $v->getMarca(), $v->getModelo(), $v->getCor());
?>

<html>
<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>
<body>
</body>
</html>