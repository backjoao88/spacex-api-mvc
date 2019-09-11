<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;

    class RocketController extends AbsController{
       
        public function buscar($id) {
            $rocket = Conversor::getConteudoRocket($id);
            echo $rocket;
        }

        public function cadastrar() {
            $this->requisitarView('rocket/cadastrar', 'baseHtml');
        }
    }

?>