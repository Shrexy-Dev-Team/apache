<?php

    file_put_contents("info.json", '');

    require_once('query.php');

    $server = new Query('localhost');
    //or new Query('some.minecraftserver.com', $port, $timeout);

    if ($server->connect())
    {
    $info = $server->get_info();
    $json_data = json_encode($info);
    file_put_contents("info.json", $json_data);
    }
    else{
    $json_data = "{\"status\":\"offline\"}";
    file_put_contents("info.json", $json_data);
    }

    ?>