<?php
if (!$_SESSION['username']) {
    rdr('?page=login');
} else {
    //NoCode
/*$pdo มาจากไฟล์ index.php */
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="col-md-12 mx-auto mt-2 font">
      <?php include 'menu.php'; ?>
      <div class="card mt-2 bg-warning">
          <img class="card-img-top" alt="">
          <div class="card-body">
              <h4 class="card-title text-center"><i class="fa fa-address-card-o" aria-hidden="true"></i> โปรไฟล์</h4>
          </div>
      </div>
      <div class="card mt-2">
          <img class="card-img-top" alt="">
          <div class="card-body">
            <p class="card-text" style="text-align: center;"><img class="img" src="<?php echo $pdo['avatar']; ?>" alt="Avatar" style="width:100px"></p>
            <p class="card-text text-center"><i class="fa fa-user" aria-hidden="true"></i> ชื่อผู้ใช้ : <?php echo $pdo['username']; ?></p>
            <p class="card-text text-center"><i class="fa fa-money" aria-hidden="true"></i> พอยท์คงเหลือ : <?php echo $pdo['point']; ?></p>
            <p class="card-text text-center"><i class="fas fa-piggy-bank"></i> พอยท์สะสม : <?php echo $pdo['credits']; ?> </p>
            <p class="card-text text-center"><i class="fas fa-trophy"></i> ระดับสมาชิก : <?php echo $pdo['rank']; ?></p>
            <p class="card-text" style="text-align: center;"><button type="button" data-toggle="modal" data-target="#changepass" class="btn btn-danger"><i class="fas fa-cog"></i> เปลี่ยนรหัสผ่าน </button></p>
             <p class="card-text" style="text-align: center;"><button type="button" data-toggle="modal" data-target="#changeavatar" class="btn btn-warning"><i class="fas fa-cog"></i> เปลี่ยน Avatar </button></p>
            </div>
      </div>

      <div class="card mt-2 bg-warning">
          <img class="card-img-top" alt="">
          <div class="card-body">
              <h4 class="card-title text-center"><i class="fas fa-history"></i> ประวัติการเติมพอทย์ ( TrueWallet & TrueMoney)</h4>
          </div>
      </div>
      <div class="card mt-2 col-md-12" >
          <img class="card-img-top" alt="">
          <div class="card-body" style="overflow-x:auto;">
          <table class="table text-center" style="font-size: 14px">
                  <thead>
                      <tr>
                          <th>เลขอ้างอิง</th>
                          <th>จำนวนเงิน</th>
                           <th>ช่องทางการเติม</th>
                          <th>วันเวลาที่เติม</th>
                      </tr>
                  </thead>
 <?php
$query = "SELECT * FROM `history` WHERE `name` = '" . $_SESSION['username'] . "'";
if ($result = query($query)) {
    while ($row = $result->fetch()) {
        ?>
                  <tbody>
                      <tr>
                          <td scope="row"><?php echo $row['truewallet']; ?></td!>
                          <td><?php echo $row['amount']; ?> บาท</td>
                          <td><?php echo $row['payment']; ?></td>
                          <td><?php echo $row['date']; ?></td>
                      </tr>
                  </tbody>
<?php }} ?>
              </table>
          </div>
      </div>
      <?php include 'footer.php'; ?>
<br />
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <div class="container">

<!-- Trigger the modal with a button -->
<!-- Modal -->
<div class="modal fade" id="changepass" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="text-align: center; font-size: 20px" class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
    <form method="post">
      <div class="form-group">
        <label for="old-password">รหัสผ่านเก่า</label>
        <input type="text" class="form-control" name="old-password" id="old-password" aria-describedby="helpId" placeholder="Old Password">
        <small id="helpId" class="form-text text-muted">ใส่รหัสผ่านเก่า</small>
      </div>
      <div class="form-group">
        <label for="new-password">รหัสผ่านใหม่</label>
        <input type="text" class="form-control" name="new-password" id="new-password" aria-describedby="helpId" placeholder="New Password">
        <small id="helpId" class="form-text text-muted">ใส่รหัสผ่านใหม่</small>
      </div>
      <div class="form-group">
        <label for="re-password">ยืนยันรหัสผ่าน</label>
        <input type="text" class="form-control" name="re-password" id="re-password" aria-describedby="helpId" placeholder="Re Password">
        <small id="helpId" class="form-text text-muted">ยืนยันรหัสผ่าน</small>
      </div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="changepass" class="btn btn-success">ยืนยัน</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>

</form>
  </div>
</div>

<?php if (isset($_POST['changepass'])) {
    $oldpassword = $_POST['old-password'];
    $newpassword = $_POST['new-password'];
    $repassword = $_POST['re-password'];
    $api->user->ChangePassword($oldpassword, $newpassword, $repassword);
}
?>
</div>

<div class="container">
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div class="modal fade" id="changeavatar" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="text-align: center; font-size: 20px" class="modal-title">Change Avatar</h4>
      </div>
      <div class="modal-body">
    <form method="post">
      <div class="form-group">
        <label for="avatar">ลิ้งรูปอวตาร์</label>
        <input type="text" class="form-control" name="avatar" id="avatar" aria-describedby="helpId" placeholder="ลิ้งค์อวตาร์" value="<?php echo $pdo['avatar']; ?>">
        <small id="helpId" class="form-text text-muted">ลิ้งรูปอวตาร์ Ex. https://myweb.com/img/avatar.png ( png , jpeg , gif )</small>
      </div>
      <div class="modal-footer">
      <button type="submit" name="changeavatar" class="btn btn-success">ยืนยัน</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>

</form>
  </div>
</div>

<?php if (isset($_POST['changeavatar'])) {
    $linkavatar = $_POST['avatar'];
    $api->user->ChangeAvatar($linkavatar);
}
?>

</div>
</body>
</html>
