<?php

    namespace app\model\interfaces;

    interface IGenericDB{

        public function insert($obj);
        public function update($obj);
        public function delete($obj);
        public function find($obj);
        public function findAll();

    }


?>