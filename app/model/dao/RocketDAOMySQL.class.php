<?php

    namespace app\model\dao;

    use app\model\dto\Rocket;
    use app\conexao\Conexao;
    use app\model\interfaces\IGenericDB;
    use PDO;

    class RocketDAOMySQL implements IGenericDB{

        const NOME_TABELA = "ROCKET";

        public function insert($rocket){
            try {
                $sql = ""
                    . "INSERT INTO " . self::NOME_TABELA . " (rocket_id, name, description, first_flight, 
                    height, diameter, mass, image) "
                    . "VALUES (:rocket_id, :name, :description, :first_flight, :height,
                    :diameter, :mass, :image)";
                $pdo = Conexao::conectar();
                $stmt = $pdo->prepare($sql);
                
                $stmt->bindParam(':rocket_id', $rocketId, PDO::PARAM_STR);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                $stmt->bindParam(':first_flight', $firstFlight, PDO::PARAM_STR);
                $stmt->bindParam(':height', $height, PDO::PARAM_STR);
                $stmt->bindParam(':diameter', $diameter, PDO::PARAM_STR);
                $stmt->bindParam(':mass', $mass, PDO::PARAM_STR);
                $stmt->bindParam(':image', $image, PDO::PARAM_STR);
                
                $rocketId       = $rocket->getRocketId();
                $name           = $rocket->getName();
                $description    = $rocket->getDescription();
                $firstFlight    = $rocket->getFirstFlight()->format('Y-m-d');
                $height         = $rocket->getHeight();
                $diameter       = $rocket->getDiameter();
                $mass           = $rocket->getMass();
                $image          = $rocket->getImage();

                return $stmt->execute();
            }catch (PDOException $e){
                echo 'Erro ao Inserir -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            }
        }

        public function update($rocket){
            
        }

        public function delete($rocket){
            try{
                $pdo = Conexao::conectar();
                $sql = 'DELETE FROM ' . self::NOME_TABELA . ' WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
        
                $id = $rocket->getRocketId();
                
                return $stmt->execute();
            }catch (PDOException $e){
                echo 'Erro ao Excluir -> ' . $e->getMessage();
                return false;
            }finally{
                $pdo = null;
            }
        }
        
        public function find($rocket){
            try{
                $pdo        = Conexao::conectar();
                $sql        = 'SELECT * FROM ' . self::NOME_TABELA . ' WHERE id = :id';
                $stmt      = $pdo->prepare($sql);
    
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $id = $rocket->getId();
    
                $stmt->execute();
    
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $rocket = new Rocket();
                    $rocket->setId($r['ID']);
                    $rocket->setRocketId($r['ROCKET_ID']);
                    $rocket->setName($r['NAME']);
                    $rocket->setDescription($r['DESCRIPTION']);
                    $rocket->setFirstFlight($r['FIRST_FLIGHT']);
                    $rocket->setHeight($r['HEIGHT']);
                    $rocket->setDiameter($r['DIAMETER']);
                    $rocket->setMass($r['MASS']);
                    $rocket->setImage($r['IMAGE']);
                }
    
           
               return $rocket;
            }catch (PDOException $e){
                echo 'Erro ao Listar -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            }
        }
        
        public function findAll(){
            try{
                $pdo = Conexao::conectar();
                $sql = 'SELECT * FROM ' . self::NOME_TABELA;
                $query = $pdo->query($sql);
                $rockets = $query->fetchAll(PDO::FETCH_ASSOC);
                $listaRockets = [];
                foreach($rockets as $k => $r){
                    $rocket = new Rocket();
                    $rocket->setId($r['ID']);
                    $rocket->setRocketId($r['ROCKET_ID']);
                    $rocket->setName($r['NAME']);
                    $rocket->setDescription($r['DESCRIPTION']);
                    $rocket->setFirstFlight($r['FIRST_FLIGHT']);
                    $rocket->setHeight($r['HEIGHT']);
                    $rocket->setDiameter($r['DIAMETER']);
                    $rocket->setMass($r['MASS']);
                    $rocket->setImage($r['IMAGE']);
                    $listaRockets[] = $rocket;
                } 
                return $listaRockets;
            }catch (PDOException $e){
                echo 'Erro ao Listar -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            }
        }
        
    }

?>