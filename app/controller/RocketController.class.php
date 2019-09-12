<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;
    use core\Redirecionador;
    use app\model\dto\Rocket;
    use DateTime;
    use app\model\dao\RocketDAOMySQL;
    use app\model\bo\RocketBO;

    class RocketController extends AbsController{
       
        public function buscar($id) {
            $rocket = Conversor::getConteudoRocket($id);
            echo $rocket;
        }

        public function cadastrar() {
            $this->requisitarView('rocket/cadastrar', 'baseHtml');
        }

        public function inserir($request) {
            $result = 0;
            if (isset($request->post->rocketID) && $request->post->rocketID != "") {
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
            }            
            Redirecionador::paraARota('cadastrar?cadastrado=' . $result);
        }

        public function listar(){
                        
            $rocketDAO = new RocketDAOMySQL();
            $rocketBO = new RocketBO($rocketDAO);

            $this->view->rockets = $rocketBO->findAll();
            
            $this->requisitarView('rocket/listar', 'baseHtml');
        }
    }

?>