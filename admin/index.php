<?php include "includes/admin_header.php"?>

    <div id="wrapper">
        
        
        <?php
        
        $session = session_id();
        $time = time();
        $time_out_in_sec = 60;
        $time_out = $time - $time_out_in_sec;
        
        $query = "SELECT * FROM users_online WHERE session = '$session' "
        $send_query = mysqli_query($connection, $query);
        $count_online = mysqli_num_rows($send_query);
        
        if($count_online == NULL){
            
            mysqli_query($connection, "INSERT INTO users_onlie(session, time) VALUES('$session', '$time') ");
            
        }
        else{
            
        }
        
        ?>

        <!-- Navigation -->
        
<?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                    
                                    $query = "SELECT * FROM  posts";
                                    $select_all_post = mysqli_query($connection, $query);
                                    $count_post = mysqli_num_rows($select_all_post);
                                    
                                    echo "<div class='huge'>$count_post</div>";
                                    
                                    ?>    
                                  
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                    
                                    $query = "SELECT * FROM  comments";
                                    $select_all_comment = mysqli_query($connection, $query);
                                    $count_comment = mysqli_num_rows($select_all_comment);
                                    
                                    echo "<div class='huge'>$count_comment</div>";
                                    
                                    ?>      
                                    
                                     <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                    
                                    $query = "SELECT * FROM  users";
                                    $select_all_user= mysqli_query($connection, $query);
                                    $count_user = mysqli_num_rows($select_all_user);
                                    
                                    echo "<div class='huge'>$count_user</div>";
                                    
                                    ?>
                                    
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                    
                                    $query = "SELECT * FROM  categories";
                                    $select_all_category= mysqli_query($connection, $query);
                                    $count_category = mysqli_num_rows($select_all_category);
                                    
                                    echo "<div class='huge'>$count_category</div>";
                                    
                                    ?>

                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                <?php
                
                                    
                $query_published_post = "SELECT * FROM  posts WHERE post_status = 'Published' ";
                $select_all_published_post = mysqli_query($connection, $query_published_post);
                $count_published_post = mysqli_num_rows($select_all_published_post);
                
                $query_unpublished_post = "SELECT * FROM  posts WHERE post_status = 'Unpublished' ";
                $select_all_unpublished_post = mysqli_query($connection, $query_unpublished_post);
                $count_unpublished_post = mysqli_num_rows($select_all_unpublished_post);
                
                $query_published_comment = "SELECT * FROM  comments WHERE comment_status = 'Approved' ";
                $select_all_published_comment = mysqli_query($connection, $query_published_comment);
                $count_published_comment = mysqli_num_rows($select_all_published_comment);
                
                $query_unpublished_comment = "SELECT * FROM  comments WHERE comment_status = 'Unapproved' ";
                $select_all_unpublished_comment = mysqli_query($connection, $query_unpublished_comment);
                $count_unpublished_comment = mysqli_num_rows($select_all_unpublished_comment);
                
                $query_admin = "SELECT * FROM  users WHERE user_role = 'Admin' ";
                $select_all_admin = mysqli_query($connection, $query_admin);
                $count_admin = mysqli_num_rows($select_all_admin);
                
                $query_author = "SELECT * FROM  users WHERE user_role = 'Author' ";
                $select_all_author = mysqli_query($connection, $query_author);
                $count_author = mysqli_num_rows($select_all_author);
                
                ?> 
                
                <div class="row">
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);
                
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Count'],
                          
      <?php
      
      $element_text = ['Active Post', 'Pending Post', 'Active Comment', 'Pending Comment', 'Admin', 'Author', 'Categories']; 
      
      $element_count = [$count_published_post, $count_unpublished_post, $count_published_comment, $count_unpublished_comment, $count_admin, $count_author, $count_category]; 
      
      for($i = 0; $i < 7; $i++){
          echo "['$element_text[$i]'" . ", " . "$element_count[$i]],";
      }
      
      ?>
                          
                        //   ['Posts', 350]
                        ]);
                
                        var options = {
                          chart: {
                            title: 'CMS Performance',
                            subtitle: 'Data, Posts, and Comments: 2014-2017',
                          }
                        };
                
                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>
                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                </div>
   
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"?>
