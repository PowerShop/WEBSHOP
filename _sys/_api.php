<?php

require dirname(__FILE__).'/_func.php';
require dirname(__FILE__).'/_config.php';
require dirname(__FILE__).'/_user.php';
// require dirname(__FILE__).'/_redeem.php';
require dirname(__FILE__).'/_jackpot.php';
require dirname(__FILE__).'/_shop.php';
require dirname(__FILE__).'/_wallet.php';
require dirname(__FILE__).'/_backend.php';
/* APIs */
$api = (object) array(
    'sql' => new PDO('mysql:host='.$_config['db_host'].'; dbname='.$_config['db_database'].';', $_config['db_user'], $_config['db_password']),
    'user' => new User(),
    // 'redeem' => new Redeem(),
    'jackpot' => new Jackpot(),
    'shop' => new Shop(),
    'wallet' => new WalletAPI(),
    'backend' => new Backend(),
    'status' => json_decode(file_get_contents('http://localhost/_sys/_status/_api.php?host='.$_config['mc_host'].'&port='.$_config['mc_port'].'')),
);
$api->sql->exec('set names utf8');
