<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;
    use app\model\dao\LaunchDAOMySQL;
    use app\model\dto\Launch;
    use app\model\bo\LaunchBO;

class LaunchController extends AbsController{
       
        public function buscar($id) {
            $launch = Conversor::getConteudoLaunch($id);
            echo $launch;
        }

        public function cadastrar() {
            $this->requisitarView('launch/cadastrar', 'baseHtml');
        }

        public function inserir($request) {
            $result = 0;

            // VERIFICAR SE ROCKET E MISSION JÁ FOI INSERIDO

            if (isset($request->post->flightNumber) && $request->post->flightNumber != "") {
                $launch = (new Launch())
                    ->setFlightNumber($request->post->flightnumber)
                    ->setDate(new DateTime($request->post->date))
                    ->setRocket($request->post->objectrocket)
                    ->setMission($request->post->objectmission)
                    ->setDescription($request->post->description)
                    ->setImage($request->post->image);
            
                $launchDAOMySQL = new LaunchDAOMySQL();
                $result = $launchDAOMySQL->insert($launch);
            }            
            Redirecionador::paraARota('cadastrar?cadastrado=' . $result);
        }

        public function listar(){
            $launchDAO = new LaunchDAOMySQL();
            $launchBO = new LaunchBO($launchDAO);

            $this->view->launches = $launchBO->findAll();
            
            $this->requisitarView('launch/listar', 'baseHtml');
        }
    }
?>