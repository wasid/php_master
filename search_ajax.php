    <!-- DB Connection -->
<?php include "includes/db.php"; ?>

    <!-- Page Head -->

<?php include "includes/header.php"; ?>
    
    <!-- Nav -->




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php

        
                $search = $_POST['search'];
                
                if(isset($search)){
                
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    
                    $search_query = mysqli_query($connection, $query);
                    
                    if(!$search_query){
                        
                        die('Query Failed'. mysqli_error($connection));
                    
                    }
                    
                    $count = mysqli_num_rows($search_query);
                    
                    if($count == 0){
                        echo "<h1>No results found!</h1>";
                    }
                    
                    else{
                    
                       while($row = mysqli_fetch_assoc($search_query)){
                           
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
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    
                    <hr>
    
                <?php } 

                    }
                    
                    
                }?>
        
                
                
            </div>

            <!-- Blog Sidebar Widgets Column -->



        </div>
        <!-- /.row -->

        <hr>

