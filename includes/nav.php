    <!-- Navigation -->    
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">PHP Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                   <?php
                   
                   $query = "SELECT * FROM categories";
                   $cat_all_query = mysqli_query($connection, $query);
                   
                   while($row = mysqli_fetch_assoc($cat_all_query)){
                       
                       $cat_title = $row['cat_title'];
                       
                       echo "<li><a href='#'>{$cat_title}</a></li>";
                       
                   }

if (isset($_SESSION['user_role'])) {
    
    if (isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
    
    echo "<li>
              <a href='admin/posts.php?source=update_post&post_update_id=$post_id'>Edit Post</a>
          </li>";
    }
}


?>
                    

                </ul>
                
                <ul class="nav navbar-nav navbar-right top-nav">
                    <?php if( $_SESSION['username']){ ?>
                    <li><a href="">Online Users: <span class="badge"><?php echo online_users(); ?></span></a></li>
                    <li><a href="admin/index.php">Admin Area</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <?php } else { ?>
                        <li><a href="../registration.php">Registration</a></li>
                    <?php } ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
                
        </div>
        <!-- /.container -->
    </nav>