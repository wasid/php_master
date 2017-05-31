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
                <div class="col-md-8">
                    <div class="success_search"></div>
                </div>
                
                <div class="col-md-8 remove_while_search">
                    
                    <?php
                    
                    if (isset($_GET['post_id'])) {
                        $show_post_id = $_GET['post_id'];
                        $show_post_author = $_GET['author'];
                    }
                    
                    $query = "SELECT * FROM posts WHERE post_author = '$show_post_author' ";
                    $post_all_query = mysqli_query($connection, $query);
                       
                       while($row = mysqli_fetch_assoc($post_all_query)){
                           
                           $post_id = $row['post_id'];
                           $post_title = $row['post_title'];
                           $post_author = $row['post_author'];
                           $post_date= $row['post_date'];
                           $post_image = $row['post_image'];
                           $post_content = $row['post_content'];
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
                        by <?php echo $post_author ?>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <hr>
    
                <?php } ?>
    
                    <hr>
    
           </div>
            
            <!-- Blog Sidebar Widgets Column -->

<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>