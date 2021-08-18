<?php
if (!$_SESSION['admin'] == 'true') {
    rdr('?page=index');
} else {
    //NoCode
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Backend</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="col-md-12 font mx-auto sm-auto mt-2">
  <?php include 'menu.php'; ?>
    <div class="card mt-2 bg-warning">
        <img class="card-img-top"alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-home" aria-hidden="true"></i> จัดการหลังร้าน</h4>
            <p class="card-text text-center"><i class="fas fa-list-ul"></i> เครื่องมือ : <a href="?page=backend&additem=true">เพิ่มสินค้า</a> |
            <a href="?page=backend&listitem=true">รายการสินค้า</a> |
            <a href="?page=backend&itemcode=true">ไอเทมโค๊ด</a> |
             <a href="?page=backend&rconserver=true">เซิร์ฟเวอร์</a> |
            <a href="?page=backend&jackpot=true">แจ็คพอต</a> |
            <a href="?page=backend&categorylist=true">ประเภทสินค้า</a> |
            <a href="?page=backend&refill=true">ตั้งค่าการเติมเงิน</a> |
            <a href="?page=backend&systemall=true">ตั้งค่าทั่วไป</a> 
        </p>
        </div>
    </div>
    <?php if (isset($_GET['additem'])) {
    ?>
    <div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มสินค้า</h4>
            <p class="text-center" style="font-size: 12px;">หากยังไม่มีประเภทสินค้าเเละเซิร์ฟเวอร์ ควรเพิ่ม <a href="?page=backend&rconserver=true"><u>เซิร์ฟเวอร์</u></a> และ <a href="?page=backend&categorylist=true"><u>ประเภทสินค้า</u></a> ก่อน</p>
                <form action="" method="post">
                <div class="form-group">
                  <label for="name"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อสินค้า</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อสินค้า...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">ชื่อสินค้า Ex. Wood × 64</small>
                </div>
                <div class="form-group">
                  <label for="price"><i class="fas fa-money-check    "></i> ราคา</label>
                  <input type="number" name="price" id="price" class="form-control" placeholder="ราคาสินค้า...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">ราคาสินค้า Ex. 5</small>
                </div>
                <div class="form-group">
                  <label for="img"><i class="fas fa-image    "></i> ลิ้งค์รูปภาพ</label>
                  <input type="text" name="img" id="img" class="form-control" placeholder="ลิ้งค์รูปภาพ...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">ลิ้งค์รูปภาพ Ex. https://myweb.com/img/diamond.png/</small>
                </div>
                <div class="form-group">
                  <label for=""><i class="fa fa-server" aria-hidden="true"></i> เลือกเซิร์ฟเวอร์</label><p>
                  <select class="btn btn-success" name="server">
                  <?php
$query = 'SELECT * FROM `server`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
                    <option class="" value="<?php echo $row['name']; ?>"> เซิร์ฟเวอร์ : <?php echo $row['name']; ?></option>
                    <?php
        }
    } ?>
                </select>
                  <p>
                  <small id="helpId" class="text-muted">เลือกเซิร์ฟเวอร์ Ex. Survival</small>
                </div>
                <div class="form-group">
                  <label for=""><i class="fa fa-list" aria-hidden="true"></i> เลือกประเภทสินค้า</label><p>
                  <select class="btn btn-success" name="category">
                  <?php
$query = 'SELECT * FROM `categoryshoplist`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
                    <option class="" value="<?php echo $row['nameth']; ?>"> ประเภทสินค้า : <?php echo $row['nameth']; ?></option>
                    <?php
        }
    } ?>
                </select>
                  <p>
                  <small id="helpId" class="text-muted">เลือกประเภทสินค้า Ex. ยศ</small>
                </div>
                <div class="form-group">
                  <label for="c1"><i class="fas fa-code"></i> คำสั่ง</label><p>
                  <small id="helpId" class="text-muted">ใส่คำสั่ง Ex. give {user} diamond 64 | สามารถใส่ได้สูงสุด 10 คำสั่ง หากช่องไหนไม่ต้องการให้ใส่ # ไว้</small>
                  <input type="text" name="c1" id="c1" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c2" id="c2" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c3" id="c3" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c4" id="c4" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c5" id="c5" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c6" id="c6" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c7" id="c7" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c8" id="c8" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c9" id="c9" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#"><p>
                  <input type="text" name="c10" id="c10" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#">
                </div>
                <div class="form-group" style="text-align: center;">
                  <button type="submit" name="additem" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> เพิ่มสินค้า</button>
                </div>
                </form>
        </div>
    </div>
                  <?php
}?>
     <?php if (isset($_GET['listitem'])) {
        ?>
        <div class="card mt-2">
            <div class="card-body" style="font-size: 13px">
                <h4 class="card-title text-center"><i =class="fas fa-list-alt"></i> รายการสินค้า</h4>
<p class="text-center">
<small id="helpId" class="text-muted">เเก้ไขรายละเอียดสินค้า คลิ๊กที่ชื่อสินค้า</small>
</p>
                <p class="card-text">
                    <table class="table text-center">
                        <thead>
                            <tr style="font-size: 13px">
 <th>ชื่อสินค้า</th>
                                												<th>Category</th>
    	<th>Server</th>
   	<th>Action</th>
  	</tr>
  </thead>
                       
 <?php
$query = 'SELECT * FROM `item`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<tbody>
<tr style="font-size: 12px">
                                <td scope="row"><a href="?page=backend&edititem=true&editid=<?php echo $row['id']; ?>"><u><?php echo $row['name']; ?></u></a></td>
                                <td scope="row"><?php echo $row['category']; ?></td>
                                <td scope="row"><?php echo $row['server']; ?></td>
                                <td scope="row"><a style="font-size: 12px" href="?page=backend&listitem=true&deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">ลบสินค้า</a></td>
                            </tr>
                        </tbody>
<?php }} ?>
                    </table>
                </p>
            </div>
        </div>
     <?php
    }?>

