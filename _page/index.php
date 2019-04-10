<?php
if (!$_SESSION['username']) {
    rdr('?page=login');
} else {
    #NoCode
}
?>
<!doctype html>
<html class="html" lang="en">

<head>
  <title>Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

</head>

<body class="col-md-12 font mx-auto mt-2">

  <?php include_once 'menu.php';?>
  <div class="border-radius">
    <div class="card text-white bg-primary mt-2">
      <img class="card-img-top" alt="">
      <div class="card-body">
        <h4 class="card-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Minecraft Webshop</h4>
        <p class="card-text">ระบบร้านค้าออนไลน์</p>
        <?php
$query = "SELECT * FROM `user` WHERE `username` = '" . $_SESSION['username'] . "'";
if ($result = query($query)) {
    while ($row = $result->fetch()) {
        ?>
        <p class="card-text"><i class="fa fa-user-circle" aria-hidden="true"></i> ผู้ใช้ :
          <?php echo $pdo['username']; ?>
        </p>
        <p class="card-text"><i class="fa fa-money" aria-hidden="true"></i> พอยท์คงเหลือ :
          <?php echo $pdo['point']; ?>
        </p>
      </div>
    </div>
    <?php }}?>
    <div class="card mt-2">
      <img class="card-img-top" alt="">
      <div class="card-body">
        <h4 class="card-title"><i class="fa fa-signal" aria-hidden="true"></i> Status Server</h4>
        <p class="card-text"><i class="fa fa-rss" aria-hidden="true"></i> สถานะเซิร์ฟเวอร์
          <?php if ($api->status->status == "Online") {echo "<button class='btn btn-success'>Online</button>";} else {echo "<button class='btn btn-danger'>Offline</button>";}?>
        </p>
        <p class="card-text"><i class="fa fa-users" aria-hidden="true"></i> จำนวนผู้เล่นออนไลน์ <button class="btn btn-warning">
            <div id="screen">กำลังโหลดจำนวนผู้เล่น...</div>
          </button></p>
      </div>
    </div>
    <div class="card mt-2">
      <img class="card-img-top" alt="">
      <div class="card-body">
        <h4 class="card-title"><i class="fa fa-file-image-o" aria-hidden="true"></i> รูปสไลด์</h4>
        <div class="card-columns">
          <div class="card">
            <img class="card-img-top" alt="">
            <div class="card-body">
              <p class="card-text">
                <div class="w3-content w3-section" style="max-width: 100%;">
                  <?php
$query = "SELECT * FROM `img`";
if ($result = query($query)) {
    while ($row = $result->fetch()) {
        ?>
                  <img class="mySlides" src="<?php echo $row['img']; ?>" title="Test" style="width:100%">
                  <?php }}?>
                </div>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-2">
    <img class="card-img-top" alt="">
    <div class="card-body">
      <h4 class="card-title"><i class="fa fa-trophy" aria-hidden="true"></i> อันดับยอดเติมเงินสูงสุด</h4>
      <p class="card-text">
        <table class="text-center table" width="100%" style="overflow-x:auto; font-size: 12px;">
          <thead>
            <tr>
              <th>#</th>
              <th><i class="fa fa-user-circle" aria-hidden="true"></i> ชื่อผู้เล่น</th>
              <th><i class="fa fa-money" aria-hidden="true"></i> จำนวนเงินเติมสะสม</th>

            </tr>
          </thead>
          <tbody>
            <?php
$query = "SELECT * FROM `user` ORDER BY `credits` DESC LIMIT 5;";
if ($result = query($query)) {
    while ($row = $result->fetch()) {
        ?>
            <tr>
              <td scope="row"><img class="img" src="<?php echo $row['avatar']; ?>" alt="Avatar" style="width:50px"></td>
              <td>
                <?php echo $row['username']; ?>
              </td>
              <td>
                <?php echo $row['credits']; ?>
              </td>
            </tr>
            <?php }}?>
          </tbody>
        </table>
      </p>
    </div>
  </div>
  <div class="card-footer text-muted font text-center mt-4">
    Copyright © 2018 MinMin
  </div>
  </div>
  <br />
  <!-- Script Img Slides -->
  <script>
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {
        myIndex = 1
      }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 5000);
    }
  </script>
  <script>
    $(document).ready(function () {
      setInterval(function () {
        $("#screen").load("_page/status.php")
      }, 10000);

    });
  </script>
  <!-- End -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>