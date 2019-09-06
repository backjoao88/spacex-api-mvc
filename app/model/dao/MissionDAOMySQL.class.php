<?php

    namespace app\model\dao;

    use app\model\dto\Mission;
    use app\conexao\Conexao;
    use app\model\interfaces\IGenericDB;
    use PDO;

    class MissionDAOMySQL implements IGenericDB{

        const TABLE_NAME = "MISSION";

        public function insert($mission){

        }

        public function update($mission){
            
        }

        public function delete($mission){
        
        }
        
        public function find($mission){
        
        }
        
        public function findAll(){
           
        }
        
    }

?>