<?php

    namespace app\model\dao;

    use app\model\dto\Launch;
    use app\conexao\Conexao;
    use app\model\interfaces\IGenericDB;
    use PDO;

    class LaunchDAOMySQL implements IGenericDB{

        const TABLE_NAME = "LAUNCH";

        public function insert($launch){

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