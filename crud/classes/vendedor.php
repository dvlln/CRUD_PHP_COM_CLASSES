<?php
    class vendedor{
        protected $ID_Vendedor;
        public $CPF_Vendedor;
        private $Nome_Vendedor;

        function listar(){
            try{
                include 'conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "select * from vendedor;";

                $stmt = $conexao->prepare($query);
                $stmt->execute();
                
                //Salva o resultado em um array
                $vendedor = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($vendedor as $vend){
                    echo '<div class="Resultado">';
                        echo "<p>".$vend['CPF_Vendedor']." - ".$vend['Nome_Vendedor']."</p>";

                        echo '<div class="BotoesCRUD">';
                            echo '<a class="ButaoCRUD" href="delete/deleteVendedores.php?id_vendedor='.$vend['ID_Vendedor'].'">Excluir</a>';
                            echo '<a class="ButaoCRUD" href="?id_vendedor='.$vend['ID_Vendedor'].'&cpf_vendedor='.$vend['CPF_Vendedor'].'&nome_vendedor='.$vend['Nome_Vendedor'].'">Alterar</a>';
                        echo '</div>';
                    echo '</div>';
                }

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        function cadastrar(){
            try{
                include_once 'conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                $query = 'insert into vendedor value(null, :CPF_Vendedor, :Nome);';

                $stmt = $conexao->prepare($query);
                $stmt->bindValue(':CPF_Vendedor',$_POST['cpf_vendedor']);
                $stmt->bindValue(':Nome',$_POST['nome_vendedor']);

                $stmt->execute();
                echo "<a href='../home.php' />";

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        function alterar(){
            try{
                include_once 'conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "update vendedor set CPF_Vendedor=:cpf_vendedor, Nome_Vendedor=:nome where ID_Vendedor=:id;";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(':id',$_POST['id_vendedor']);
                $stmt->bindValue(':cpf_vendedor',$_POST['cpf_vendedor']);
                $stmt->bindValue(':nome',$_POST['nome_vendedor']);

                $stmt->execute();

                echo "<a href='../home.php' />";

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
                echo '<br>'.'<a href="../home.php">Voltar</a>';
            }
        }

        function deletar(){
            try{
                include_once 'conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "delete from vendedor where ID_Vendedor=:id;";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(':id',$_GET['id_vendedor']);

                $stmt->execute();
                echo "<a href='../home.php' />";

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        public function getIDVendedor(){
            return $this->ID_Vendedor;
        }
        public function setIDVendedor($IDVendedor){
            $this->ID_Vendedor = $IDVendedor;
        }
        public function getCPFVendedor(){
            return $this->CPF_Vendedor;
        }
        public function setCPFVendedor($CPFVendedor){
            $this->CPF_Vendedor = $CPFVendedor;
        }
        public function getNomeVendedor(){
            return $this->Nome_Vendedor;
        }
        public function setNomeVendedor($NomeVendedor){
            $this->Nome_Vendedor = $NomeVendedor;
        }
    }
?>