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
    <title>Refill</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="col-md-12 font mx-auto mt-2">
  <?php include 'menu.php';?>
      <div class="card bg-warning mt-2">
          <img class="card-img-top"  alt="">
          <div class="card-body text-center">
              <h4 class="card-title"><i class="fa fa-money" aria-hidden="true"></i> Refill</h4>
              <p class="card-text">Refill by : <a href="?page=wallet&topup=truemoney">TrueMoney</a> | <a href="?page=wallet&topup=truewallet">TrueWallet</a></p>
          </div>
      </div>
      <?php if (isset($_GET['topup'])) {
    if ($_GET['topup'] == 'truemoney') {
        ?>
     <div class="card mt-2">
          <img class="card-img-top" alt="">
          <div class="card-body">
          <form action="" method="post">
              <h4 class="card-title text-center">TrueMoney</h4>
              <div class="form-group">
                <label for="cash"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> CashCard Number</label>
                <input type="text" name="cash" id="cash" class="form-control" placeholder="1234567890000" aria-describedby="helpId">
                <small id="helpId" class="text-muted">หมายเลขบัตรทรูมันนี่ 14 หลัก</small>
              </div>
              <div class="form-group" style="text-align: center;">
              <button type="submit" class="btn btn-success" name="refill"><i class="fa fa-check-circle" aria-hidden="true"></i> ดำเนินการเติมเงิน</button>
              </div>
              </form>
          </div>
      </div>
      <?php
}
}?>
<?php if (isset($_GET['topup'])) {
    if ($_GET['topup'] == 'truewallet') {
        ?>
    <div class="card mt-2">
          <img class="card-img-top" alt="">
          <div class="card-body">
              <h4 class="card-title text-center">TrueWallet</h4>
              <form action="" method="post">
              <div class="form-group">
                <label for="tranid"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> หมายเลขอ้างอิง</label>
                <input type="text" name="tranid" id="tranid" class="form-control" placeholder="Transaction Id" aria-describedby="helpId">
                <small id="helpId" class="text-muted">หมายเลขอ้างอิง 14 หลัก</small>
              </div>
              <div class="form-group" style="text-align: center;">
              <button type="submit" name="refill" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> ดำเนินการเติมเงิน</button>
              </div>
              </form>
          </div>
      </div>
      <?php
}
}?>
<?php if (isset($_GET['topup']) == null) {?>
<div class="card mt-2">
    <img class="card-img-top" alt="">
    <div class="card-body">
        <h4 class="card-title text-center">กรุณาเลือกวิธีการเติมเงิน</h4>
    </div>
</div>
<?php }?>
<?php include 'footer.php';?>
<div class="mt-2"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<?php
@ini_set('display_errors', '0');
date_default_timezone_set("Asia/Bangkok");
$time = trim(date("d-m-Y H:i:s"));
if (isset($_POST['refill'])) {

$i = query('SELECT * FROM `sys_truewallet`')->fetch();
$username = $i['username'];
$password = $i['password'];
    // Login
    $token = $api->wallet->GetToken($username, $password);

    // If successfully login

    if ($token != null) {
        if ($_POST['tranid']) {
            // Transaction date range
            $start_date = date('Y-m-d', strtotime('-999 days'));
            $end_date = date('Y-m-d', strtotime('1 days'));

            // Perform Fetch
            $activities = $api->wallet->FetchActivities($token, $start_date, $end_date);

            foreach ($activities as $arr) {
                // Check is paid-in
                if ($arr['original_action'] == 'creditor') {
                    $data = $api->wallet->FetchTxDetail($token, $arr['report_id']);

                    // Transaction ID
                    $tx['id'] = $data['section4']['column2']['cell1']['value'];

                    // Amount
                    $tx['amount'] = str_replace(',', '', $data['section3']['column1']['cell1']['value']);

                    // Then you can check user input and connect to database.

                    $username = $_SESSION['username'];

                    $ref = $_POST['tranid'];
                    if ($tx['id'] == $ref) {

                        if (query("SELECT * FROM history WHERE truewallet = '$ref'")->rowCount() == 1) {
                            echo '<script type="text/javascript">
                        swal("Error","เติมเงินไม่สำเร็จ \n หมายเลขอ้างอิง ' . $ref . ' ถูกใช้งานเเล้ว","error");
                        </script>';
                            break;
                        } else {
                            $amount = $tx['amount'];
                            $a = $amount;
                            $b = $pdo['point'];
                            $c = $a + $b;
$TrueWallet = 'TrueWallet';
                            query("INSERT INTO `history`(`truewallet`,`amount`,`payment`,`name`,`date`) VALUES('" . $ref . "','" . $amount . "','". $TrueWallet ."','" . $username . "','" . $time . "')");
                            query("UPDATE `user` SET `point` = '$c' WHERE `username` = '$username'");

                            echo '<script type="text/javascript">
                        swal("Success","เติมเงินสำเร็จ ' . $tx['amount'] . ' บาท","success");
                        </script>';
                            break;
                        }
                    } elseif ($tx['id'] !== $ref) {
                        echo '<script type="text/javascript">
                        swal("Error","เติมไม่เงินสำเร็จ หมายเลขอ้างอิงไม่มีอยู่ในระบบ","error");
                        </script>';
                        break;
                    }
                }
            }
        }
        if ($_POST['cash']) {
            $cashcard = $_POST['cash'];
            $topup = json_decode($api->wallet->CashcardTopup($token, $cashcard));
            if (isset($topup->amount)) {
                $amount = $topup->amount;
                $a = $amount;
                $b = $pdo['point'];
                $c = $a + $b;
$TrueMoney = 'TrueMoney';
                if (query('SELECT * FROM `user` WHERE `username` =?;', array($username))->rowCount() == 1) {
                    query("INSERT INTO `history`(`truemoney`,`amount`,`name`,`date`) VALUES('" . $cashcard . "','" . $amount . "','". $TrueMoney ."','" . $username . "','" . $time . "')");
                    query("UPDATE `user` SET `point` = '$c' WHERE `username` = '$username'");
                    echo '<script type="text/javascript">
                        swal("Success","เติมเงินสำเร็จ ' . $topup->amount . ' บาท","success");
                        </script>';
                }
            } elseif (isset($topup->code)) {
                if ($topup->code < 0) {
                    echo '<script type="text/javascript">
                    swal("Error","เติมไม่เงินสำเร็จ หมายเลขบัตรทรูมันนี่ไม่ถูกต้อง","error");
                    </script>';
                }
            }
        }
        // Logout
        $api->wallet->Logout($token);
    }
}
