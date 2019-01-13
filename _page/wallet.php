<!doctype html>
<html lang="en">
  <head>
    <title>Refill</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
      <div class="card">
          <img class="card-img-top"  alt="">
          <div class="card-body bg-warning">
              <h4 class="card-title">Title</h4>
              <p class="card-text">Text</p>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<?php

// Login
$token = $api->wallet->GetToken('aaaxcvg@gmail.com', 'Jonathan1997');

// If successfully login
if ($token != null) {
    // Transaction date range
    $start_date = date('Y-m-d', strtotime('-100 days'));
    $end_date = date('Y-m-d', strtotime('1 days'));

    // Perform Fetch
    $activities = $api->wallet->FetchActivities($token, $start_date, $end_date);

    foreach ($activities as $arr) {
        // Check is paid-in
        if ($arr['text3En'] == 'creditor') {
            $data = $api->wallet->FetchTxDetail($token, $arr['reportID']);

            // Transaction ID
            $tx['id'] = $data['section4']['column2']['cell1']['value'];

            // Amount
            $tx['amount'] = str_replace(',', '', $data['section3']['column1']['cell1']['value']);

            // Then you can check user input and connect to database.
            $ref = $_GET['id'];
            if ($tx['id'] === $ref) {
                echo 'หมายเลขอ้างอิง '.$tx['id'].' <br/> จำนวนเงิน '.$tx['amount'].' บาท';
            }
        }
    }
    if (isset($_GET['cashtopup'])) {
        $cashcard = $_GET['cashtopup'];
        $topup = json_decode($api->wallet->CashcardTopup($token, $cashcard));

        if (isset($topup->amount)) {
            echo 'Topup Success '.$topup->amount.'';
        } elseif (isset($topup->code)) {
            if ($topup->code < 0) {
                echo 'Topup Failed';
            }
        }
    }
    // Logout
    $api->wallet->Logout($token);
}
