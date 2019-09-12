<?php

    namespace app\controller;

    use core\AbsController;
    use api\Conversor;
    use core\Redirecionador;
    use app\model\dto\Mission;
    use app\model\dao\MissionDAOMySQL;

    class MissionController extends AbsController{
       
        public function buscar($id) {
            $mission = Conversor::getConteudoMission($id);
            echo $mission;
        }

        public function cadastrar() {
            $this->requisitarView('mission/cadastrar', 'baseHtml');
        }

        public function inserir($request) {
            if (!isset($request->post->missionID)) {
                Redirecionador::paraARota('/');
            }

            $mission = (new Mission())
                ->setMissionId($request->post->missionID)
                ->setName($request->post->name)
                ->setDescription($request->post->description);
            
            $missionDAOMySQL = new MissionDAOMySQL();
            $result = $missionDAOMySQL->insert($mission);
            Redirecionador::paraARota('cadastrar?cadastrado=' . $result);
        }
    }
?>