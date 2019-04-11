<?php
/* ระบบ Save ข้อมูล Backend */
class Backend 
{
	public function saverefill($email,$password)
	{
		global $api;
		@ini_set('display_errors','0');
		$query = "UPDATE `sys_truewallet` SET `username` = '$email', `password` = '$password' WHERE `sys_truewallet`.`id` = 1";
		query($query);
		echo "<script type='text/javascript'>
		setTimeout(function(){
				location.href = '?page=backend&refill=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ แก้ไขข้อมูลเรียบร้อย!','success');
                </script>";
	}
	
	public function additem($title, $price, $command1, $command2, $command3, $command4, $command5, $command6, $command7, $command8, $command9, $command10, $image, $category,$server)
    {
        global $api;
        if ($_SESSION['admin'] == 'true') {
            query("INSERT INTO `item` (`id`,`name`,`price`,`image`,`command1`,`command2`,`command3`,`command4`,`command5`,`command6`,`command7`,`command8`,`command9`,`command10`,`category`,`server`) VALUES ('?','".$title."','".$price."','".$image."','".$command1."','".$command2."','".$command3."','".$command4."','".$command5."','".$command6."','".$command7."','".$command8."','".$command9."','".$command10."','".$category."','".$server."')");
            echo "<script type='text/javascript'>
            setTimeout(function(){
				location.href = '?page=backend&additem=true';
				}, 2000);
				swal('Success','ดำเนินการสำเร็จ เพิ่มสินค้า $title เเล้ว!','success');
                </script>";
        } else {
        	echo "<script type='text/javascript'>
        setTimeout(function(){
				location.href = '?page=backend&additem=true';
				}, 2000);
                swal('Error','ดำเนินการไม่สำเร็จ ไม่สามารถเพิ่มสินค้า $title ได้!','error');
                </script>";
        }
    }
    
    public function deleteitem($id)
    {
        global $api;
        if (isset($_SESSION['admin']) == 'true') {
        	$item = query('SELECT * FROM `item` WHERE `id` = ?;',array($id))->fetch();
            query('DELETE FROM `item` WHERE `id`=?;',array($id));
            echo "<script type='text/javascript'>
            setTimeout(function(){
				location.href = '?page=backend&listitem=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบสินค้า ".$item['name']." เเล้ว!','success');
                </script>";
                
        } else {
        	echo "<script type='text/javascript'>
        	setTimeout(function(){
				location.href = '?page=backend&listitem=true';
				}, 2000);
                swal('Error','ดำเนินการไม่สำเร็จ ไม่สามารถลบสินค้าได้!','error');
                </script>";
                
        }
        
    }
    
    public function addserver($name,$ip,$port,$pass)
    {
    	global $api;
    query("INSERT INTO `server` (`id`,`name`,`ip`,`port`,`rconpass`) VALUES ('?','".$name."','".$ip."','".$port."','".$pass."')");
    $server = query('SELECT * FROM `server` WHERE `name` = ?;', array($name))->fetch();
    echo "<script type='text/javascript'>
    setTimeout(function(){
				location.href = '?page=backend&rconserver=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ เพิ่ม Server ".$server['name']." สำเร็จ','success');
                </script>";
    }
  
  public function deleteserver($id)
  {
  	global $api;
  	$server = query('SELECT * FROM `server` WHERE `id` = ?;', array($id))->fetch();
  	query("DELETE FROM `server` WHERE `id` = ?;",array($id));
  echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&rconserver=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบ Server ".$server['name']." สำเร็จ','success');
                </script>";
  }
  
  public function editrcon($ids,$names,$ips,$ports,$passs)
  {
  	global $api;
	query("UPDATE `server` SET `name` = '$names', `ip` = '$ips', `port` = '$ports', `rconpass` = '$passs' WHERE `server`.`id` = '$ids'");
	echo "<script type='text/javascript'>
	setTimeout(function(){
				location.href = '?page=backend&rconserveredit=true&id=$ids';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ แก้ไขข้อมูล Server เรียบร้อย!','success');
                </script>";
  }
  
  public function CheckConnect($ip,$port,$pass)
  {
  	$timeout = 300;
  	$c = new Rcon($ip, $port, $pass, $timeout);
  if($c->connect())
  {
  	echo "<script type='text/javascript'>
                swal('Test Connect Success','เชื่อมต่อ Server สำเร็จ!','success');
                </script>";
  } else {
  	echo "<script type='text/javascript'>
                swal('Test Connect Failed','เชื่อมต่อ Server ไม่สำเร็จ!','error');
                </script>";
  }
  
  }
  
  public function edititem($id,$name,$price,$img,$server,$category,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10)
  {
  	global $api;
  		query("UPDATE `item` SET `name` = '$name', `command1` = '$c1', `command2` = '$c2', `command3` = '$c3', `command4` = '$c4', `command5` = '$c5', `command6` = '$c6', `command7` = '$c7', `command8` = '$c8', `command9` = '$c9', `command10` = '$c10', `image` = '$img', `price` = '$price', `category` = '$category', `server` = '$server' WHERE `item`.`id` = '$id'");
  		$item = query("SELECT * FROM `item` WHERE `id` = ?;", array($id))->fetch();
  		echo "<script type='text/javascript'><?php
/* ระบบ Save ข้อมูล Backend */
class Backend 
{
	public function saverefill($email,$password)
	{
		global $api;
		@ini_set('display_errors','0');
		$query = "UPDATE `sys_truewallet` SET `username` = '$email', `password` = '$password' WHERE `sys_truewallet`.`id` = 1";
		query($query);
		echo "<script type='text/javascript'>
		setTimeout(function(){
				location.href = '?page=backend&refill=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ แก้ไขข้อมูลเรียบร้อย!','success');
                </script>";
	}
	
	public function additem($title, $price, $command1, $command2, $command3, $command4, $command5, $command6, $command7, $command8, $command9, $command10, $image, $category,$server)
    {
        global $api;
$item = query("SELECT * FROM `categoryshop` WHERE `name` = ?;", array($category))->fetch();
$categorys = $item['category'];
        if ($_SESSION['admin'] == 'true') {
            query("INSERT INTO `item` (`id`,`name`,`price`,`image`,`command1`,`command2`,`command3`,`command4`,`command5`,`command6`,`command7`,`command8`,`command9`,`command10`,`category`,`server`) VALUES ('?','".$title."','".$price."','".$image."','".$command1."','".$command2."','".$command3."','".$command4."','".$command5."','".$command6."','".$command7."','".$command8."','".$command9."','".$command10."','".$categorys."','".$server."')");
            echo "<script type='text/javascript'>
            setTimeout(function(){
				location.href = '?page=backend&additem=true';
				}, 2000);
				swal('Success','ดำเนินการสำเร็จ เพิ่มสินค้า $title เเล้ว!','success');
                </script>";
        } else {
        	echo "<script type='text/javascript'>
        setTimeout(function(){
				location.href = '?page=backend&additem=true';
				}, 2000);
                swal('Error','ดำเนินการไม่สำเร็จ ไม่สามารถเพิ่มสินค้า $title ได้!','error');
                </script>";
        }
    }
    
    public function deleteitem($id)
    {
        global $api;
        if (isset($_SESSION['admin']) == 'true') {
        	$item = query('SELECT * FROM `item` WHERE `id` = ?;',array($id))->fetch();
            query('DELETE FROM `item` WHERE `id`=?;',array($id));
            echo "<script type='text/javascript'>
            setTimeout(function(){
				location.href = '?page=backend&listitem=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบสินค้า ".$item['name']." เเล้ว!','success');
                </script>";
                
        } else {
        	echo "<script type='text/javascript'>
        	setTimeout(function(){
				location.href = '?page=backend&listitem=true';
				}, 2000);
                swal('Error','ดำเนินการไม่สำเร็จ ไม่สามารถลบสินค้าได้!','error');
                </script>";
                
        }
        
    }
    
    public function addserver($name,$ip,$port,$pass)
    {
    	global $api;
    query("INSERT INTO `server` (`id`,`name`,`ip`,`port`,`rconpass`) VALUES ('?','".$name."','".$ip."','".$port."','".$pass."')");
    $server = query('SELECT * FROM `server` WHERE `name` = ?;', array($name))->fetch();
    echo "<script type='text/javascript'>
    setTimeout(function(){
				location.href = '?page=backend&rconserver=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ เพิ่ม Server ".$server['name']." สำเร็จ','success');
                </script>";
    }
  
  public function deleteserver($id)
  {
  	global $api;
  	$server = query('SELECT * FROM `server` WHERE `id` = ?;', array($id))->fetch();
  	query("DELETE FROM `server` WHERE `id` = ?;",array($id));
  echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&rconserver=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบ Server ".$server['name']." สำเร็จ','success');
                </script>";
  }
  
  public function editrcon($ids,$names,$ips,$ports,$passs)
  {
  	global $api;
	query("UPDATE `server` SET `name` = '$names', `ip` = '$ips', `port` = '$ports', `rconpass` = '$passs' WHERE `server`.`id` = '$ids'");
	echo "<script type='text/javascript'>
	setTimeout(function(){
				location.href = '?page=backend&rconserveredit=true&id=$ids';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ แก้ไขข้อมูล Server เรียบร้อย!','success');
                </script>";
  }
  
  public function CheckConnect($ip,$port,$pass)
  {
  	$timeout = 300;
  	$c = new Rcon($ip, $port, $pass, $timeout);
  if($c->connect())
  {
  	echo "<script type='text/javascript'>
                swal('Test Connect Success','เชื่อมต่อ Server สำเร็จ!','success');
                </script>";
  } else {
  	echo "<script type='text/javascript'>
                swal('Test Connect Failed','เชื่อมต่อ Server ไม่สำเร็จ!','error');
                </script>";
  }
  
  }
  
  public function edititem($id,$name,$price,$img,$server,$category,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10)
  {
  	global $api;
  		query("UPDATE `item` SET `name` = '$name', `command1` = '$c1', `command2` = '$c2', `command3` = '$c3', `command4` = '$c4', `command5` = '$c5', `command6` = '$c6', `command7` = '$c7', `command8` = '$c8', `command9` = '$c9', `command10` = '$c10', `image` = '$img', `price` = '$price', `category` = '$category', `server` = '$server' WHERE `item`.`id` = '$id'");
  		$item = query("SELECT * FROM `item` WHERE `id` = ?;", array($id))->fetch();
  		echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&edititem=true&editid=$id';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ แก้ไขข้อมูลสินค้า ".$item['name']." เรียบร้อย!','success');
                </script>";
  }
  
  public function addjackpot($name,$number,$command,$point,$key)
  {
  	global $api;
  		query("INSERT INTO `jackpot` (`id`,`number`,`name`,`point`,`command`,`keynum`) VALUES ('?','".$number."','".$name."','".$point."','".$command."','".$key."')");
  		//$jackpot = query("SELECT * FORM `jackpot` WHERE `number` = ?;", array($number))->fetch();
  		echo "<script type='text/javascript'>
  		setTimeout(function(){
				location.href = '?page=backend&jackpot=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ เพิ่ม Jackpot เรียบร้อย!','success');
                </script>";
  }
  
  public function deletejackpot($id)
  {
  	global $api;
  		$i = query("SELECT * FROM `jackpot` WHERE `id` = ?;", array($id))->fetch();
  		query("DELETE FROM `jackpot` WHERE `id` = ?;", array($id));
 		 echo "<script type='text/javascript'>
		  setTimeout(function(){
				location.href = '?page=backend&jackpot=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบ Jackpot เลข ". $i['number']. " เรียบร้อย!','success');
                </script>";
  }
  
  public function addcategory($nameth,$nameeng,$server)
  {
  	global $api;
  		if (query('SELECT * FROM `categoryshoplist` WHERE `nameth` =?;', array($nameth))->rowCount() == 1)
 		 	{
  				query("INSERT INTO `categoryshoplist` (`id`,`nameth`) VALUES ('?','".$nameth."')");
  				echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&categorylist=true';
				}, 2000);
                swal('Warning','ดำเนินการไม่สำเร็จ ประเภทสินค้าซํ้า!','warning');
                </script>";
  			} else {
  				query("INSERT INTO `categoryshoplist` (`id`,`nameth`) VALUES ('?','".$nameth."')");
  				echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&categorylist=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ เพิ่มประเภทสินค้าเรียบร้อย!','success');
                </script>";
  			}
  		
  		if (query("SELECT * FROM `categoryshop` WHERE `category` = '$nameeng' AND `name` = '$nameth'")->rowCount() == 1)
  		{
  			
  		} else {
  			query("INSERT INTO `categoryshop` (`id`,`category`,`name`,`server`) VALUES ('?','".$nameeng."','".$nameth."','".$server."')");
  	}
  
  }
  
  public function editcategory($id,$name,$nameth,$nameeng,$server)
  {
  	global $api;
  query("UPDATE `categoryshop` SET `category` = '$nameeng', `name` = '$nameth', `server` = '$server' WHERE `id` = '$id'");
  query("UPDATE `categoryshoplist` SET `nameth` = '$nameth' WHERE `categoryshoplist`.`nameth` = '$name'");
  echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&editcategory=true&id=$id';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ  แก้ไขข้อมูลเรียบร้อย!','success');
                </script>";
  }
  
  public function deletecategoryshoplist($id)
  {
  	global $api;
  		$item = query("SELECT * FROM `categoryshoplist` WHERE `id` = ?;", array($id))->fetch();
  		query("DELETE FROM `categoryshoplist` WHERE `id` = ?;", array($id));
  			echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&categorylist=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบประเภทสินค้า ".$item['nameth']." สำเร็จ!','success');
                </script>";
  }
  
  public function deletecategoryshop($id)
  {
  	global $api;
  		$item = query("SELECT * FROM `categoryshop` WHERE `id` = ?;", array($id))->fetch();
  		query("DELETE FROM `categoryshop` WHERE `id` = ?;", array($id));
  			echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&categorylist=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบประเภทสินค้า ".$item['name']." สำเร็จ!','success');
                </script>";
  }
  
  public function addimg($link)
  {
  	global $api;
  		query("INSERT INTO `img` (`id`,`img`) VALUES ('?','$link')");
  		$img = query("SELECT * FROM `img` WHERE `img` = ?;", array($link))->fetch();
  		echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&systemall=true&imgslide=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ เพิ่มรูปภาพ ".$img['img']." สำเร็จ!','success');
                </script>";
  }
  
  public function imgdelete($id)
  {
  	global $api;
  		$img = query("SELECT * FROM `img` WHERE `id` = ?;", array($id))->fetch();
  		query("DELETE FROM `img` WHERE `id` = ?;", array($id));
  			echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&systemall=true&imgslide=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบรูปภาพไอดี ".$img['id']." สำเร็จ!','success');
                </script>";
  }
  
  public function savepage($id)
  {
  	global $api;
  		query("UPDATE `system` SET `id_page` = ?;", array($id));
  		echo "<script type='text/javascript'>
  		setTimeout(function(){
				location.href = '?page=backend&systemall=true&fbpage=true';
				}, 2000);
                swal('Success','อัพเดทไอดีเพจสำเร็จ!','success');
                </script>";
  }
  
}
?>
  setTimeout(function(){
				location.href = '?page=backend&edititem=true&editid=$id';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ แก้ไขข้อมูลสินค้า ".$item['name']." เรียบร้อย!','success');
                </script>";
  }
  
  public function addjackpot($name,$number,$command,$point,$key)
  {
  	global $api;
  		query("INSERT INTO `jackpot` (`id`,`number`,`name`,`point`,`command`,`keynum`) VALUES ('?','".$number."','".$name."','".$point."','".$command."','".$key."')");
  		//$jackpot = query("SELECT * FORM `jackpot` WHERE `number` = ?;", array($number))->fetch();
  		echo "<script type='text/javascript'>
  		setTimeout(function(){
				location.href = '?page=backend&jackpot=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ เพิ่ม Jackpot เรียบร้อย!','success');
                </script>";
  }
  
  public function deletejackpot($id)
  {
  	global $api;
  		$i = query("SELECT * FROM `jackpot` WHERE `id` = ?;", array($id))->fetch();
  		query("DELETE FROM `jackpot` WHERE `id` = ?;", array($id));
 		 echo "<script type='text/javascript'>
		  setTimeout(function(){
				location.href = '?page=backend&jackpot=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบ Jackpot เลข ". $i['number']. " เรียบร้อย!','success');
                </script>";
  }
  
  public function addcategory($nameth,$nameeng,$server)
  {
  	global $api;
  		if (query('SELECT * FROM `categoryshoplist` WHERE `nameth` =?;', array($nameth))->rowCount() == 1)
 		 	{
  				query("INSERT INTO `categoryshoplist` (`id`,`nameth`) VALUES ('?','".$nameth."')");
  				echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&categorylist=true';
				}, 2000);
                swal('Warning','ดำเนินการไม่สำเร็จ ประเภทสินค้าซํ้า!','warning');
                </script>";
  			} else {
  				query("INSERT INTO `categoryshoplist` (`id`,`nameth`) VALUES ('?','".$nameth."')");
  				echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&categorylist=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ เพิ่มประเภทสินค้าเรียบร้อย!','success');
                </script>";
  			}
  		
  		if (query("SELECT * FROM `categoryshop` WHERE `category` = '$nameeng' AND `name` = '$nameth'")->rowCount() == 1)
  		{
  			
  		} else {
  			query("INSERT INTO `categoryshop` (`id`,`category`,`name`,`server`) VALUES ('?','".$nameeng."','".$nameth."','".$server."')");
  	}
  
  }
  
  public function editcategory($id,$name,$nameth,$nameeng,$server)
  {
  	global $api;
  query("UPDATE `categoryshop` SET `category` = '$nameeng', `name` = '$nameth', `server` = '$server' WHERE `id` = '$id'");
  query("UPDATE `categoryshoplist` SET `nameth` = '$nameth' WHERE `categoryshoplist`.`nameth` = '$name'");
  echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&editcategory=true&id=$id';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ  แก้ไขข้อมูลเรียบร้อย!','success');
                </script>";
  }
  
  public function deletecategoryshoplist($id)
  {
  	global $api;
  		$item = query("SELECT * FROM `categoryshoplist` WHERE `id` = ?;", array($id))->fetch();
  		query("DELETE FROM `categoryshoplist` WHERE `id` = ?;", array($id));
  			echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&categorylist=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบประเภทสินค้า ".$item['nameth']." สำเร็จ!','success');
                </script>";
  }
  
  public function deletecategoryshop($id)
  {
  	global $api;
  		$item = query("SELECT * FROM `categoryshop` WHERE `id` = ?;", array($id))->fetch();
  		query("DELETE FROM `categoryshop` WHERE `id` = ?;", array($id));
  			echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&categorylist=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบประเภทสินค้า ".$item['name']." สำเร็จ!','success');
                </script>";
  }
  
  public function addimg($link)
  {
  	global $api;
  		query("INSERT INTO `img` (`id`,`img`) VALUES ('?','$link')");
  		$img = query("SELECT * FROM `img` WHERE `img` = ?;", array($link))->fetch();
  		echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&systemall=true&imgslide=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ เพิ่มรูปภาพ ".$img['img']." สำเร็จ!','success');
                </script>";
  }
  
  public function imgdelete($id)
  {
  	global $api;
  		$img = query("SELECT * FROM `img` WHERE `id` = ?;", array($id))->fetch();
  		query("DELETE FROM `img` WHERE `id` = ?;", array($id));
  			echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&systemall=true&imgslide=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบรูปภาพไอดี ".$img['id']." สำเร็จ!','success');
                </script>";
  }
  
  public function savepage($id)
  {
  	global $api;
  		query("UPDATE `system` SET `id_page` = ?;", array($id));
  		echo "<script type='text/javascript'>
  		setTimeout(function(){
				location.href = '?page=backend&systemall=true&fbpage=true';
				}, 2000);
                swal('Success','อัพเดทไอดีเพจสำเร็จ!','success');
                </script>";
  }
  
}
?>