<?php if (isset($_GET['edititem'])) {
if ($_GET['editid']){
    ?>
<?php
$id = $_GET['editid'];
$query2 = "SELECT * FROM item WHERE id = $id";
    if ($result2 = query($query2)) {
        while ($row2 = $result2->fetch()) {
            ?>
<p class="text-center">
    <div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-edit aria-hidden="true"></i> แก้ไขสินค้า</h4>
                <form action="" method="post">

 <div class="form-group">
                  <label for="idx"><i class="fa fa-id-card" aria-hidden="true"></i> ไอดีสินค้า</label>
                  <input type="text" name="idx" id="idx" class="form-control" placeholder="ไอดีสินค้า...." aria-describedby="helpId" value="<?php echo $row2['id']; ?>" disabled>
                  <small id="helpId" class="text-muted">ไอดีสินค้า ไม่สามารถเเก้ไขได้</small>
                </div>
<input type="hidden" name="id" id="id" class="form-control" placeholder="ไอดีสินค้า...." aria-describedby="helpId" value="<?php echo $row2['id']; ?>">
                <div class="form-group">
                  <label for="name"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อสินค้า</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อสินค้า...." aria-describedby="helpId" value="<?php echo $row2['name']; ?>">
                  <small id="helpId" class="text-muted">แก้ไขชื่อสินค้า Ex. Wood × 64</small>
                </div>
                <div class="form-group">
                  <label for="price"><i class="fas fa-money-check    "></i> ราคา</label>
                  <input type="number" name="price" id="price" class="form-control" placeholder="ราคาสินค้า...." aria-describedby="helpId" value="<?php echo $row2['price']; ?>">
                  <small id="helpId" class="text-muted">แก้ไขราคาสินค้า Ex. 5</small>
                </div>
                <div class="form-group">
                  <label for="img"><i class="fas fa-image    "></i> ลิ้งค์รูปภาพ</label>
                  <input type="text" name="img" id="img" class="form-control" placeholder="ลิ้งค์รูปภาพ...." aria-describedby="helpId" value="<?php echo $row2['image']; ?>">
                  <small id="helpId" class="text-muted">แก้ไขลิ้งค์รูปภาพ Ex. https://myweb.com/img/diamond.png/</small>
                </div>
                <div class="form-group">
                  <label for=""><i class="fa fa-server" aria-hidden="true"></i> เลือกเซิร์ฟเวอร์</label><p>
                  <select class="btn btn-success" name="server">
                  <?php
$query = 'SELECT * FROM `server`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
                    <option class="" value="<?php echo $row['name']; ?>"> เซิร์ฟเวอร์ : <?php echo $row['name']; ?></option>
                    <?php
        }
    } ?>
                </select>
                  <p>
                  <small id="helpId" class="text-muted">เลือกเซิร์ฟเวอร์ Ex. Survival</small>
                </div>
                <div class="form-group">
                  <label for=""><i class="fa fa-list" aria-hidden="true"></i> เลือกประเภทสินค้า</label><p>
                  <select class="btn btn-success" name="category">
                  <?php
$query = 'SELECT * FROM `categoryshoplist`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
                    <option class="" value="<?php echo $row['nameth']; ?>"> ประเภทสินค้า : <?php echo $row['nameth']; ?></option>
                    <?php
        }
    } ?>
                </select>
                  <p>
                  <small id="helpId" class="text-muted">เลือกประเภทสินค้า Ex. ยศ</small>
                </div>
                <div class="form-group">
                  <label for="c1"><i class="fas fa-code"></i> คำสั่ง</label><p>
                  <small id="helpId" class="text-muted">ใส่คำสั่ง Ex. give {user} diamond 64 | สามารถใส่ได้สูงสุด 10 คำสั่ง หากช่องไหนไม่ต้องการให้ใส่ # ไว้</small>
                  <input type="text" name="c1" id="c1" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command1']; ?>"><p>
                  <input type="text" name="c2" id="c2" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command2']; ?>"><p>
                  <input type="text" name="c3" id="c3" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command3']; ?>"><p>
                  <input type="text" name="c4" id="c4" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command4']; ?>"><p>
                  <input type="text" name="c5" id="c5" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command5']; ?>"><p>
                  <input type="text" name="c6" id="c6" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command6']; ?>"><p>
                  <input type="text" name="c7" id="c7" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command7']; ?>"><p>
                  <input type="text" name="c8" id="c8" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command8']; ?>"><p>
                  <input type="text" name="c9" id="c9" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command9']; ?>"><p>
                  <input type="text" name="c10" id="c10" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command10']; ?>">
                </div>
                <div class="form-group" style="text-align: center;">
                  <button type="submit" name="edititem" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
                </form>
        </div>
    </div>
                  <?php
}}}}
?>
</p>
</div>
</div>
 <?php if (isset($_GET['itemcode'])) {
    ?>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-gift" aria-hidden="true"></i> เพิ่มไอเทมโค๊ด</h4>
<form action="" method="post">
 <div class="form-group">
                  <label for="name"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อไอเทมโค๊ด</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อไอเทมโค๊ด...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">ชื่อไอเทมโค๊ด Ex. Small Pack 1</small>
                </div>

 <div class="form-group">
                  <label for="command"><i class="fa fa-file-code" aria-hidden="true"></i> คำสั่ง</label>
                  <input type="text" name="command" id="command" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted"> คำสั่ง Ex. give {user} 276 1</small>
                </div>

<div class="form-group">
                  <label for="redeem"><i class="fa fa-code" aria-hidden="true"></i> โค๊ด</label>
                  <input type="text" name="redeem" id="redeem" class="form-control" placeholder="โค๊ด...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">ปล่อยเว้นว่างไว้ ระบบจะทำการสุ่มโค๊ดขึ้นมา หรือตั้งได้เองตามต้องการ</small>
                </div>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="addredeem"class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
</form>
</div>
</div>

<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-list" aria-hidden="true"></i> รายการไอเทมโค๊ด</h4>
<p class="card-text" style="overflow-x:auto;">
                    <table class="table text-center">
                        <thead>
                            <tr style="font-size: 13px">
 <th>ชื่อเทมโค๊ด</th>
                                												<th>คำสั่ง</th>
    	<th>โค๊ด</th>
   	<th>Action</th>
  	</tr>
  </thead>
                       
 <?php
$query = 'SELECT * FROM `code`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<tbody>
<tr style="font-size: 12px">
                                <td scope="row"><?php echo $row['name']; ?></a></td>
                                <td scope="row"><?php echo $row['command']; ?></td>
                                <td scope="row"><?php echo $row['redeem']; ?></td>
                                <td scope="row"><a style="font-size: 12px" href="?page=backend&itemcode=true&deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">ลบไอเทมโค๊ด</a></td>
                            </tr>
                        </tbody>
<?php }} ?>
                    </table>
                </p>
