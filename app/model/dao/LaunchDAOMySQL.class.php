<?php

    namespace app\model\dao;

    use app\model\dto\Launch;
    use app\conexao\Conexao;
    use app\model\interfaces\IGenericDB;
    use PDO;

    class LaunchDAOMySQL implements IGenericDB{

        const TABLE_NAME = "LAUNCH";

        public function insert($launch){
            try {
                $sql = ""
                    . "INSERT INTO " . self::NOME_TABELA . " (flight_number, date, rocket_id, mission_id, 
                    description, image) "
                    . "VALUES (:flight_number, :date, :rocket_id, :mission_id, :description, :image)";
                $pdo = Conexao::conectar();
                $stmt = $pdo->prepare($sql);
                
                $stmt->bindParam(':flight_number', $flightNumber, PDO::PARAM_STR);
                $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                $stmt->bindParam(':rocket_id', $rocketId, PDO::PARAM_STR);
                $stmt->bindParam(':mission_id', $missionId, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                $stmt->bindParam(':image', $image, PDO::PARAM_STR);
                
                $flightNumber       = $launch->getFlightNumber();
                $date               = $launch->getDate();
                $rocketId           = $launch->getRocketId();
                $missionId          = $launch->getMissionId();
                $description        = $launch->getDescription();
                $image              = $launch->getImage();

                return $stmt->execute();
            }catch (PDOException $e){
                echo 'Erro ao Inserir -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            }
        }

        public function update($launch){
            
        }

        public function delete($launch){
        
        }
        
        public function find($launch){

        }
        
        public function findAll(){
           
        }
        
    }

?>