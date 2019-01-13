<link rel="stylesheet" href="_dist/_css/_core.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"  rel="stylesheet" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<body style="background: #C6FFDD; background: -webkit-linear-gradient(to right, #f7797d, #FBD786, #C6FFDD); background: linear-gradient(to right, #f7797d, #FBD786, #C6FFDD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"></body>
<?php

require dirname(__FILE__).'/_sys/_api.php';
require_once './_dist/_css/_core.php';
$api_files = '_sys/_api.php';
ob_start();
session_start();

if (isset($_SESSION['username'])) {
    $query_a = "SELECT * FROM `user` WHERE `username` = '".$_SESSION['username']."'";
    $query_b = query($query_a);
    $pdo = $query_b->fetch();
}
if ($_GET) {
} else {
    rdr('?page=index');
}
if (isset($_GET['page'])) {
    $page = '_page/'.$_GET['page'].'.php';
    if (file_exists($page)) {
        include $page;
    } else {
        rdr('?page=index');
    }
}
?>