</div>
</div>
<?php } ?>

<?php if (isset($_GET['rconserver'])) {
    ?>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-server" aria-hidden="true"></i> เพิ่ม server</h4>
<form action="" method="post">
    <div class="form-group">
                  <label for="name"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อเซิร์ฟเวอร์</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อเซิร์ฟเวอร์...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">เซิร์ฟเวอร์ Minecraft ( Pe & Pc )</small>
                </div>

<div class="form-group">
                  <label for="ip"><i class="fa fa-server" aria-hidden="true"></i> IP เซิร์ฟเวอร์</label>
                  <input type="text" name="ip" id="ip" class="form-control" placeholder="ไอพี...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">IP เซิร์ฟเวอร์ Minecraft ( Pe & Pc ) Ex. 192.168.1.0</small>
                </div>

<div class="form-group">
                  <label for="port"><i class="fa fa-sort-numeric-down" aria-hidden="true"></i> Port เซิร์ฟเวอร์</label>
                  <input type="text" name="port" id="port" class="form-control" placeholder="Port เซิร์ฟเวอร์...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Port เซิร์ฟเวอร์ Minecraft ( Pe & Pc ) Ex. 19132 </small>
                </div>

<div class="form-group">
                  <label for="pass"><i class="fa fa-lock" aria-hidden="true"></i> รหัส Rcon</label>
                  <input type="text" name="pass" id="pass" class="form-control" placeholder="รหัส Rcon...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">รหัส Rcon Minecraft ( Pe & Pc ) Ex. 1212312121</small>
                </div>

<div class="form-group" style="text-align: center;">
                  <button type="submit" name="addserver"class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
</form>
</div>
</div>

<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-list" aria-hidden="true"></i> รายการ Servers</h4>
            <p class="text-center">
<small id="helpId" class="text-muted">เเก้ไขรายละเอียดเซิร์ฟเวอร์ คลิ๊กที่ชื่อเซิร์ฟเวอร์</small>
</p>
<p class="card-text" style="overflow-x:auto;">
                    <table class="table text-center">
                        <thead>
                            <tr style="font-size: 13px">
 <th>ชื่อเซิร์ฟเวอร์</th>
                                												<th>ไอพี</th>
    	<th>พอร์ท</th>
      <th>รหัส Rcon</th>
   	<th>Action</th>
  	</tr>
  </thead>
                       
 <?php
$query = 'SELECT * FROM `server`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<tbody>
<tr style="font-size: 12px">
                                <td scope="row"><a href="?page=backend&rconserveredit=true&id=<?php echo $row['id']; ?>"><u><?php echo $row['name']; ?></u></a></td>
                                <td scope="row"><?php echo $row['ip']; ?></td>
                                <td scope="row"><?php echo $row['port']; ?></td>
                                <td scope="row"><?php echo $row['rconpass'] ?></td>
                                <td scope="row"><a style="font-size: 12px" href="?page=backend&rconserver=true&deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">ลบเซิร์ฟเวอร์</a></td>
                            </tr>
                        </tbody>
<?php }} ?>
                    </table>
                </p>
