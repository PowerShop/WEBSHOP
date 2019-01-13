<?php
@ini_set('display_errors', '0');
require '../_sys/_config.php';
$query = (object) array(
    "api" => json_decode(file_get_contents("https://mcapi-th.cf/mcapi/v1/status/api.php?host=" . $_config['mc_host'] . "&port=" . $_config['mc_port'] . "")),
);
echo $query->api->players->online;
echo " / ";
echo $query->api->players->max;
