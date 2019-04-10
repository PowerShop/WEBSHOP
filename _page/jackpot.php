<?php
if(!$_SESSION['username']){
  rdr('?page=login');
}else{
 #NoCode
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Jackpot</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="font mx-auto col-md-12 mt-2">
      <?php include('menu.php'); ?>
      <?php if(isset($_GET['server'])){ ?>
      <form action="" method="post">
        <div class="card mt-2 bg-warning">
            <img class="card-img-top" alt="">
            <div class="card-body">
                <h4 class="card-title text-center"><i class="fa fa-gift" aria-hidden="true"></i> สุ่ม Jackpot</h4>
            </div>
        </div>
      <div class="card mt-2">
          <img class="card-img-top" alt="">
          <div class="card-body">
              <p class="card-text text-center"><i class="fa fa-money" aria-hidden="true"></i> พอยท์คงเหลือ : <?php echo $pdo['point']; ?></p>
              <p class="card-text text-center" style="text-align: center;"><button type="submit" name="Random" class="btn btn-primary" <?php if($pdo['point'] <= 0){ echo 'disabled'; }else{ }?>>สุ่ม Jackpot</button><br class="mt-2"/><font color="red">การสุ่ม 1 ครั้งใช้ 1 Point</font></p>
          </div>
      </div>
</form>
      <div class="card mt-2">
    <img class="card-img-top" alt="">
    <div class="card-body">
      <h4 class="card-title text-center"><i class="fa fa-cubes" aria-hidden="true"></i> รายการไอเทม</h4>
      <p class="card-text">
        <table class="table text-center col-md-12">
          <thead>
            <tr>
              <th>หมายเลขกำกับ</th>
              <th>ของรางวัล</th>
            </tr>
          </thead>
          <tbody>
            <?php
                  $query = "SELECT * FROM `jackpot`";
                  if($result = query($query)) { 
                  while ($row = $result->fetch()){ 
                ?>
                <tr>
              <td scope="row"><?php echo $row['number']; ?></td>
              <td><?php echo $row['name']; ?></td>
              </tr>
              <?php }} ?>
          </tbody>
        </table>
      </p>
    </div>
  </div>
                  <?php } ?>
     <?php 
         if(!isset($_GET['server'])){
             echo '<div class="card mt-2 text-center">
                 <img class="card-img-top"alt="">
                 <div class="card-body">
                     <h4 class="card-title"><i class="fa fa-server" aria-hidden="true"></i> กรุณาเลือกเซิร์ฟเวอร์</h4>
                     <p class="card-text"><div class="dropdown">
                         <button class="btn btn-danger dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                     <i class="fa fa-list" aria-hidden="true"></i> Servers
                                 </button>
                         <div class="dropdown-menu" aria-labelledby="triggerId">';
                         
                         @ini_set("display_errors", "0"); 
                $username = $_SESSION["username"];
                      $query = "SELECT * FROM `server`";
                          $query2 = "SELECT * FROM `user` WHERE `username` = '$username'";
                              
                                  if($result = query($query)) {
                                      while ($row = $result->fetch()){ 
                                        echo '
                             <a class="dropdown-item" href="?page=jackpot&server='.$row['name'].'"><i class="fa fa-globe" aria-hidden="true"></i> Server : '.$row['name'].'</a>';
                             
                              }} 
                             echo '
                         </div>
                     </div></p>
                 </div>
             </div>';
         }
         ?>
  <?php include('footer.php'); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<?php if(isset($_POST['Random'])){ $server = $_GET['server']; $api->jackpot->Random($server); } ?>
