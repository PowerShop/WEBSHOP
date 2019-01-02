<?php
if(!$_SESSION['admin'] == "true"){
  rdr('?page=index');
}else{
 #NoCode
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
  <?php include('menu.php'); ?>
    <div class="card mt-2">
        <img class="card-img-top"alt="">
        <div class="card-body bg-warning">
            <h4 class="card-title text-center"><i class="fa fa-home" aria-hidden="true"></i> จัดการหลังร้าน</h4>
            <p class="card-text text-center"><i class="fas fa-list-ul"></i> เครื่องมือ : <a href="?page=backend&additem=true">เพิ่มสินค้า</a> | 
            <a href="?page=backend&listitem=true">รายการสินค้า</a> | 
            <a href="?page=backend&deleteitem=true">ลบสินค้า</a> |
             
        </p>
        </div>
    </div>
    <?php if(isset($_GET['additem'])){ ?>
    <div class="card mt-2">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มสินค้า</h4>
                <form action="?page=backend&save=additem" method="post">
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
                  <select class="btn btn-success" name='server'>
                  <?php
                  $query = "SELECT * FROM `server`";
                  if($result = query($query)) { 
                  while ($row = $result->fetch()){ 
                  ?>
                    <option class="" value="<?php echo $row['name']; ?>"> เซิร์ฟเวอร์ : <?php echo $row['name']; ?></option>
                    <?php }} ?>
                </select>
                  <p>
                  <small id="helpId" class="text-muted">เลือกเซิร์ฟเวอร์ Ex. Survival</small>
                </div>
                <div class="form-group">
                  <label for=""><i class="fa fa-list" aria-hidden="true"></i> เลือกประเภทสินค้า</label><p>
                  <select class="btn btn-success" name="category">
                  <?php
                  $query = "SELECT * FROM `categoryshop`";
                  if($result = query($query)) { 
                  while ($row = $result->fetch()){ 
                  ?>
                    <option class="" value="<?php echo $row['name']; ?>"> ประเภทสินค้า : <?php echo $row['name']; ?></option>
                    <?php }} ?>
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
                  <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> เพิ่มสินค้า</button>
                </div>
                </form>
        </div>
    </div>
                  <?php } ?>
  <?php include('footer.php'); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>