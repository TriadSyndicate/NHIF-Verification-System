  <section class="menu cid-rIDVX8y8PI" once="menu" id="menu1-0">



    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                         <img src="../assets/images/hospital-100x100.png" alt="Mobirise" title="" style="height: 4.5rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="index.php">NHIF SYSTEM</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="addRecord.php">
                  <span class="mbri-plus mbr-iconfont mbr-iconfont-btn "></span>Add NHIF Record
              </a></div>
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
              <li class="nav-item dropdown open">
                    <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                        <span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                        <?php echo $_SESSION['name']; ?>
                    </a>
                    <div class="dropdown-menu">
                      <a class="text-white dropdown-item display-4" href="../logout.php">LogOut</a>
                    </div>
                </li>
              </ul>

        </div>
    </nav>
  </section>
