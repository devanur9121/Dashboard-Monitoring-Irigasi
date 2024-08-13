<div class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div class="">
      <img src="assets/images/2.png" class="logo-icon-2" alt="" />
    </div>
    <div>
      <h4 class="logo-text">Irrigation</h4>
    </div>
    <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
    </a>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <?php
    if (isset($_SESSION['level'])) {
      if ($_SESSION['level'] == "Admin") {
    ?>
        <li>
          <a href="index.php?include=dashboard-admin">
            <div class="parent-icon icon-color-1"><i class='bx bx-home bx-tada'></i></div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
      <?php
      } elseif ($_SESSION['level'] == "User") {
      ?>
        <li>
          <a href="index.php?include=dashboard-user">
            <div class="parent-icon icon-color-1"><i class='bx bx-home bx-tada'></i></div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
    <?php
      }
    }
    ?>
    <li class="menu-label">Others</li>
    <?php
    if (isset($_SESSION['level'])) {
      if ($_SESSION['level'] == "User") {
    ?>
        <li>
          <a href="index.php?include=informasi">
            <div class="parent-icon icon-color-11"><i class='bx bx-message-dots bx-tada'></i></div>
            <div class="menu-title">Informasi</div>
          </a>
        </li>
        <li>
          <a href="index.php?include=contact">
            <div class="parent-icon icon-color-7"><i class='bx bx-phone-call bx-tada'></i></div>
            <div class="menu-title">Contact</div>
          </a>
        </li>
        <li>
          <a href="index.php?include=chart">
            <div class="parent-icon icon-color-5"><i class='bx bx-line-chart bx-tada'></i></div>
            <div class="menu-title">Chart</div>
          </a>
        </li>
    <?php
      }
    }
    ?>
    <?php
    if (isset($_SESSION['level'])) {
      if ($_SESSION['level'] == "Admin") {
    ?>
        <li>
          <a href="index.php?include=data-histori-sensor">
            <div class="parent-icon icon-color-3"><i class='bx bx-history bx-tada'></i></div>
            <div class="menu-title">Histori</div>
          </a>
        </li>
        <li>
          <a href="index.php?include=user-logs">
            <div class="parent-icon icon-color-12"><i class='bx bxs-user-detail bx-tada'></i></div>
            <div class="menu-title">User Logs</div>
          </a>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon icon-color-2"><i class='bx bxs-data bx-tada'></i>
            </div>
            <div class="menu-title">Master</div>
          </a>
          <ul>
            <li>
              <a href="index.php?include=master-alat">
                <div class="parent-icon icon-color-6"><i class='bx bx-aperture bx-flashing'></i></div>
                <div class="menu-title">Master Alat</div>
              </a>
            </li>
            <li>
              <a href="index.php?include=master-contact">
                <div class="parent-icon icon-color-9"><i class='bx bxs-contact bx-flashing'></i></div>
                <div class="menu-title">Master Contact</div>
              </a>
            </li>
            <li>
              <a href="index.php?include=user-account">
                <div class="parent-icon icon-color-11"><i class='bx bxs-user-account bx-flashing'></i></div>
                <div class="menu-title">Master User</div>
              </a>
            </li>
          </ul>
        </li>
    <?php
      }
    }
    ?>
  </ul>
  <!--end navigation-->
</div>