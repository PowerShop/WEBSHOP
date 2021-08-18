<?php
if (!$_SESSION['username']) {
    rdr('?page=login');
} else {

}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>SHOP : <?php @ini_set("display_errors", "0");
echo $_GET['name'];?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="_dist/_css/_core.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="col-md-12 mx-auto font mt-2">
      <?php include 'menu.php';?>
      <div class="card mt-2 bg-warning">
          <img class="card-img-top" alt="">
          <div class="card-body">
              <h4 class="card-title text-center"><i class="fa fa-shopping-bag" aria-hidden="true"></i> ร้านค้า Rank</h4>
              <p class="card-text text-center"><i class="fa fa-money" aria-hidden="true"></i> พอยท์คงเหลือ : <?php echo $pdo['point']; ?></p>
              <p class="card-text text-center"><i class="fa fa-cubes" aria-hidden="true"></i> ประเภทสินค้า :
              <?php
@ini_set('display_errors', '0');
$username = $_SESSION['username'];
$category = $_GET['name'];
$server = $_GET['server'];
$query = "SELECT * FROM `server` WHERE `name` = '$server'";
$query2 = "SELECT * FROM `categoryshop` WHERE `server` = '$server'";

if ($result = query($query)) {
    while ($row = $result->fetch()) {
        if ($result2 = query($query2)) {
            while ($row2 = $result2->fetch()) {?> <a href="?page=shop&name=<?php echo $row2['category']; ?>&server=<?php echo $_GET['server']; ?>"><?php echo $row2['name']; ?></a> |<?php }}}}?></p>
        </div>
      </div>

         <div class="card mt-2 col-md-12 center">
             <div class="card-body">
             <?php
$username = $_SESSION['username'];
$server = $_GET['server'];
$category = $_GET['name'];
$query = "SELECT * FROM `item` WHERE `server` = '$server' AND `category` = '$category'";
$query2 = "SELECT * FROM `user` WHERE `username` = '$username'";

if ($result = query($query)) {
    while ($row = $result->fetch()) {
        if ($result2 = query($query2)) {
            while ($u = $result2->fetch()) {?>
                            <center>
                                <form action="" method="post">
                 <div class="card center col-md-8 sm-auto mx-auto">
                         <div class="card-body col-md-5">
                     <img class="card-img-top" style="height: 200px;width: 100%;display;" src="<?php echo $row['image']; ?>"alt="">
                            </div>
                         <div class="card-body">
                             <h4 class="card-title"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อสินค้า : <?php echo $row['name']; ?></h4>
                             <p class="card-text"><i class="fa fa-money" aria-hidden="true"></i> ราคา : <?php echo $row['price']; ?></p>
                             <p class="card-text"><a href="?page=shop&name=<?php echo $_GET['name']; ?>&itemid=<?php echo $row['id']; ?>&itemname=<?php echo $row['name']; ?>&itemprice=<?php echo $row['price']; ?>&server=<?php echo $_GET['server']; ?>" class="btn btn-success btn-block <?php if ($u['point'] < $row['price']) {echo "disabled";} else {}?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ซื้อสินค้า</a>
                         </div>
                     </div>
                            </form>
                            </center>
                            <br />
                            <?php }}}}?>
             </div>
         </div>
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

    @ini_set("display_errors", "0");
    $username = $_SESSION["username"];
    $query = "SELECT * FROM `server`";
    $query2 = "SELECT * FROM `user` WHERE `username` = '$username'";

    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            echo '
                             <a class="dropdown-item" href="?page=shop&server=' . $row['name'] . '"><i class="fa fa-globe" aria-hidden="true"></i> Server : ' . $row['name'] . '</a>';

        }}
    echo '
                         </div>
                     </div></p>
                 </div>
             </div>';
}
?>
<?php
@ini_set('display_errors', '0');

if (isset($_GET['itemname'])) {
    $name = $_GET['itemname'];
    $price = $_GET['itemprice'];
    $id = $_GET['itemid'];
    $category = $_GET['name'];
    $server = $_GET['server'];
    echo "<script type='text/javascript'>
    swal({
        title: 'Are You Sure?',
        text: 'คุณต้องการที่จะซื้อสินค้า $name ในราคา $price พอยท์ หรือไม่?',
        icon: 'warning',
        buttons: ['ยกเลิก','ยืนยัน'],
      })
      .then((willDelete) => {
        if (willDelete) {
            location.href = '?page=shop&name=$category&actionshop=$id&server=$server';
        } else {
        }
      });
    </script>";
}
if (isset($_GET['actionshop'])) {
    $id = $_GET['actionshop'];
    $name = $_GET['server'];
    $category = $_GET['name'];
    $api->shop->buy($id, $name, $category);

}
?>

      <?php include 'footer.php';?>
<br/>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
