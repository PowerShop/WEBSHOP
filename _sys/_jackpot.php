<?php
class Jackpot
{
public function Random($server)
{

$key= '';
$key .= mt_rand(1, 2);
$key .= '';
$rcon = query("SELECT * FROM `server` WHERE `name` = '$server'")->fetch();

$host = $rcon['ip'];

$password = $rcon['rconpass'];

$port = $rcon['port'];

$timeout = 300;

$c = new Rcon($host, $port, $password, $timeout);

$u = query("SELECT * FROM `user` WHERE `username` =?;", array($_SESSION['username']))->fetch();

$x = $u['point'];

$y = 1;

$z = $x - $y;

if (query("SELECT * FROM `jackpot` WHERE `number` = '$key'")->rowCount() == 1) {

$p = query("SELECT * FROM `jackpot` WHERE `number` = '$key'")->fetch();

$keynum = $p['keynum'];

$number = $p['number'];

$item = $p['name'];

if ($keynum == 1) {

$x = $u['point'];

$y = 1;

$z = $x - $y;

query("UPDATE `user` SET `point` = '$z' WHERE `username`=?;", array($_SESSION['username']));

$jcommand = $p['command'];

$command = str_replace(array("{user}", "{group}"), array($_SESSION['username'], $p['name']), $jcommand);

if ($c->connect()) {

$c->connect();

$c->send_command($command);

echo "<p class='text-center' style='text-align: center'><script type='text/javascript'>

swal('Success!!','ยินดีด้วยท่านสุ่มได้หมายเลข $key ของรางวัลคือ $item','success');

</script></p>";

} else {

echo "<script type='text/javascript'>

swal('Error','ผิดพลาด เซิร์ฟเวอร์ไม่ตอบสนอง หมายเลขที่ท่านสุ่มได้คือ $key ของรางวัลคือ $item โปรดเก็บภาพนี้ไว้เป็นหลักฐานในการยืนยันของรางวัลกับ Admin *กรุณาเเคปภาพในมือถือ','error');

</script>";

}

}

if ($keynum == 2) {

$point1 = $p['point'];

$point2 = $u['point'];

$point3 = $point2 + $point1 - 1;

query("UPDATE `user` SET `point` = '$point3' WHERE `username` =?;", array($_SESSION['username']));

if ($number == $key) {

echo "<script type='text/javascript'>

swal('Success!!','ยินดีด้วยท่านสุ่มได้หมายเลข $key ของรางวัลคือ $point1 พอยท์!','success');

</script>";

} else {

}

}

} else {

query("UPDATE `user` SET `point` = '$z' WHERE `username`=?;", array($_SESSION['username']));

echo "<script type='text/javascript'>

swal('น่าเสียดาย','ยินดีด้วยท่านสุ่มได้หมายเลข $key เเต่ไม่มีของรางวัล','error');

</script>";

}

/* if($key !== ""){

echo "<script type='text/javascript'>

swal('Success!!','ยินดีด้วยท่านสุ่มได้หมายเลข $key ของรางวัลคือ ไม่มี','success');

</script>";

} */

return false;

}

}


?>
