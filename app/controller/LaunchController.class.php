<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;
use app\model\bo\RocketBO;
use app\model\dao\LaunchDAOMySQL;
use app\model\dao\RocketDAOMySQL;
use app\model\dto\Launch;

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
            var_dump($request);

            if (isset($request->post->flightNumber) && $request->post->flightNumber != "") {
                // VERIFICAR SE ROCKET E MISSION JÁ FOI INSERIDO
                // findOneByRocketID
                if (isset($request->post->rocketID) && $request->post->rocketID != "") {
                    $rocketBO = new RocketBO((new RocketDAOMySQL));
                    $result = $rocketBO->findOneByRocketID($request->post->rocketID);
                    echo '<br><br><br><br>result:<br><br>';
                    echo $result;
                }

                // $launch = (new Launch())
                //     ->setFlightNumber($request->post->flightnumber)
                //     ->setDate(new DateTime($request->post->date))
                //     ->setRocket($request->post->objectrocket)
                //     ->setMission($request->post->objectmission)
                //     ->setDescription($request->post->description)
                //     ->setImage($request->post->image);
            
                // $launchDAOMySQL = new LaunchDAOMySQL();
                // $result = $launchDAOMySQL->insert($launch);
            }            
            // Redirecionador::paraARota('cadastrar?cadastrado=' . $result);
        }

        public function listar(){

            $this->requisitarView('launch/listar', 'baseHtml');
        }
    }
?>