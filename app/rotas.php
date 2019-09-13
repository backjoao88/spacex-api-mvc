<?php

    $rota[] = ['/', 'HomeController@index'];
    
    $rota[] = ['/rocket/{id}/buscar', 'RocketController@buscar'];
    $rota[] = ['/rocket/{id}/visualizar', 'RocketController@visualizar'];
    $rota[] = ['/rocket/cadastrar', 'RocketController@cadastrar'];
    $rota[] = ['/rocket/inserir', 'RocketController@inserir'];
    
    $rota[] = ['/mission/{id}/buscar', 'MissionController@buscar'];
    $rota[] = ['/mission/cadastrar', 'MissionController@cadastrar'];
    $rota[] = ['/mission/inserir', 'MissionController@inserir'];

    $rota[] = ['/launch/{id}/buscar', 'LaunchController@buscar'];
    $rota[] = ['/launch/cadastrar', 'LaunchController@cadastrar'];
    $rota[] = ['/launch/inserir', 'LaunchController@inserir'];

    $rota[] = ['/launches', 'LaunchController@listar'];
    $rota[] = ['/rockets', 'RocketController@listar'];
    $rota[] = ['/missions', 'MissionController@listar'];



    return $rota;

?>