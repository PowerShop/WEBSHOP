<nav class="navbar navbar-expand-lg navbar-dark bg-success font">
    <a class="navbar-brand color" href="#"><i class="fa fa-list" aria-hidden="true"></i> Menu</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active color">
                <a class="nav-link color" href="?page=index"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ร้านค้า</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="?page=shop"><i class="fas fa-shopping-bag"></i> ร้านค้า</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?page=redeem"><i class="fa fa-gift" aria-hidden="true"></i> Redeem</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?page=jackpot"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> สุ่ม Jackpot</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?page=profile"><i class="fa fa-address-card-o" aria-hidden="true"></i> โปรไฟล์</a>
            </li>
            <?php if ($_SESSION['admin'] == 'true') {
    echo '<li class="nav-item active">
                <a class="nav-link" href="?page=backend"><i class="fa fa-cog" aria-hidden="true"></i> จัดการหลังร้าน</a>
            </li>';
} else {
}
?>
            <li class="nav-item active color">
                <a class="nav-link color" href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> ออกจากระบบ</a>
            </li>
        </ul>
</nav>
