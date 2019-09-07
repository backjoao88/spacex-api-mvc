<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;

    class MissionController extends AbsController{
       
        public function buscar($id) {
            $mission = Conversor::getConteudoMission($id);
            echo $mission;
        }
    }


?>