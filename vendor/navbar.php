<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <div class="sk-nav-header" style="cursor: pointer" onclick="window.location='./index.php'">
                <h1>SKAFI .</h1>
            </div>


            <img src="">
            <div class="sk-ul-elemets">
                <ul>
                    <li id="NEWS">
                        <a>
                            NEWS
                        </a>
                    </li>
                    <li id="Trending">
                        <a>
                            Most Trending
                        </a>
                    </li>
                    <li id="Comment">
                        <a>
                            Most Comment
                        </a>
                    </li>
                    <li>
                        <a>
                            About us
                        </a>
                    </li>
                    <li>
                        <a>

                        </a>
                    </li>
                </ul>
            </div>
            <form style="margin-top: 15px !important;  " class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" style="background-color: #313131;" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul id='user' style="display: none" class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                        <div class="profile-image v2">

                        </div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item">
                            <i class="fas fa-user-tag fa-sm fa-fw mr-2 text-gray-400"></i>

                            Role: <?php echo $_SESSION['roles']
                                    ?>
                        </a>
                        <div id="admindashboard" style="display: none">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./admin/dashboard.php">
                                <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                Dashborad
                            </a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./admin/logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <div id="accounts" style="display: flex;align-items: center">
                <div style="margin: 0px 5px" class="login-btu" onclick="window.location='./admin/login.php'">
                    <a href="./admin/login.php">login</a>
                </div>
                <span style="margin: 10px;margin-top: 20px">OR</span>
                <div class="login-btu " style="background-color: #3a76c4" onclick="window.location='./admin/signup.php'">
                    <a href="./admin/signup.php">Sign up</a>
                </div>
            </div>
            <div class="">

            </div>

        </nav>