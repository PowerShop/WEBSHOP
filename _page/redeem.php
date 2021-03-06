<?php
if (!$_SESSION['username']) {
    rdr('?page=login');
} else {
    //NoCode
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Redeem</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body class="font col-md-12 mx-auto mt-2">
  <?php include 'menu.php'; ?>
  <?php if (isset($_GET['server'])) {
    ?>
  <form method="post" action="">
    <div class="card mt-2 bg-warning">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-gift" aria-hidden="true"></i> Redeem Code</h4>
        </div>
    </div>
    <div class="card mt-2">
        <img class="card-img-top"  alt="">
            <div class="card-body">
                <div class="form-group">
                    <label for="code"><i class="fa fa-code" aria-hidden="true"></i> โค๊ด 16 ตัว</label>
                    <input type="text" class="form-control" name="code" id="code" maxlength="16" aria-describedby="helpId" placeholder="ABCDEFG....">
                    <small id="helpId" class="form-text text-muted">Redeem code</small>
                </div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" name="checkredeem" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Redeem</button>
                </div>
            </div>
        </div>
    </form>
  <?php
}?>
  <?php
if (!isset($_GET['server'])) {
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

        @ini_set('display_errors', '0');
        $username = $_SESSION['username'];
        $query = 'SELECT * FROM `server`';
        $query2 = "SELECT * FROM `user` WHERE `username` = '$username'";

        if ($result = query($query)) {
            while ($row = $result->fetch()) {
                echo '
                             <a class="dropdown-item" href="?page=redeem&server='.$row['name'].'"><i class="fa fa-globe" aria-hidden="true"></i> Server : '.$row['name'].'</a>';
            }
        }
        echo '
                         </div>
                     </div></p>
                 </div>
             </div>';
    }
?>
<?php include 'footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
<?php
if (isset($_POST['checkredeem'])) {
    $redeem = $_POST['code'];
    $name = $_GET['server'];
    if ($redeem == '') {
        echo "<script type='text/javascript'>
        swal('Check Code!','กรุณากรอกโค๊ดให้ครบ','warning');
        </script>";
    } else {
        $api->redeem->CheckRedeem($redeem, $name);
    }
}
?>