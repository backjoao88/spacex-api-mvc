<?php

    require_once('./vendor/autoload.php');

    use PHPUnit\Framework\TestCase;

    use app\model\dto\Rocket;
    use app\model\dao\RocketDAOMySQL;
    use app\model\bo\RocketBO;
    use app\model\interfaces\IGenericDB;
    
    class UnitTestCRUDRocket extends TestCase{

        public function testInserirRocket(){

            $rocketDAO = new RocketDAOMySQL();
            $rocketBO = new RocketBO($rocketDAO);

            $rocket = (new Rocket())->setRocketId('M233')
                                    ->setName('ROCKET234')
                                    ->setDescription('ROCKET MUITO LINDA')
                                    ->setFirstFlight('11/07/2017')
                                    ->setHeight(15)
                                    ->setDiameter(5)
                                    ->setMass(1200)
                                    ->setImage('123');

            $result = $rocketBO->inserir($rocket);
            $this->assertEquals(true, $result);

        }

        public function testAlterarRocket(){


        }

        public function testDeletarRocket(){

        }

    }
    
?>