<?php

class Shop
{
    public function buy($id, $name, $category)
    {
        global $api;
        @ini_set('display_errors', '0');
        //require dirname(__FILE__).'/_rcon.php';

        $rcon = query("SELECT * FROM `server` WHERE `name` = '$name'")->fetch();
        $user = query('SELECT * FROM `user` WHERE `username`=?', array($_SESSION['username']))->fetch();
        $item = query('SELECT * FROM `item` WHERE `id`=?;', array($id))->fetch();

        $host = $rcon['ip'];
        $password = $rcon['rconpass'];
        $port = $rcon['port'];
        $timeout = 300;
        $c = new Rcon($host, $port, $password, $timeout);
        if ($user['point'] >= $item['price']) {
            $com1 = $item['command1'];
            $com2 = $item['command2'];
            $com3 = $item['command3'];
            $com4 = $item['command4'];
            $com5 = $item['command5'];
            $com6 = $item['command6'];
            $com7 = $item['command7'];
            $com8 = $item['command8'];
            $com9 = $item['command9'];
            $com10 = $item['command10'];

            $command1 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com1);

            $command2 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com2);

            $command3 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com3);

            $command4 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com4);

            $command5 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com5);

            $command6 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com6);

            $command7 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com7);

            $command8 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com8);

            $command9 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com9);

            $command10 = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $item['name']), $com10);

            if ($c->connect()) {
                $c->connect();
            } else {
                echo '<script type="text/javascript">
                swal("Error","ผิดพลาด ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้ในขณะนี้","error");
                </script>';

                return false;
                exit();
            }
            $c->send_command($command1);
            $c->send_command($command2);
            $c->send_command($command3);
            $c->send_command($command4);
            $c->send_command($command5);
            $c->send_command($command6);
            $c->send_command($command7);
            $c->send_command($command8);
            $c->send_command($command9);
            $c->send_command($command10);
            $point = $user['point'] - $item['price'];
            query('UPDATE `user` SET `point`=? WHERE `username`=?;', array($point, $_SESSION['username']));
            $itemname = $item['name'];
            echo "<script type='text/javascript'>
setTimeout(function(){			
	location.href = '?page=shop&name=$category&server=$name';				}, 2000);
                swal('Success','ดำเนินการสำเร็จ กรุณารอรับไอเทม $itemname ภายในเกม!','success');
                </script>";

            return true;
        } else {
            return false;
        }
    }
}
