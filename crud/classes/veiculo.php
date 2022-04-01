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

        function cadastrar($tipo, $marca, $modelo, $cor){
            try{
                include '../conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                $query = 'insert into veiculo value(null, :Tipo, :Marca, :Modelo, :Cor);';

                $stmt = $conexao->prepare($query);
                $stmt->bindValue(':Tipo', $tipo);
                $stmt->bindValue(':Marca',$marca);
                $stmt->bindValue(':Modelo',$modelo);
                $stmt->bindValue(':Cor',$cor);

                $stmt->execute();
            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
            }
        }

        function alterar($id, $tipo, $marca, $modelo, $cor){
            try{
                include '../conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "update veiculo set ID_Veiculo=:id, Tipo=:tipo, Marca=:marca, Modelo=:modelo, Cor=:cor where ID_Veiculo=:id;";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(':id',$id);
                $stmt->bindValue(':Tipo', $tipo);
                $stmt->bindValue(':Marca',$marca);
                $stmt->bindValue(':Modelo',$modelo);
                $stmt->bindValue(':Cor',$cor);

                $stmt->execute();

                echo "<a href='../home.php' />";

            } catch(PDOException $error){
                echo "Error: ".$error->getMessage();
                echo '<br>'.'<a href="../home.php">Voltar</a>';
            }
        }

        function deletar($id){
            try{
                include '../conexao.php';
                $conexao = new PDO($dns,$user,$pass);
                
                $query = "delete from veiculo where ID_Veiculo=:id;";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(':id',$id);

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