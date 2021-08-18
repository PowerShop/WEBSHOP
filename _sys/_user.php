<?php

class User

{

public function Register($username, $password, $confpassword)

{

global $api;

if ($username == '') { //ตรวจสอบค่าว่าง

echo "<script type='text/javascript'>

swal('Check Username','โปรดกรอก Username','warning');

</script>";

} else { //หาก Username ไม่ซํ้า จะทำการตรวจสอบว่า Username ซํ้ากับในระบบหรือไม่

if ($password == '') {

echo "<script type='text/javascript'>

swal('Check Password','โปรดกรอก Password','warning');

</script>";

} else {

if ($confpassword == '') {

echo "<script type='text/javascript'>

swal('Check Password','โปรดกรอก Confirm Password','warning');

</script>";

} 
}
}
if (query('SELECT * FROM `user` WHERE `username` =?;', array($username))->rowCount() == 1) {

echo "<script type='text/javascript'>

swal('ขออภัย','Username ซํ้ากับในระบบ','error');

</script>";

}else{
if ($username and $password and $confpassword !== '') {

query("INSERT INTO `user` (`uid`,`username`,`password`,`point`,`credits`,`rank`,`admin`) VALUES ('','".$username."','".$password."','0','0','member','false')");

$i = query('SELECT * FROM `user` WHERE `username` =?;', array($username))->fetch();

$_SESSION['username'] = $i['username'];

echo "<script type='text/javascript'>

setTimeout(function(){

location.href = '?page=login';

}, 2000);

swal('Successfully','สมัครสมาชิกสำเร็จ!','success');

</script>";
}
}
}
public function Login($username, $password)

{

global $api;

if ($username == '') { //ตรวจสอบค่าว่าง

echo "<script type='text/javascript'>

swal('Check Username','โปรดกรอก Username','warning');

</script>";

} else {

if ($password == '') { //ตรวจสอบค่าว่าง

echo "<script type='text/javascript'>

swal('Check Password','โปรดกรอก Password','warning');

</script>";

}

}

if ($username and $password !== '') {

if (query('SELECT * FROM `user` WHERE `username` = ? AND `password` =?;', array($username,$password))->rowCount() == 1) {

$i = query('SELECT * FROM `user` WHERE `username` =?;', array($username))->fetch();

if ($i['password'] == $password) {

$_SESSION['username'] = $i['username'];

$_SESSION['point'] = $i['point'];

$_SESSION['admin'] = $i['admin'];

echo "<script type='text/javascript'>

swal('Success','เข้าสู่ระบบสำเร็จ','success');

setTimeout(function(){

location.href = '?page=index';

}, 2000);

</script>";

} 

} else {

echo "<script type='text/javascript'>

swal('Error','Username & Password ไม่ถูกต้อง','error');

</script>";

}

}

}

public function Logout()

{

session_destroy();

echo "<script type='text/javascript'>

swal('Success','ออกจากระบบสำเร็จ','success');

setTimeout(function(){

location.href = '?page=login';

}, 2000);

</script>";

}

public function ChangePassword($oldpassword, $newpassword, $repassword)

{

if (query("SELECT * FROM `user` WHERE `password` = '$oldpassword' AND `username` =?;", array($_SESSION['username']))->rowCount() == 1) {

$u = query('SELECT * FROM `user` WHERE `username` =?;', array($_SESSION['username']))->fetch();

if ($oldpassword == $u['password']) {

if ($newpassword == $repassword) {

query("UPDATE `user` SET `password` = '$newpassword' WHERE `username` =?;", array($_SESSION['username']));

echo "<script type='text/javascript'>

swal('Success','เปลี่ยนรหัสผ่านสำเร็จ!','success');

</script>";

} else {

echo "<script type='text/javascript'>

swal('Error','รหัสผ่านไม่ตรงกัน!','error');

</script>";

}

}

} else {

echo "<script type='text/javascript'>

swal('Error','เปลี่ยนรหัสผ่านไม่สำเร็จ รหัสผ่านเก่าไม่ถูกต้อง!','error');

</script>";

}

}
public function ChangeAvatar($linkavatar)
{
    query("UPDATE `user` SET `avatar` = '$linkavatar' WHERE `username` =?;", array($_SESSION['username']));

echo "<script type='text/javascript'>

swal('Success','เปลี่ยนอวตาร์สำเร็จ!','success');

</script>";
}

}

