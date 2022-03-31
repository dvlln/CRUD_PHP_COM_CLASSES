<?php
    class cliente{
        protected $ID_Cliente;
        public $CPF_Cliente;
        private $Nome_Cliente;
        private $vendedor;
        private $veiculo;

        function listar(){
            try{
                include 'conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "select * from cliente;";

                $stmt = $conexao->prepare($query);
                $stmt->execute();
                
                //Salva o resultado em um array
                $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($cliente as $clie){
                    echo '<div class="Resultado">';
                        echo "<p>".$clie['CPF_Cliente']." - ".$clie['Nome_Cliente']."</p>";
                        
                        echo '<div class="BotoesCRUD">';
                            echo '<a class="ButaoCRUD" href="delete/deleteClientes.php?id_cliente='.$clie['ID_Cliente'].'">Excluir</a>';
                            echo '<a class="ButaoCRUD" href="?id_cliente='.$clie['ID_Cliente'].'&cpf_cliente='.$clie['CPF_Cliente'].'&nome_cliente='.$clie['Nome_Cliente'].'">Alterar</a>';
                        echo '</div>';
                    echo '</div>';
                }

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        public function cadastrar($idcliente, $nomecliente){
            try{
                include '../conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                $query = 'insert into cliente value(null,:CPF_Cliente, :Nome);';

                $stmt = $conexao->prepare($query);
                $stmt->bindValue(':CPF_Cliente', $idcliente);
                $stmt->bindValue(':Nome', $nomecliente);

                $stmt->execute();
                echo "<a href='../home.php' />";

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        public function alterar(){
            try{
                include_once 'conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "update cliente set CPF_Cliente=:cpf_cliente, Nome_Cliente=:nome where ID_Cliente=:id;";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(':id',$_POST['id_cliente']);
                $stmt->bindValue(':cpf_cliente',$_POST['cpf_cliente']);
                $stmt->bindValue(':nome',$_POST['nome_cliente']);

                $stmt->execute();
                echo "<a href='../home.php' />";
                

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        function deletar(){
            try{
                include_once 'conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "delete from cliente where ID_Cliente=:id;";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(':id',$_GET['id_cliente']);

                $stmt->execute();
                echo "<a href='../home.php' />";

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        public function getIDCliente(){
            return $this->ID_Cliente;
        }

        public function setIDCliente($IDCliente){
            $this->ID_Cliente = $IDCliente;
        }

        public function getCPFCliente(){
            return $this->CPF_Cliente;
        }

        public function setCPFCliente($CPFCliente){
            $this->CPF_Cliente = $CPFCliente;
        }

        public function getNomeCliente(){
            return $this->Nome_Cliente;
        }

        public function setNomeCliente($NomeCliente){
            $this->Nome_Cliente = $NomeCliente;
        }
    }
?>