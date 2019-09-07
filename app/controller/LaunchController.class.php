<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;

    class LaunchController extends AbsController{
       
        public function buscar($id) {
            $launch = Conversor::getConteudoLaunch($id);
            echo $launch;
        }
    }


?>