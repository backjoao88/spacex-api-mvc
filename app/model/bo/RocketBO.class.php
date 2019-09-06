<?php

    namespace app\model\bo;

    use app\model\interfaces\IGenericDB;
    use app\model\dao\RocketDAOMySQL;
    use app\model\dto\Rocket;

    class RocketBO implements IGenericDB{

        private $rocketDAO;

        public function __construct($rocketDAO){
            $this->rocketDAO = $rocketDAO;
        }
        
        public function insert($rocket){
            return $this->rocketDAO->insert($rocket);
        }
        public function update($rocket){
            return $this->rocketDAO->update($rocket);
        }
        public function delete($rocket){
            return $this->rocketDAO->delete($rocket);
        }
        public function find($rocket){
            return $this->rocketDAO->find($rocket);
        }    
        public function findAll(){
            return $this->rocketDAO->findAll();
        }

    }

?>