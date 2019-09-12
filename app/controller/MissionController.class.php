<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;
    use core\Redirecionador;
    use app\model\dto\Mission;
    use app\model\dao\MissionDAOMySQL;
    use app\model\bo\MissionBO;

    class MissionController extends AbsController{
       
        public function buscar($id) {
            $mission = Conversor::getConteudoMission($id);
            echo $mission;
        }

        public function cadastrar() {
            $this->requisitarView('mission/cadastrar', 'baseHtml');
        }

        public function inserir($request) {
            $result = 0;
            if (isset($request->post->missionID) && $request->post->missionID != "") {
                $mission = (new Mission())
                    ->setMissionId($request->post->missionID)
                    ->setName($request->post->name)
                    ->setDescription($request->post->description);
            
                $missionDAOMySQL = new MissionDAOMySQL();
                $result = $missionDAOMySQL->insert($mission);
            }
            Redirecionador::paraARota('cadastrar?cadastrado=' . $result);
        }

        public function listar(){
            $missionDAO = new MissionDAOMySQL();
            $missionBO = new MissionBO($missionDAO);

            $this->view->missions = $missionBO->findAll();
            
            $this->requisitarView('mission/listar', 'baseHtml');
        }
        
    }
?>