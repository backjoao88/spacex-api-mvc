<?php

    $rota[] = ['/', 'HomeController@index'];
    
    $rota[] = ['/rocket/{id}/buscar', 'RocketController@buscar'];
    $rota[] = ['/rocket/cadastrar', 'RocketController@cadastrar'];
    $rota[] = ['/rocket/inserir', 'RocketController@inserir'];
    
    $rota[] = ['/launch/{id}/buscar', 'LaunchController@buscar'];
    $rota[] = ['/mission/{id}/buscar', 'MissionController@buscar'];

    return $rota;

?>