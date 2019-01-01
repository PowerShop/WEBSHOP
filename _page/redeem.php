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
    <title>Redeem</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body class="font col-md-12 mx-auto mt-2">
  <?php include ('menu.php'); ?>
  <form method="post" action="">
      <div class="card mt-2 mx-auto">
          <div class="card-header bg-warning text-center">
              <i class="fa fa-gift" aria-hidden="true"></i> Redeem Code
          </div>
          <div class="card-body">
              <div class="form-group">
                <label for="code"><i class="fa fa-code" aria-hidden="true"></i> โค๊ด 16 ตัว</label>
                <input type="text" class="form-control" name="code" id="code" maxlength="16" aria-describedby="helpId" placeholder="ABCDEFG....">
                <small id="helpId" class="form-text text-muted">Redeem code</small>
              </div>
          </div>
          <div class="card-footer text-muted bg-warning text-center">
              <button type="submit" name="checkredeem" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Redeem</button>
          </div>
      </div>
</form>
<?php include('footer.php'); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
<?php
if(isset($_POST['checkredeem'])){
    $redeem = $_POST['code'];
    if($redeem == ""){
        echo "<script type='text/javascript'>
        swal('Check Code!','กรุณากรอกโค๊ดให้ครบ','warning');
        </script>";
    }else{
    $api->redeem->CheckRedeem($redeem);
    }
}
?>