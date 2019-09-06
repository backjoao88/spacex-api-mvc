<?php

    namespace app\model\dao;

    use app\model\dto\Rocket;
    use app\conexao\Conexao;
    use app\model\interfaces\IGenericDB;
    use PDO;

    class RocketDAOMySQL implements IGenericDB{

        const TABLE_NAME = "ROCKET";

        public function insert($rocket){

        }

        public function update($rocket){
            
        }

        public function delete($rocket){
        
        }
        
        public function find($rocket){
        
        }
        
        public function findAll(){
           
        }
        
    }

?>