</div>
</div>
<?php } ?>

<?php if (isset($_GET['rconserveredit'])) {
if ($_GET['id']){
    ?>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-edit" aria-hidden="true"></i> เเก้ไขข้อมูล Server</h4>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM `server` WHERE `id` = '$id'";
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
            	<form action="" method="post">
<div class="form-group">
                  <label for="id"><i class="fa fa-card" aria-hidden="true"></i> ไอดี</label>
                  <input type="text" name="id" id="id" class="form-control" placeholder="ID...." disabled aria-describedby="helpId" value="<?php echo $row['id']; ?>">
                  <small id="helpId" class="text-muted">ID กำกับ Server Minecraft ( Pe & Pc ) ไม่สามารถเเก้ไขได้</small>
                </div>
<input type="hidden" name="uid" id="uid" class="form-control" placeholder="ID...." aria-describedby="helpId" value="<?php echo $row['id']; ?>">
<div class="form-group">
                  <label for="name"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อเซิร์ฟเวอร์</label>
                  <input type="text" name="names" id="name" class="form-control" placeholder="ชื่อเซิร์ฟเวอร์...." aria-describedby="helpId" value="<?php echo $row['name']; ?>">
                  <small id="helpId" class="text-muted">ชื่อ Server Minecraft ( Pe & Pc ) Ex. SmileCraft</small>
                </div>

<div class="form-group">
                  <label for="ip"><i class="fa fa-server" aria-hidden="true"></i> ไอพีเซิร์ฟเวอร์</label>
                  <input type="text" name="ips" id="ip" class="form-control" placeholder="ไอพีเซิร์ฟเวอร์...." aria-describedby="helpId" value="<?php echo $row['ip']; ?>">
                  <small id="helpId" class="text-muted">ไอพี Server Minecraft ( Pe & Pc ) Ex. 192.168.0.1</small>
                </div>

<div class="form-group">
                  <label for="port"><i class="fa fa-sort-numeric-up" aria-hidden="true"></i> พอร์ทเซิร์ฟเวอร์</label>
                  <input type="text" name="ports" id="port" class="form-control" placeholder="พอร์ทเซิร์ฟเวอร์...." aria-describedby="helpId" value="<?php echo $row['port']; ?>">
                  <small id="helpId" class="text-muted">พอร์ท Server Minecraft ( Pe & Pc ) Ex. 19132</small>
                </div>

<div class="form-group">
                  <label for="pass"><i class="fa fa-lock" aria-hidden="true"></i> รหัส Rcon</label>
                  <input type="text" name="passs" id="pass" class="form-control" placeholder="รหัส Rcon...." aria-describedby="helpId" value="<?php echo $row['rconpass']; ?>">
                  <small id="helpId" class="text-muted">รหัส  Rcon Server Minecraft ( Pe & Pc ) Ex. 1212312121</small>
                </div>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="savercon"class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="checkconnect"class="btn btn-danger"><i class="fa fa-cog" aria-hidden="true"></i> Test Connection</button>
                </div>
                <p class="text-center" style="font-size: 12px;">หมายเหตุ หากมีการเเก้ไขชื่อเซิร์ฟเวอร์ กรุณาคลิ๊ก <a href="?page=backend&categorylist=true"><u>ที่นี่</u></a> เพื่อเเก้ไขชื่อเซิร์ฟเวอร์ของประเภทสินค้า #จำเป็น</p>
                </form>
<?php }} ?>
</div>
</div>
</div>
<?php }} ?>

