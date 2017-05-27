    <!-- DB Connection -->
<?php include "includes/db.php"; ?>

    <!-- Page Head -->

<?php include "includes/header.php"; ?>
  
    <!-- Nav -->

<?php include "includes/nav.php"; ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                
                <?php
                
                $post_per_page = 3;
                
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }
                
                if($page == "" || $page == 1 ){
                    
                    $start_limit_point = 0;
                }else{
                    $start_limit_point = ($page * $post_per_page) - $post_per_page;
                }
                
                
                
                ?>
                
            </div>
            <!-- Blog Entries Column -->
            <div class="col-md-8 success_search">
                
                <?php
                
                $post_query_count = "SELECT * FROM posts WHERE post_status = 'Published'";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);
                
                $count = ceil($count / 3);
                
                // $query = "SELECT * FROM posts LIMIT $start_limit_point, 3";
                $query = "SELECT * FROM posts WHERE post_status = 'Published' LIMIT $start_limit_point, $post_per_page";
                $post_all_query = mysqli_query($connection, $query);
                
                                       
              if (mysqli_num_rows($post_all_query) == 0) {
                   
                  echo "<h1 class='text-center'>No post has been published yet!</h1>";
                   
              }
                   
                   while($row = mysqli_fetch_assoc($post_all_query)){
                       
                       $post_id = $row['post_id'];
                       $post_title = $row['post_title'];
                       $post_author = $row['post_author'];
                       $post_date= $row['post_date'];
                       $post_image = $row['post_image'];
                       $post_content = substr($row['post_content'], 0, 100);
                       $post_status = $row['post_status'];

                       
                    if ($post_status == 'Published') {
                      
                     
                ?>
                  

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author ?>&post_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                
                <hr>
                
                <a href="post.php?post_id=<?php echo $post_id ?>">
                    
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    
                </a>
                
                <hr>
                
                <p><?php echo $post_content."....." ?></p>
                
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php
            }
                else{
                    
                    echo"<h1 class='text-center'>Post is waiting for Admin approval!</h1>";
                }
            } 
            
            ?>

            </div>
            
            <!--Ajax test-->
            <!--<div class="col-md-8">-->
            <!--    <div class="success"></div>-->
            <!--</div>-->
            <!-- Blog Sidebar Widgets Column -->

<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
        
        <ul class="pager">
            
            <?php

            for ($i = 1; $i <= $count; $i++) {
                
                if ($i == $page) {
                    
                    echo "<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";
                
                    
                }
                else{
                    
                    echo "<li><a href='index.php?page=$i'>$i</a></li>";
                
                }
                
            }
            
            
            ?>

        </ul>

<?php include "includes/footer.php"; ?>

