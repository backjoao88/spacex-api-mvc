<?php

    namespace app\model\bo;

    use app\model\interfaces\IGenericDB;
    use app\model\dao\MissionDAOMySQL;
    use app\model\dto\Mission;

    class MissionBO implements IGenericDB{

        private $missionDAO;

        public function __construct($missionDAO){
            $this->missionDAO = $missionDAO;
        }
        
        public function insert($mission){
            return $this->missionDAO->insert($mission);
        }
        public function update($mission){
            return $this->missionDAO->update($mission);
        }
        public function delete($mission){
            return $this->missionDAO->delete($mission);
        }
        public function find($mission){
            return $this->missionDAO->find($mission);
        }    
        public function findAll(){
            return $this->missionDAO->findAll();
        }

    }

?>