<?php if (isset($_GET['jackpot'])) {
    ?>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-gift" aria-hidden="true"></i> เเจ๊คพอต</h4>
            <form action="" method="post">
<div class="form-group">
                  <label for="name"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อกำกับ</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อกำกับ...." aria-describedby="helpId" value="">
                  <small id="helpId" class="text-muted">ชื่อกำกับ Ex. Diamon ×3 / 10 พอยท์</small>
                </div>
<div class="form-group">
                  <label for="number"><i class="fa fa-sort-numeric-up" aria-hidden="true"></i> เลขเเจ๊คพอต</label>
                  <input type="number" name="number" id="number" class="form-control" placeholder="เลขแจ๊คพอต...." aria-describedby="helpId" value="">
                  <small id="helpId" class="text-muted">เลขเเจ๊คเเพต 1-100 ตั้งมา 1 เลข</small>
                </div>
<div class="form-group">
                  <label for="command"><i class="fa fa-code" aria-hidden="true"></i> คำสั่ง</label>
                  <input type="text" name="command" id="command" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="">
                  <small id="helpId" class="text-muted">คำสั่ง Ex. give {user} diamond 1</small>
                </div>
<div class="form-group">
                  <label for="point"><i class="fa fa-money" aria-hidden="true"></i> พอยท์ที่ได้รับ</label>
                  <input type="number" name="point" id="point" class="form-control" placeholder="พอยท์ที่ได้รับ...." aria-describedby="helpId" value="">
                  <small id="helpId" class="text-muted">เว้นว่างได้ หากเลือก Key เป็น 1 เเต่หากเลือก Key เป็น 2 ให้ใส่จำนวนพอยท์</small>
                </div>
<div class="form-group">
                  <label for="key"><i class="fa fa-key" aria-hidden="true"></i> คีย์</label>
                  <input type="number" name="key" id="key" class="form-control" placeholder="คีย์กำกับ...." aria-describedby="helpId" value="">
                  <small id="helpId" class="text-muted">ใส่เป็นเลข 1 หากของที่ได้รับเป็นไอเทมหรือเงินในเกม ใส่เลข 2 หากของที่ได้รับเป็น พอยท์</small>
                </div>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="addjackpot"class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
</div>
</div>
</form>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-list" aria-hidden="true"></i> List Jackpots</h4>
<p class="card-text" style="overflow-x:auto;">
                    <table class="table text-center">
                        <thead>
                            <tr style="font-size: 13px">
 <th>เลข</th>
                                												<th>ชื่อกำกับ</th>
    	<th>พอยท์</th>
      <th>คำสั่ง</th>
      <th>คีย์</th>
   	<th>Action</th>
  	</tr>
  </thead>
                       
 <?php
$query = 'SELECT * FROM `jackpot`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<tbody>
<tr style="font-size: 12px">
                                <td scope="row"><?php echo $row['number']; ?></td>
                                <td scope="row"><?php echo $row['name']; ?></td>
                                <td scope="row"><?php echo $row['point']; ?></td>
                                <td scope="row"><?php echo $row['command'] ?></td>
                                <td scope="row"><?php echo $row['keynum'] ?></td>
                                <td scope="row"><a style="font-size: 12px" href="?page=backend&jackpot=true&deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ
</a></td>
                            </tr>
                        </tbody>
<?php }} ?>
                    </table>
                </p>
</div>
</div>
<?php } ?>
<?php if (isset($_GET['categorylist'])) {
    ?>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-list" aria-hidden="true"></i> เพิ่มประเภทสินค้า</h4>
<form action="" method="post">
<div class="form-group">
                  <label for="nameth"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อประเภทที่ใช้เเสดง ( THA )</label>
                  <input type="text" name="nameth" id="nameth" class="form-control" placeholder="ชื่อประเภทสินค้า...." aria-describedby="helpId" value="">
                  <small id="helpId" class="text-muted">ประเภทสินค้า Ex. ยศ</small>
                </div>
                
                <div class="form-group">
                  <label for="nameeng"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อประเภทสินค้า ( Eng )</label>
                  <input type="text" name="nameeng" id="nameeng" class="form-control" placeholder="ชื่อประเภทสินค้าแบบภาษาอังกฤษ...." aria-describedby="helpId" value="">
                  <small id="helpId" class="text-muted">ประเภทสินค้าเเบบภาษาอังกฤษ Ex. rank</small>
                </div>
                
                <div class="form-group">
                  <label for=""><i class="fa fa-server" aria-hidden="true"></i> เลือกเซิร์ฟเวอร์</label><p>
                  <select class="btn btn-success" name="server">
                  <?php
$query = 'SELECT * FROM `server`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
                    <option class="" value="<?php echo $row['name']; ?>"> เซิร์ฟเวอร์ : <?php echo $row['name']; ?></option>
                    <?php
        }
    } ?>
                </select>
                  <p>
                  <small id="helpId" class="text-muted">เลือกเซิร์ฟเวอร์ Ex. Survival</small>
                </div>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="addcategory"class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
</form>
</div>
</div>

<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-list" aria-hidden="true"></i> ประเภทสินค้า</h4>
       
