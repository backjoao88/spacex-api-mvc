<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;
    use core\Redirecionador;
    use app\model\dto\Rocket;
    use DateTime;
    use app\model\dao\RocketDAOMySQL;

    class RocketController extends AbsController{
       
        public function buscar($id) {
            $rocket = Conversor::getConteudoRocket($id);
            echo $rocket;
        }

        public function cadastrar() {
            $this->requisitarView('rocket/cadastrar', 'baseHtml');
        }

        public function inserir($request) {
            if (!isset($request->post->rocketID)) {
                Redirecionador::paraARota('/');
            }

            $rocket = (new Rocket())
                ->setRocketId($request->post->rocketID)
                ->setName($request->post->name)
                ->setDescription($request->post->description)
                ->setFirstFlight(new DateTime($request->post->firstFlight))
                ->setHeight($request->post->height)
                ->setDiameter($request->post->diameter)
                ->setMass($request->post->mass)
                ->setImage($request->post->image);
            
            $rocketDAOMySQL = new RocketDAOMySQL();
            $result = $rocketDAOMySQL->insert($rocket);
            Redirecionador::paraARota('cadastrar?cadastrado=' . $result);
        }
    }

?>