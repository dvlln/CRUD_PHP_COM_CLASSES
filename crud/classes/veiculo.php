<?php
    class veiculo{
        protected $ID_Veiculo;
        private $Tipo;
        private $Marca;
        private $Modelo;
        private $Cor;

        function listar(){
            try{
                include 'conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "select * from veiculo;";

                $stmt = $conexao->prepare($query);
                $stmt->execute();
                
                //Salva o resultado em um array
                $veiculo = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($veiculo as $vei){
                    echo '<div class="Resultado">';
                        echo "<p>".$vei['Tipo']." - ".$vei['Marca']." - ".$vei['Modelo']." - ".$vei['Cor']."</p>";

                        echo '<div class="BotoesCRUD">';
                            echo '<a class="ButaoCRUD" href="delete/deleteVeiculos.php?id_veiculo='.$vei['ID_Veiculo'].'">Excluir</a>';
                            echo '<a class="ButaoCRUD" href="?id_veiculo='.$vei['ID_Veiculo'].'&tipo='.$vei['Tipo'].'&marca='.$vei['Marca'].'&modelo='.$vei['Modelo'].'&cor='.$vei['Cor'].'">Alterar</a>';
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
                $query = 'insert into veiculo value(null, :Tipo, :Marca, :Modelo, :Cor);';

                $stmt = $conexao->prepare($query);
                $stmt->bindValue(':Tipo',$_POST['tipo']);
                $stmt->bindValue(':Marca',$_POST['marca']);
                $stmt->bindValue(':Modelo',$_POST['modelo']);
                $stmt->bindValue(':Cor',$_POST['cor']);

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
                
                $query = "update veiculo set ID_Veiculo=:id, Tipo=:tipo, Marca=:marca, Modelo=:modelo, Cor=:cor where ID_Veiculo=:id;";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(':id',$_POST['id_veiculo']);
                $stmt->bindValue(':tipo',$_POST['tipo']);
                $stmt->bindValue(':marca',$_POST['marca']);
                $stmt->bindValue(':modelo',$_POST['modelo']);
                $stmt->bindValue(':cor',$_POST['cor']);

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
                
                $query = "delete from veiculo where ID_Veiculo=:id;";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(':id',$_GET['id_veiculo']);

                $stmt->execute();
                echo "<a href='../home.php' />";

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        public function getIDVeiculo(){
            return $this->ID_Vendedor;
        }
        public function setIDVeiculo($IDVeiculo){
            $this->ID_Veiculo = $IDVeiculo;
        }
        public function getTipo(){
            return $this->Tipo;
        }
        public function setTipo($Tipo){
            $this->Tipo = $Tipo;
        }
        public function getMarca(){
            return $this->Marca;
        }
        public function setMarca($Marca){
            $this->Marca = $Marca;
        }
        public function getModelo(){
            return $this->Modelo;
        }
        public function setModelo($Modelo){
            $this->Modelo = $Modelo;
        }
        public function getCor(){
            return $this->Cor;
        }
        public function setCor($Cor){
            $this->Cor = $Cor;
        }
    }
?>