<p class="card-text" style="overflow-x:auto;">
                    <table class="table text-center" style="overflow-x:auto;">
                        <thead>
                            <tr style="font-size: 13px">
      <th>ชื่อประเภท</th>
   	<th>Action</th>
  	</tr>
  </thead>
                       
 <?php
$query = 'SELECT * FROM `categoryshoplist`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<tbody>
<tr style="font-size: 12px">
                                <td scope="row"><?php echo $row['nameth']; ?></td>
                                
                                <td scope="row"><a style="font-size: 12px" href="?page=backend&categorylist=true&deletelistid=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ
</a></td>
                            </tr>
                        </tbody>
<?php }} ?>
                    </table>
                </p>
</div>
</div>

	
	<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-list" aria-hidden="true"></i> ประเภทสินค้า ( ใช้ใน Shop )</h4>
       	<p class="text-center" style="font-size: 12px;">หากมีการเเก้ไขชื่อ Server กรุณาเเก้ไขประเภทสินค้าที่ใช้ Server นั้นๆด้วย (คลิ๊กที่ชื่อประเภทเพื่อเเก้ไข)</p>
<p class="card-text" style="overflow-x:auto;">
                    <table class="table text-center">
                        <thead>
                            <tr style="font-size: 13px">
      <th>ชื่อประเภท ( THA )</th>
      <th>ชื่อประเภท ( ENG )</th>
      <th>เซิร์ฟเวอร์</th>
   	<th>Action</th>
  	</tr>
  </thead>
                       
 <?php
$query = 'SELECT * FROM `categoryshop`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<tbody>
<tr style="font-size: 12px">
                                <td scope="row"><a href="?page=backend&editcategory&id=<?php echo $row['id']; ?>"><u><?php echo $row['name']; ?></u></a></td>
                                <td scope="row"><?php echo $row['category']; ?></td>
                                <td scope="row"><?php echo $row['server']; ?></td>
                                <td scope="row"><a style="font-size: 12px" href="?page=backend&categorylist=true&deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ
</a></td>
                            </tr>
                        </tbody>
<?php }} ?>
                    </table>
                </p>
</div>
</div>
<?php } ?>
	
	<?php if (isset($_GET['editcategory'])) {
		if ($_GET['id']){
    ?>
    	
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-edit" aria-hidden="true"></i> แก้ไขประเภทสินค้า</h4>
<form action="" method="post">
	<?php
	$id = $_GET['id'];
$query = "SELECT * FROM `categoryshop` WHERE `id` = '$id'";
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<div class="form-group">
                  <label for="idx"><i class="fa fa-address-card" aria-hidden="true"></i> ไอดี</label>
                  <input type="text" name="idx" id="idx" class="form-control" placeholder="ชื่อประเภทสินค้า...." aria-describedby="helpId" value="<?php echo $row['id']; ?>" disabled>
                  <small id="helpId" class="text-muted">ไอดีกำกับ ไม่สามารถเเก้ไขได้</small>
                </div>
                  <input type="hidden" name="ids" id="ids" class="form-control" placeholder="ไอดีประเภทสินค้า...." aria-describedby="helpId" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="name" id="name" class="form-control" placeholder="ชื่อประเภทสินค้า...." aria-describedby="helpId" value="<?php echo $row['name']; ?>">
<div class="form-group">
                  <label for="nameth"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อประเภทที่ใช้เเสดง ( THA )</label>
                  <input type="text" name="nameth" id="nameth" class="form-control" placeholder="ชื่อประเภทสินค้า...." aria-describedby="helpId" value="<?php echo $row['name']; ?>">
                  <small id="helpId" class="text-muted">ประเภทสินค้า Ex. ยศ</small>
                </div>
                
                <div class="form-group">
                  <label for="nameeng"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อประเภทสินค้า ( Eng )</label>
                  <input type="text" name="nameeng" id="nameeng" class="form-control" placeholder="ชื่อประเภทสินค้าแบบภาษาอังกฤษ...." aria-describedby="helpId" value="<?php echo $row['category']; ?>">
                  <small id="helpId" class="text-muted">ประเภทสินค้าเเบบภาษาอังกฤษ Ex. rank</small>
                </div>
                <?php }} ?>
                <div class="form-group">
                  <label for=""><i class="fa fa-server" aria-hidden="true"></i> เลือกเซิร์ฟเวอร์</label><p>
                  <select class="btn btn-success" name="server">
                  <?php
$query = 'SELECT * FROM `server`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
                    <option class="" value="<?php echo $row['name']; ?>"> เซิร์ฟเวอร์ : <?php echo $row['name']; ?></option>
                    <?php
        }
    } ?>
                </select>
                  <p>
                  <small id="helpId" class="text-muted">เลือกเซิร์ฟเวอร์ Ex. Survival</small>
                </div>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="editcategory"class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
</form>
</div>
</div>
<?php }} ?>
	
