<?php

    require_once('./vendor/autoload.php');

    use PHPUnit\Framework\TestCase;

    use app\model\dto\Launch;
    use app\model\dao\LaunchDAOMySQL;
    use app\model\bo\LaunchBO;
    use app\model\interfaces\IGenericDB;
    
    class UnitTestCRUDLaunch extends TestCase{

        public function testInserirLaunch(){

            $launchDAO = new LaunchDAOMySQL();
            $launchBO = new LaunchBO($launchDAO);

            $rocketDAO = new RocketDAOMySQL();
            $rocketBO = new RocketBO($launchDAO);

            $missionDAO = new MissionDAOMySQL();
            $missionBO = new MissionBO($missionDAO);

            $rocket = $rocketBO->find((new Rocket())->setId(1));

            $mission = $missionBO->find((new Mission())->setId(2));

            $launch = (new Launch())->setFlightNumber(12323)
                                  ->setDate('12/02/2018')
                                  ->setRocket($rocket)
                                  ->setMission($mission)
                                  ->setDescription('TESTE123')
                                  ->setImage('123');
                       
            $result = $launchBO->inserir($launch);
            $this->assertEquals(true, $result);

        }

        public function testAlterarLaunch(){


        }

        public function testDeletarLaunch(){


        }

    }
    
?>