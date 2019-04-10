<?php
/*
Random Key
 */
@ini_set('display_errors', '0');
//require dirname(__FILE__).'/_rcon.php';
class Redeem
{
    public function random_key($len = 16)
    {

        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $key = '';
        $num = strlen($chars);

        for ($i = 0; $i < $len; ++$i) {
            $key .= $chars[rand() % $num];
            $key .= '';
        }

        return $key;
    }

    public function AddRedeem($name, $command, $redeem)
    {
    	global $api;
    	if ($redeem == "")
    	{
			$code = $api->redeem->random_key();
			query("INSERT INTO `code`(`name`,`command`,`redeem`) VALUES ('".$name."','".$command."','".$code."')");
			echo "<script type='text/javascript'>
        swal('Success','เพิ่มโค๊ดสำเร็จ!','success');
        </script>";
   	 } 
   	if ($redeem !== "")
   	{
   		query("INSERT INTO `code`(`name`,`command`,`redeem`) VALUES ('".$name."','".$command."','".$redeem."')");
   		echo "<script type='text/javascript'>
        swal('Success','เพิ่มโค๊ดสำเร็จ!','success');
        </script>";
   	}
    }
    
    public function Remove($id)
    {
    	global $api;
    	$code = query('SELECT * FROM `code` WHERE `id`=?;', array($id))->fetch();
    	query('DELETE FROM `code` WHERE `id` =?;', array($id));
   	 echo "<script type='text/javascript'>
        swal('Success','ลบโค๊ด ".$code['name']." สำเร็จ!','success');
        </script>";
       //rdr('?page=backend&itemcode=true');
    }

    
    public function CheckRedeem($redeem, $name)
    {
        global $api;
        $rcon = query("SELECT * FROM `server` WHERE `name` = '$name'")->fetch();
        $host = $rcon['ip'];
        $password = $rcon['rconpass'];
        $port = $rcon['port'];
        $timeout = 300;
        $c = new Rcon($host, $port, $password, $timeout);
        if (query('SELECT * FROM `code` WHERE `redeem`=?;', array($redeem))->rowCount() == 1) {
            $code = query('SELECT * FROM `code` WHERE `redeem`=?;', array($redeem))->fetch();
            echo "<script type='text/javascript'>
                    swal('สำเร็จ!','คุณได้รับ ".$code['name']."','success');
                    </script>";
$command = str_replace(array('{user}', '{group}'), array($_SESSION['username'], $code['name']), $code['command']);
if ($c->connect()) {
                $c->connect();
            } else {
                echo '<script type="text/javascript">
                swal("Error","ผิดพลาด ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้ในขณะนี้","error");
                </script>';

                return false;
                exit();
            }
            $c->send_command($command);
            query('DELETE FROM `code` WHERE `redeem` =?;', array($redeem));
        } else {
            echo "<script type='text/javascript'>
                    swal('ไม่สำเร็จ!','โค๊ดไม่ถูกต้อง','error');
                    </script>";
        }
    }
}