<?php if (isset($_GET['refill'])) {
    ?>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-money" aria-hidden="true"></i> ตั้งค่าการเติมเงิน</h4>
<form action="" method="post">
	<?php
$query = "SELECT * FROM `sys_truewallet`";
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<div class="form-group">
                  <label for="walletemail"><i class="fa fa-envelope" aria-hidden="true"></i> อีเมลล์ TrueWallet</label>
                  <input type="text" name="walletemail" id="walletemail" class="form-control" placeholder="Email TrueWallet...." aria-describedby="helpId" value="<?php echo $row['username']; ?>">
                  <small id="helpId" class="text-muted">Email TrueWallet Ex. mymail@gmail.com</small>
                </div>
<div class="form-group">
                  <label for="walletpass"><i class="fa fa-lock" aria-hidden="true"></i> รหัส TrueWallet</label>
                  <input type="text" name="walletpass" id="walletpass" class="form-control" placeholder="Password TrueWallet...." aria-describedby="helpId" value="<?php echo $row['password']; ?>">
                  <small id="helpId" class="text-muted">Password TrueWallet Ex. mypassword191</small>
                </div>
                <?php }} ?>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="saverefill"class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
                
</form>
</div>
</div>
<?php } ?>
	
	<?php if (isset($_GET['systemall'])) {
    ?>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-cog" aria-hidden="true"></i> ตั้งค่าระบบทั่วไป</h4>
            <p class="card-text text-center"><i class="fas fa-list-ul"></i> เครื่องมือย่อย :
			<a href="?page=backend&systemall=true&imgslide=true">รูปสไลด์</a> |
            <a href="?page=backend&systemall=true&fbpage=true">ตั้งค่าเพจ</a> |
    
            </div>
            </div>
            <?php 
            if (isset($_GET['systemall']))
            { 
            	if (isset($_GET['imgslide']))
            {
            	?>
            <div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-image" aria-hidden="true"></i> เพิ่มรูปสไลด์</h4>
<form action="" method="post">
<div class="form-group">
                  <label for="link"><i class="fa fa-link" aria-hidden="true"></i> ลิ้งค์รูปภาพสไลด์</label>
                  <input type="text" name="link" id="link" class="form-control" placeholder="ลิ้งค์รูปภาพสไลด์...." aria-describedby="helpId" value="">
                  <small id="helpId" class="text-muted" style="font-size: 10px;">ลิงค์รูปภาพสไลด์ Ex. https://myweb.com/img/image.png แต่หากเป็นรูปใน Folder _img ของ WebShop ให้ใส่เป็น ./_image/ชื่อรูป.นามสกุล</small>
                </div>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="addimg" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
</form>
</div>
</div>

<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-list" aria-hidden="true"></i> รายการรูปภาพ</h4>
<p class="card-text" style="overflow-x:auto;">
                    <table class="table text-center">
                        <thead>
                            <tr style="font-size: 13px">
       						<th>รูปภาพ</th>
      	 					<th>ลิ้งรูปภาพ</th>
   							<th>Action</th>
  	</tr>
  </thead>
                       
 <?php
$query = 'SELECT * FROM `img`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<tbody>
<tr style="font-size: 12px">
                                <td scope="row"><img src="<?php echo $row['img']; ?>"/></td>
                                <td scope="row"><?php echo $row['img']; ?></td>
                                <td scope="row"><a style="font-size: 12px" href="?page=backend&systemall=true&imgdelid=<?php echo $row['id']; ?>" class="btn btn-danger">ลบรูปภาพ
</a></td>
                            </tr>
                        </tbody>
<?php }} ?>
                    </table>
                </p>
</div>
</div>
<?php }} ?>
	
	<?php 
            if (isset($_GET['systemall']))
            { 
            	if (isset($_GET['fbpage']))
            {
            ?>
<div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-address-card" aria-hidden="true"></i> Messenger FB Contact</h4>
<form action="" method="post">
	<?php
$query = 'SELECT * FROM `system`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<div class="form-group">
                  <label for="id"><i class="fa fa-sort-numeric-up" aria-hidden="true"></i> ไอดีเพจ</label>
                  <input type="text" name="id" id="id" class="form-control" placeholder="ไอดีเพจ...." aria-describedby="helpId" value="<?php echo $row['id_page']; ?>">
                  <small id="helpId" class="text-muted" style="font-size: 10px;">ไอดีเพจ ใช้สำหรับ Function ติดต่อเพจ ผ่าน Icon Messenger ไอดีเพจ ให้เข้าไปที่หน้าเพจของเรา->เกี่ยวกับ</small>
                </div>
                <?php }} ?>
<div class="form-group" style="text-align: center;">
                  <button type="submit" name="savepage" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
</form>
</div>
</div>
<?php }} ?>
	
<?php } ?>
	


  <?php include 'footer.php'; ?>
