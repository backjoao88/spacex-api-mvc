<?php

    namespace app\model\interfaces\IGenericCrud;

    interface IGenericCrud{

        public function insert($obj);
        public function update($obj);
        public function delete($obj);
        public function findAll();

    }


?>