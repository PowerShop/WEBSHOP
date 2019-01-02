<?php
require dirname(__FILE__).'/_func.php';
require dirname(__FILE__).'/_config.php';
require dirname(__FILE__).'/_rcon.php';
require dirname(__FILE__).'/_user.php';
require dirname(__FILE__).'/_redeem.php';
require dirname(__FILE__).'/_jackpot.php';
require dirname(__FILE__).'/_shop.php';
/* APIs */
$api = (object) array(
    "sql" => new PDO("mysql:host=".$_config['db_host']."; dbname=".$_config['db_database'].";", $_config['db_user'], $_config['db_password']),
    "rcon" => new Rcon($_config['mc_host'],$_config['mc_port'],$_config['mc_password'],$_config['mc_timeout']),
    "user" => new User(),
    "redeem" => new Redeem(),
    "jackpot" => new Jackpot(),
    "shop" => new Shop(),
    "status" => json_decode(file_get_contents("https://mcapi-th.cf/mcapi/v1/status/api.php?host=".$_config['mc_host']."&port=".$_config['mc_port']."")),
);
$api->sql->exec("set names utf8");