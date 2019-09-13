<?php

    namespace app\model\bo;

    use app\model\interfaces\IGenericDB;
    use app\model\dao\RocketDAOMySQL;
    use app\model\dto\Rocket;

    class LaunchBO implements IGenericDB{

        private $launchDAO;

        public function __construct($launchDAO){
            $this->launchDAO = $launchDAO;
        }
        
        public function insert($launch){
            return $this->launchDAO->insert($launch);
        }
        public function update($launch){
            return $this->launchDAO->update($launch);
        }
        public function delete($launch){
            return $this->launchDAO->delete($launch);
        }
        public function findOneByFlightNumber($launch){
            return $this->launchDAO->findOneByFlightNumber($launch);
        }
        public function find($launch){
            return $this->launchDAO->find($launch);
        }    
        public function findAll(){
            return $this->launchDAO->findAll();
        }

    }

?>