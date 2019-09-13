<?php

    namespace app\model\dao;
    
    use app\model\dto\Launch;
    use app\model\dao\MissionDAOMySQL;
    use app\model\dao\RocketDAOMySQL;
    use app\model\bo\MissionBO;
    use app\model\bo\RocketBO;
    use app\model\dto\Rocket;
    use app\model\dto\Mission;
    use app\conexao\Conexao;
    use app\model\interfaces\IGenericDB;
use DateTime;
use PDO;

    class LaunchDAOMySQL implements IGenericDB{

        const NOME_TABELA = "LAUNCH";

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
                $date               = $launch->getDate()->format('Y-m-d');
                $rocketId           = $launch->getRocket()->getID();
                $missionId          = $launch->getMission() != null ? $launch->getMission()->getID() : null;
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
            try{
                $pdo = Conexao::conectar();
                $sql = 'DELETE FROM ' . self::NOME_TABELA . ' WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
        
                $id = $launch->getLaunchId();
                
                return $stmt->execute();
            }catch (PDOException $e){
                echo 'Erro ao Excluir -> ' . $e->getMessage();
                return false;
            }finally{
                $pdo = null;
            }
        }

        public function findOneByFlightNumber($FLIGHT_NUMBER) {
            try{
                $missionDAO = new MissionDAOMySQL();
                $missionBO = new MissionBO($missionDAO);
                $rocketDAO = new RocketDAOMySQL();
                $rocketBO = new RocketBO($rocketDAO);

                $pdo = Conexao::conectar();
                $sql = 'SELECT * FROM ' . self::NOME_TABELA . ' WHERE FLIGHT_NUMBER = :id';
                $stmt = $pdo->prepare($sql);
    
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $id = $FLIGHT_NUMBER;

                $stmt->execute();

                $launches = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $listaLaunches = [];
                foreach($launches as $k => $l){
                    $launch = new Launch();
                    $launch->setId($l['ID']);
                    $launch->setFlightNumber($l['FLIGHT_NUMBER']);
                    $launch->setDate(new DateTime($l['DATE']));
                    $mission = $missionBO->find((new Mission())->setId($l['ID']));
                    $rocket  = $rocketBO->find((new Rocket())->setId($l['ID']));
                    $launch->setMission($mission);
                    $launch->setRocket($rocket);
                    $launch->setImage($l['IMAGE']);
                    $launch->setDescription($l['DESCRIPTION']);
                    $listaLaunches[] = $launch;
                } 
                return $listaLaunches;
            }catch (PDOException $e){
                echo 'Erro ao Listar -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            }  
        }
        
        public function find($launch){

        }
        
        public function findAll(){
            try{
                $pdo = Conexao::conectar();
                $sql = 'SELECT * FROM ' . self::NOME_TABELA;

                $missionDAO = new MissionDAOMySQL();
                $missionBO = new MissionBO($missionDAO);
                $rocketDAO = new RocketDAOMySQL();
                $rocketBO = new RocketBO($rocketDAO);

                $query = $pdo->query($sql);
                $launches = $query->fetchAll(PDO::FETCH_ASSOC);
                $listaLaunches = [];
                foreach($launches as $k => $l){
                    $launch = new Launch();
                    $launch->setId($l['ID']);
                    $launch->setFlightNumber($l['FLIGHT_NUMBER']);
                    $launch->setDate($l['DATE']);
                    $mission = $missionBO->find((new Mission())->setId($l['ID']));
                    $rocket  = $rocketBO->find((new Rocket())->setId($l['ID']));
                    $launch->setMission($mission);
                    $launch->setRocket($rocket);
                    $launch->setImage($l['IMAGE']);
                    $launch->setDescription($l['DESCRIPTION']);
                    $listaLaunches[] = $launch;
                } 
                return $listaLaunches;
            }catch (PDOException $e){
                echo 'Erro ao Listar -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            }  
        }
        
    }

?>