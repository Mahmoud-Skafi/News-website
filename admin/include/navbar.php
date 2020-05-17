<div id="wrapper">
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="transition: all .5s" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./dashboard.php">
      <div class="sidebar-brand-icon rotate-n-15">
      </div>
      <div class="sidebar-brand-text mx-3">NEWS WEBSITE</sup></div>
    </a>
    <hr class="sidebar-divider my-0" />
    <li class="nav-item active">
      <a class="nav-link" href="./dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider" />
    <div class="sidebar-heading">
      Manager
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-clipboard"></i>
        <span>Posts</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Posts Cmponats:</h6>
          <a class="collapse-item" href="./post_manager.php?page=1">Post Manager</a>
          <a class="collapse-item" href="./add_post.php">Add Post</a>
          <a id="SideApprove" class="collapse-item" href="./approved_post.php">Approve Post</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-bookmark"></i>
        <span>Category</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Category Utilities:</h6>
          <a class="collapse-item" href="./category_manager.php?page=1">Category Manager</a>
          <a class="collapse-item" href="./category_manager.php?page=1">Add Category</a>
        </div>
      </div>
    </li>
    <li id="SideAccountsid" class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Accounts" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-users-cog"></i>
        <span>Acounts</span>
      </a>
      <div id="Accounts" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Accounts Utilities:</h6>
          <a class="collapse-item" href="./manage_accounts.php?page=1">Accounts Manager</a>
          <a class="collapse-item" href="./add_users.php">Add Accounts</a>
          <a class="collapse-item" href="./account_activat.php?page=1">Activat Accounts</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider" />


    <div class="sidebar-heading">

    </div>

    <li id="SideBreaking" class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Special Section</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Special Section:</h6>
          <a class="collapse-item" href="./bracking_news.php?page=1">Breaking News</a>
          <a class="collapse-item" href="./advertisement_manager.php?page=1">Advertisement </a>

        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="./logout.php">
        <i class="fas fa-power-off"></i>
        <span>Logout</span></a>
    </li>



  </ul>
  <!-- End of Sidebar -->




  <!-- NavBAR -->
 
  <div id="content-wrapper" class="d-flex flex-column">

    <div id="content">
    
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

      
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
              <button class="btn btn-primary" style="background-color: #313131;" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
        <img src="" >

       
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
          
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          


          <div class="topbar-divider d-none d-sm-block"></div>

        
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
              <div class="profile-image">

              </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" >
                <i class="fas fa-user-tag fa-sm fa-fw mr-2 text-gray-400"></i>
               
                Role: <?php echo $_SESSION['roles']
                ?>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../index.php" >
                <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                
                Front Page
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./logout.php" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>