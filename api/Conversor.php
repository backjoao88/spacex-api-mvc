<?php

namespace api;

use app\model\dto\Rocket;
use app\model\dto\Mission;
use app\model\dto\Launch;
use DateTime;

/**
 * Classe que busca um json a partir de uma api específica
 */
class Conversor{

    /**
     * API que será utilizada - SpaceX
     */
    private const URL = "https://api.spacexdata.com/v3/";

    /**
     * Retorna URL completa de um determinado caminho
     */
    private static function getURLCompleta($path){
        return self::URL . $path;
    }

    /**
     * Verifica se a URL informada não irá retornar o código 500 (Internal Server Error) ou
     * 404 (URL não encontrada)
     */
    private static function isURLValida($url){
        $cabecalho = @get_headers($url);
        $existe = strpos($cabecalho[0],'500') || strpos($cabecalho[0],'404')  === false ? 1 : 0;
        return $existe;
    }

    /**
     * Retorna um objeto stdClass proveniente do request para a api
     */
    private static function getConteudo($path){
        $url = self::getURLCompleta($path);

        if(self::isURLValida($url) == 1){
            return json_decode(file_get_contents($url));
        }else{
            return false;
        }
    }

    /**
     * Método que retorna uma classe rocket a partir do id do rocket desejado
     */
    public static function getConteudoRocket($id) {
        $data = self::getConteudo("rockets/" . $id);
        if (!$data) {
            return null;
        }

        $rocket = (new Rocket())
            ->setRocketId($data->rocket_id)
            ->setName($data->rocket_name)
            ->setDescription($data->description)
            ->setFirstFlight(new DateTime($data->first_flight))
            ->setHeight($data->height->meters)
            ->setDiameter($data->diameter->meters)
            ->setMass($data->mass->kg)
            ->setImage($data->flickr_images[0]);
        
        return json_encode($rocket, JSON_PRETTY_PRINT);
    }

    /**
     * Método que retorna uma classe mission a partir do id da mission desejada
     */
    public static function getConteudoMission($id) {
        $data = self::getConteudo("missions/" . $id);
        if (!$data) {
            return null;
        }

        $mission = (new Mission())
            ->setMissionId($data->mission_id)
            ->setName($data->mission_name)
            ->setDescription($data->description);
        
        return json_encode($mission, JSON_PRETTY_PRINT);
    }

    /**
     * Método que retorna uma classe launch a partir do id da launch desejada
     */
    public static function getConteudoLaunch($id) {
        $data = self::getConteudo("launches/" . $id);
        if (!$data) {
            return null;
        }

        $launch = (new Launch())
            ->setFlightNumber($data->flight_number)
            ->setDate(new DateTime($data->launch_date_utc))
            ->setRocket((new Rocket())->setRocketId($data->rocket->rocket_id))
            ->setMission(!empty($data->mission_id) ? (new Mission())->setMissionId($data->mission_id[0]) : null)
            ->setDescription($data->details)
            ->setImage($data->links->mission_patch_small);
        
        return json_encode($launch, JSON_PRETTY_PRINT);
    }
}