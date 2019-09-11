<?php

    $rota[] = ['/', 'HomeController@index'];
    $rota[] = ['/rocket/{id}/buscar', 'RocketController@buscar'];
    $rota[] = ['/launch/{id}/buscar', 'LaunchController@buscar'];
    $rota[] = ['/mission/{id}/buscar', 'MissionController@buscar'];
    $rota[] = ['/rocket/cadastrar', 'RocketController@cadastrar'];

    return $rota;

?>