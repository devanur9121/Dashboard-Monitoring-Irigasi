<?php
// assuming there is an active session and the 'id_user' value is set in the session
$id_user = $_SESSION['id_user'];

// get the username from the database
$sql = "SELECT * FROM `user` WHERE `id_user`='$id_user'";
$result = mysqli_query($koneksi, $sql);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
  $foto = "assets/images/uploads/" . $row['foto'];
}

?>

<header class="top-header">
  <nav class="navbar navbar-expand">
    <div class="left-topbar d-flex align-items-center">
      <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
      </a>
    </div>
    <div class="right-topbar ms-auto">
      <ul class="navbar-nav">
        <li class="nav-item search-btn-mobile">
          <a class="nav-link position-relative" href="javascript:;"> <i class="bx bx-search vertical-align-middle"></i>
          </a>
        </li>
        <li class="nav-item dropdown dropdown-user-profile">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
            <div class="d-flex user-box align-items-center">
              <div class="user-info">
                <p class="user-name mb-0"><strong><?php echo $username; ?></strong></p>
              </div>
              <img src="<?php echo $foto ?>" class="user-img" alt="user avatar">
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="index.php?include=profile"><i class="bx bx-user"></i><span>Profile</span></a>
            <div class="dropdown-divider mb-0"></div> <a class="dropdown-item" name="logout" href="index.php?include=logout"><i class="bx bx-power-off"></i><span>Logout</span></a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>