<br />
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<?php
@ini_set('display_errors', '0');
if (isset($_POST['saverefill']))
{
	$email = $_POST['walletemail'];
	$password = $_POST['walletpass'];
	$api->backend->saverefill($email,$password);
}
if (isset($_POST['additem']))
{
	$title = $_POST['name'];
	$price = $_POST['price'];
	$image = $_POST['img'];
	$category = $_POST['category'];
	$server = $_POST['server'];
	$command1 = $_POST['c1'];
	$command2 = $_POST['c2'];
	$command3 = $_POST['c3'];
	$command4 = $_POST['c4'];
	$command5 = $_POST['c5'];
	$command6 = $_POST['c6'];
	$command7 = $_POST['c7'];
	$command8 = $_POST['c8'];
	$command9 = $_POST['c9'];
	$command10 = $_POST['c10'];
	//Add Item
	$api->backend->additem($title,$price,$image,$command1,$command2,$command3,$command4,$command5,$command6,$command7,$command8,$command9,$command10,$category,$server);
}

if (isset($_GET['listitem']))
{
	if($_GET['deleteid'])
	{
		$id = $_GET['deleteid'];
		$api->backend->deleteitem($id);
	}
}

if (isset($_POST['addredeem']))
{
	$name = $_POST['name'];
	$command = $_POST['command'];
	$redeem = $_POST['redeem'];
	
	$api->redeem->AddRedeem($name,$command,$redeem);
}

if (isset($_GET['itemcode']))
{
	if ($_GET['deleteid'])
	{
		$id = $_GET['deleteid'];
		$api->redeem->Remove($id);
	}
}

if (isset($_POST['addserver']))
{
	$name = $_POST['name'];
	$ip = $_POST['ip'];
	$port = $_POST['port'];
	$pass = $_POST['pass'];
	
	$api->backend->addserver($name,$ip,$port,$pass);
	
}

if (isset($_GET['rconserver']))
{
	if ($_GET['deleteid'])
	{
		$id = $_GET['deleteid'];
		
		$api->backend->deleteserver($id);
	}
}
			if(isset($_POST['savercon']))
			{
		$ids = $_POST['uid'];
		$names = $_POST['names'];
		$ips = $_POST['ips'];
		$ports = $_POST['ports'];
		$passs = $_POST['passs'];
		
		$api->backend->editrcon($ids,$names,$ips,$ports,$passs);
		}
			
if (isset($_POST['checkconnect']))
{
	$ip = $_POST['ips'];
	$port = $_POST['ports'];
	$pass = $_POST['passs'];
	
	$api->backend->CheckConnect($ip,$port,$pass);
}

if(isset($_POST['edititem']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$img = $_POST['img'];
	$category = $_POST['category'];
	$server = $_POST['server'];
	$c1 = $_POST['c1'];
	$c2 = $_POST['c2'];
	$c3 = $_POST['c3'];
	$c4 = $_POST['c4'];
	$c5 = $_POST['c5'];
	$c6 = $_POST['c6'];
	$c7 = $_POST['c7'];
	$c8 = $_POST['c8'];
	$c9 = $_POST['c9'];
	$c10 = $_POST['c10'];
	
	$api->backend->edititem($id,$name,$price,$img,$server,$category,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10);
}

if (isset($_POST['addjackpot']))
{
	$name = $_POST['name'];
	$number = $_POST['number'];
	$command = $_POST['command'];
	$point = $_POST['command'];
	$key = $_POST['key'];
	
	$api->backend->addjackpot($name,$number,$command,$point,$key);
	
}

if (isset($_GET['jackpot']))
{
	if ($_GET['deleteid'])
	{
		$id = $_GET['deleteid'];
		
		$api->backend->deletejackpot($id);
	}
}

if (isset($_POST['addcategory']))
{
	$nameth = $_POST['nameth'];
	$nameeng = $_POST['nameeng'];
	$server = $_POST['server'];
	
	$api->backend->addcategory($nameth,$nameeng,$server);
}

if (isset($_POST['editcategory']))
{
	$id = $_POST['ids'];
	$name = $_POST['name'];
	$nameth = $_POST['nameth'];
	$nameeng = $_POST['nameeng'];
	$server = $_POST['server'];
	
	$api->backend->editcategory($id,$name,$nameth,$nameeng,$server);
}

if (isset($_GET['categorylist']))
{
	if ($_GET['deleteid'])
	{
		$id = $_GET['deleteid'];
		
		$api->backend->deletecategoryshop($id);
	}
}

if (isset($_GET['categorylist']))
{
	if ($_GET['deletelistid'])
	{
		$id = $_GET['deletelistid'];
		
		$api->backend->deletecategoryshoplist($id);
	}
}

if (isset($_POST['addimg']))
{
	$link = $_POST['link'];
	
	$api->backend->addimg($link);
}

if (isset($_GET['systemall']))
{
	if (isset($_GET['imgdelid']))
	{
		$id = $_GET['imgdelid'];
		
		$api->backend->imgdelete($id);
	}
}
if (isset($_POST['savepage']))
{
	$id = $_POST['id'];
	
	$api->backend->savepage($id);
}
?>