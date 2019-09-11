<?php

    require_once('./vendor/autoload.php');

    use PHPUnit\Framework\TestCase;

    use app\model\dto\Mission;
    use app\model\dao\MissionDAOMySQL;
    use app\model\bo\MissionBO;
    use app\model\interfaces\IGenericDB;
    
    class UnitTestCRUDMission extends TestCase{

        public function testInserirMission(){

            $missionDAO = new MissionDAOMySQL();
            $missionBO = new MissionBO($produtoDAO);

            $mission = (new Mission())->setMissionId('1233')
                                    ->setName('MISSION-24')
                                    ->setDescription('LEMBRAR DE NAO ESQUECER DE REALIZAR O OBJETIVO');

            $result = $missionBO->inserir($mission);
            $this->assertEquals(true, $result);

        }

        public function testAlterarMission(){


        }

        public function testDeletarMission(){
        }

    }
    
?>