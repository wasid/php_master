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
            </div>
            <!-- Blog Entries Column -->
            <div class="col-md-8 success_search">
                
                <?php
                
                $query = "SELECT * FROM posts WHERE post_status = 'Published' ";
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

            <?php }
                else{
                    
                    echo"<h1 class='text-center'>Post is waiting for Admin approval!</h1>";
                }
            } ?>

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

<?php include "includes/footer.php"; ?>

