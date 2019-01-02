<?php
class Shop{
    public function buy($id){
        global $api;
        @ini_set('display_errors', '0'); 
        $user = query("SELECT * FROM `user` WHERE `username`=?",array($_SESSION['username']))->fetch();
        $item = query("SELECT * FROM `item` WHERE `id`=?;",array($id))->fetch();
        if($user['point']>=$item['price']){
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

$command1 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com1);

$command2 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com2);

$command3 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com3);

$command4 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com4);

$command5 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com5);

$command6 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com6);

$command7 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com7);

$command8 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com8);

$command9 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com9);

$command10 = str_replace(array("{user}","{group}"),array($_SESSION['username'],$item['name']),$com10);

            if($api->rcon->connect()){
                $api->rcon->connect();
            }else{ 
                echo '<script type="text/javascript">
                swal("Error","ผิดพลาด ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้ในขณะนี้","error");
                </script>';
                return false;
                exit();
            }
            $api->rcon->send_command($command1);
  $api->rcon->send_command($command2);
  $api->rcon->send_command($command3);
  $api->rcon->send_command($command4);
  $api->rcon->send_command($command5);
  $api->rcon->send_command($command6);
  $api->rcon->send_command($command7);
  $api->rcon->send_command($command8);
  $api->rcon->send_command($command9);
  $api->rcon->send_command($command10);
            $point = $user['point'] - $item['price'];
            query("UPDATE `user` SET `point`=? WHERE `username`=?;",array($point,$_SESSION['username']));
            unset($_SESSION['point']);
            $_SESSION['point'] = $user['point'];
            $itemname = $item['name'];
            echo "<script type='text/javascript'>
                swal('Success','ดำเนินการสำเร็จ กรุณารอรับไอเทม $itemname ภายในเกม!','success');
                </script>";
                return true;
        }else{
                return false;
        }
    }
    public function add($title,$price,$command1,$command2,$command3,$command4,$command5,$command6,$command7,$command8,$command9,$command10,$image,$category){
        global $api;
        if($_SESSION['admin'] == "true"){
            query("INSERT INTO `item` (`id`,`name`,`price`,`image`,`command1`,`command2`,`command3`,`command4`,`command5`,`command6`,`command7`,`command8`,`command9`,`command10`,`category`) VALUES ('?','".$title."','".$price."','".$image."','".$command1."','".$command2."','".$command3."','".$command4."','".$command5."','".$command6."','".$command7."','".$command8."','".$command9."','".$command10."','".$category."')");
            echo "<script type='text/javascript'>
                swal('Success','ดำเนินการสำเร็จ เพิ่มสินค้า $title เเล้ว!','success');
                </script>";
        }else{

        }

    }
    public function delete($id){
        global $api;
        if(isset($_SESSION['admin']) == "true"){
            query("DELETE FROM `item` WHERE `id`=?",array($id));
            echo "<script type='text/javascript'>
                swal('Success','ดำเนินการสำเร็จ ลบสินค้าเเล้ว!','success');
                </script>";

        }else{
           
        }

    }
}
