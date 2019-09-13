<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;
    use app\model\bo\RocketBO;
    use app\model\dao\LaunchDAOMySQL;
    use app\model\dao\RocketDAOMySQL;
    use app\model\dto\Launch;
    use core\Redirecionador;
    use app\model\bo\LaunchBO;
    use app\model\bo\MissionBO;
    use app\model\dao\MissionDAOMySQL;
    use DateTime;

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
                $launch = (new Launch())
                    ->setFlightNumber($request->post->flightNumber)
                    ->setDate(new DateTime($request->post->date))
                    ->setDescription($request->post->description)
                    ->setImage($request->post->image);

                // VERIFICAR SE ROCKET E MISSION JÁ FOI INSERIDO
                if (isset($request->post->rocketID) && $request->post->rocketID != "") {
                    $rocketBO = new RocketBO((new RocketDAOMySQL));
                    $resultRocket = $rocketBO->findOneByRocketID($request->post->rocketID);
                    if (empty($resultRocket)) {
                        Redirecionador::paraARota('cadastrar?cadastrado=' . 2 . '&a=' . $request->post->rocketID);
                        return;
                    }
                    $launch->setRocket($resultRocket[0]);
                }
                if (isset($request->post->missionID) && $request->post->missionID != "") {
                    $missionBO = new MissionBO((new MissionDAOMySQL()));
                    $resultMission = $missionBO->findOneByMissionID($request->post->missionID);
                    if (empty($resultMission)) {
                        Redirecionador::paraARota('cadastrar?cadastrado=' . 3 . '&a=' . $request->post->missionID);
                        return;
                    }
                    $launch->setMission($resultMission[0]);
                }

                $launchDAOMySQL = new LaunchDAOMySQL();
                $result = $launchDAOMySQL->insert($launch);
            }            
            Redirecionador::paraARota('cadastrar?cadastrado=' . $result);
            return;
        }

        public function listar(){
            $launchDAO = new LaunchDAOMySQL();
            $launchBO = new LaunchBO($launchDAO);

            $this->view->launches = $launchBO->findAll();
            
            $this->requisitarView('launch/listar', 'baseHtml');
        }
    }
?>