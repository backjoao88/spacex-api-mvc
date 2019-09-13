<?php

    namespace app\model\dao;

    use app\model\dto\Mission;
    use app\conexao\Conexao;
    use app\model\interfaces\IGenericDB;
    use PDO;

    class MissionDAOMySQL implements IGenericDB{

        const NOME_TABELA = "MISSION";

        public function insert($mission){
            try {
                $sql = ""
                    . "INSERT INTO " . self::NOME_TABELA . " (mission_id, name, description)"
                    . " VALUES (:mission_id, :name, :description)";
                $pdo = Conexao::conectar();
                $stmt = $pdo->prepare($sql);
                
                $stmt->bindParam(':mission_id', $missionId, PDO::PARAM_STR);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                
                $missionId      = $mission->getMissionId();
                $name           = $mission->getName();
                $description    = $mission->getDescription();

                return $stmt->execute();
            }catch (PDOException $e){
                echo 'Erro ao Inserir -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            }
        }

        public function update($mission){
            
        }

        public function delete($mission){
            try{
                $pdo = Conexao::conectar();
                $sql = 'DELETE FROM ' . self::NOME_TABELA . ' WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
        
                $id = $mission->getMissionId();
                
                return $stmt->execute();
            }catch (PDOException $e){
                echo 'Erro ao Excluir -> ' . $e->getMessage();
                return false;
            }finally{
                $pdo = null;
            }
        }
        
        public function find($mission){
            try{
                $pdo        = Conexao::conectar();
                $sql        = 'SELECT * FROM ' . self::NOME_TABELA . ' WHERE id = :id';
                $stmt      = $pdo->prepare($sql);
    
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $id = $mission->getId();
    
                $stmt->execute();
    
                while ($m = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $mission = new Mission();
                    $mission->setMissionId($m['missionId']);
                    $mission->setName($m['name']);
                    $mission->setDescription($m['description']);
                }
    
           
               return $mission;
            }catch (PDOException $e){
                echo 'Erro ao Listar -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            }
        }

        public function findOneByMissionID($missionID) {
            try{
                $pdo = Conexao::conectar();
                $sql = 'SELECT * FROM ' . self::NOME_TABELA . ' WHERE mission_id = :id';
                $stmt = $pdo->prepare($sql);
    
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $id = $missionID;

                $stmt->execute();
                $result = [];
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[]= (new Mission())
                        ->setId($linha['ID'])
                        ->setMissionId($linha['MISSION_ID'])
                        ->setName($linha['NAME'])
                        ->setDescription($linha['DESCRIPTION']);
                }

                return $result;
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
                $missions = $query->fetchAll(PDO::FETCH_ASSOC);
                $listaMissions = [];
                foreach($missions as $k => $m){
                    $mission = new Mission();
                    $mission->setId($m['ID']);
                    $mission->setMissionId($m['MISSION_ID']);
                    $mission->setName($m['NAME']);
                    $mission->setDescription($m['DESCRIPTION']);
                    $listaMissions[] = $mission;
                } 
                return $listaMissions;
            }catch (PDOException $e){
                echo 'Erro ao Listar -> ' . $e->getMessage();
            }finally{
                $pdo = null;
            } 
        }
        
    }

?>