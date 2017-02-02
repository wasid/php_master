    <!-- DB Connection -->
<?php include "includes/db.php"; ?>

    <!-- Page Head -->

<?php include "includes/header.php"; ?>
    
    <!-- Nav -->

<?php include "includes/nav.php"; ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 success_search">
                
                <?php
                
                if (isset($_GET['category'])) {
                    $post_cat_id = $_GET['category'];
                }
                
                $query = "SELECT * FROM posts WHERE post_category_id = $post_cat_id";
                $post_all_query = mysqli_query($connection, $query);
                
                $count = mysqli_num_rows($post_all_query);
                
                if($count == 0){
                    
                $cat_query = "SELECT * FROM categories WHERE cat_id = $post_cat_id";
                $get_cat = mysqli_query($connection, $cat_query);
            
                    while($row = mysqli_fetch_assoc($get_cat)){
                   
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
            
                
                
                    echo "<h1 class='text-center'>No post yet in $cat_title category!</h1>";
                
                    }  
                }
                   
                   while($row = mysqli_fetch_assoc($post_all_query)){
                       
                       $post_id = $row['post_id'];
                       $post_title = $row['post_title'];
                       $post_author = $row['post_author'];
                       $post_date= $row['post_date'];
                       $post_image = $row['post_image'];
                       $post_status = $row['post_status'];
                       $post_content = substr($row['post_content'], 0, 100);
                  
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
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php
                  }
                else{
                    
                    echo"<h1 class='text-center'>Post is waiting for Admin approval!</h1>";
                }
            } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->

<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>