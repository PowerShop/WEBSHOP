<link rel="stylesheet" href="_dist/_css/_core.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require dirname(__FILE__).'/_sys/_api.php';
$api_files = '_sys/_api.php'; 
ob_start();
session_start();

if(isset($_SESSION['username'])){
  $query_a = "SELECT * FROM `user` WHERE `username` = '".$_SESSION['username']."'";
  $query_b = query($query_a);
  $pdo = $query_b->fetch();
}
if($_GET){

}else{
rdr("?page=index");
}
if(isset($_GET['page'])){
  $page = '_page/'.$_GET['page'].'.php';
  if(file_exists($page)){
    include $page;
  }else{
    rdr("?page=index");
  }
}
?>