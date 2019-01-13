<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body class="col-md-12 mx-auto mt-3 font">
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <a class="navbar-brand" href="#"><i class="fa fa-list" aria-hidden="true"></i> Menu</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
</button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                  <a class="nav-link" href="?page=login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="?page=register"><i class="fa fa-sign-in" aria-hidden="true"></i> Register</a>
            </li>
          </ul>
      </div>
  </nav>
<form action="" method="post">
            <div class="card mt-2 bg-warning">
                <div class="card-body">
                    <h4 class="card-title text-center"><i class="fa fa-user-circle" aria-hidden="true"></i> Register</h4>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                <div class="form-group">
                <label for="username"><i class="fa fa-user" aria-hidden="true"></i> Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="confirm-password"><i class="fa fa-lock" aria-hidden="true"></i> Confirm Password</label>
                <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
            </div>
            <div class="form-group" style="text-align: center;">
            <button type="submit" name="register" class="btn btn-danger"><i class="fa fa-check-circle" aria-hidden="true"></i> Confirm</button>
            </div>
                </div>
            </div>
</form>
<?php include 'footer.php'; ?>

<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confpassword = $_POST['confirm-password'];

    $api->user->Register($username, $password, $confpassword);
}
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>