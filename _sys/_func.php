<?php
function rdr($url){
    header("location: ".$url);
    exit();
}
function encode($password){
  $en = sha1($password);
  return $en;
}
function query($sql,$array=array()){
    global $api;
    $q = $api->sql->prepare($sql);
    $q->execute($array);
    return $q;
}
