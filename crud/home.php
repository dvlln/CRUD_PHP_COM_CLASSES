<?php
    include 'classes/cliente.php';
    include 'classes/veiculo.php';
    include 'classes/vendedor.php';

    $C = new cliente();
    $Ven = new vendedor();
    $Vei = new veiculo();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <title>Cadastro</title>
<body>
    <div class="Page">
        <div class="Wrapper">
            <!-- CABEÇALHO -->
            <div class="Header">
                <h1>Concessionaria de Deus</h1>
            </div>

            <!-- CADASTRO DE TODAS AS TABELAS -->
            <div class="Form_bloco">
                <div class="Titulo" id="CADASTRO">
                    <h3>CADASTRO</h3>
                </div>
                <div class=" Formulario">

                    <!-- CLIENTES -->
                    <div>
                        <h4>Clientes</h4>
                        <?php
                            if(isset($_GET['id_cliente'])){
                                echo '<form method="POST" action="alterar/alterarClientes.php">';
                                
                            } else{
                                echo '<form method="POST" action="cadastro/cadastroClientes.php">';
                            }
		                ?>
                        <label>CPF: <input type="text" name="cpf_cliente" value=""></label>
                        <label>Nome: <input type="text" name="nome_cliente" value="" ></label>
                        <?php
                            if(isset($_GET['id_cliente'])){
                                echo '<input type="hidden" name="id_cliente" value="'.$_GET['id_cliente'].'">';
                                echo '<input type="submit" value="Editar" class="Butao">';
                                echo '<a class="Butao" href="home.php">Cancelar</a>';
                            } else{
                                echo '<input type="submit" value="Enviar" class="Butao">';
                            }
		                ?>
                        </form>
                    </div>


                    <!-- VENDEDORES -->
                    <div>
                        <h4>Vendedores</h4>
                        <?php
                            if(isset($_GET['id_vendedor'])){
                                echo '<form method="POST" action="alterar/alterarVendedores.php">';
                            } else{
                                echo '<form method="POST" action="cadastro/cadastroVendedores.php">';
                            }
		                ?>
                        <label>CPF: <input type="text" name="cpf_vendedor" value="" /></label>
                        <label>Nome: <input type="text" name="nome_vendedor" value="" /></label>
                        <?php
                            if(isset($_GET['id_vendedor'])){
                                echo '<input type="hidden" name="id_vendedor" value="'.$_GET['id_vendedor'].'">';
                                
                                echo '<input type="submit" value="Editar" class="Butao">';
                                echo '<a class="Butao" href="home.php">Cancelar</a>';
                                
                            } else{
                                echo '<input type="submit" value="Enviar" class="Butao">';
                            }
		                ?>
                        </form>
                    </div>


                    <!-- VEICULOS -->
                    <div>
                        <h4>Veiculos</h4>
                        <?php
                            if(isset($_GET['id_veiculo'])){
                                echo '<form method="POST" action="alterar/alterarVeiculos.php">';
                            } else{
                                echo '<form method="POST" action="cadastro/cadastroVeiculos.php">';
                            }
		                ?>
                        <label>Tipo: <input type="text" name="tipo" value="" /></label>
                        <label>Marca: <input type="text" name="marca" value="" /></label>
                        <label>Modelo: <input type="text" name="modelo" value="" /></label>
                        <label>Cor: <input type="text" name="cor" value="" /></label>
                        <?php
                            if(isset($_GET['id_veiculo'])){
                                echo '<input type="hidden" name="id_veiculo" value="'.$_GET['id_veiculo'].'">';
                                echo '<div class="BotoesCRUD">';
                                echo '<input type="submit" value="Editar" class="Butao">';
                                echo '<a class="Butao" href="home.php">	Cancelar</a>';
                                echo '</div>';
                            } else{
                                echo '<input type="submit" value="Enviar" class="Butao">';
                            }
		                ?>
                        </form>
                    </div>
                </div>
            </div>

            <!-- LISTAGEM DE TODOS OS PRODUTOS -->
            <div class="Form_bloco">
                <div class="Titulo" id="LISTA">
                    <h3>LISTA</h3>
                </div>
                <div class="Lista">
                    <div>
                        <h4>Clientes</h4>
                        <?php
                            $C->listar();
                        ?>
                    </div>

                    <div>
                        <h4>Vendedores</h4>
                        <?php
                            $Ven->listar();
                        ?>
                    </div>

                    <div>
                        <h4>Veiculos</h4>
                        <?php
                            $Vei->listar();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</head>

</html>