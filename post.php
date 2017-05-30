    <!-- DB Connection -->
<?php include "includes/db.php"; ?>

    <!-- Page Head -->

<?php include "includes/header.php"; ?>
    
    <!-- Nav -->

<?php include "includes/nav.php"; ?>

    <!-- functions -->
<?php include "includes/indexFunction.php"; ?>



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
                    
                    $post_view_count_query = "UPDATE posts SET post_views_count = post_views_count + 1 ";
                    $post_view_count_query .= "WHERE post_id = $show_post_id ";
                    $post_view_count = mysqli_query($connection, $post_view_count_query);
                    
                    confirmQuery($post_view_count);

                    $query = "SELECT * FROM posts WHERE post_id = $show_post_id ";
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
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <hr>
    
                <?php }
                
                }
                else{
                    
                    header("Location: index.php");
                }
                
                ?>
                
                 <!-- Blog Comments -->
                 
                 <?php
                 
                    if (isset($_POST['create_comment'])) {
                        
                        $comment_post_id = $_GET['post_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email= $_POST['comment_author_email'];
                        $comment_content = $_POST['post_content'];
                        
                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                            
                            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                        
                            $query .= "VALUES ($comment_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', now() )";
                        
                            $create_comment_query =mysqli_query($connection, $query);
                            
                            confirmQuery($create_comment_query);
                            
                            // $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                            // $query .= "WHERE post_id = $comment_post_id ";
                            // $update_comment_count = mysqli_query($connection, $query);
                            
                            // confirmQuery($update_comment_count);
                            
                        }
                        else{
                            echo "<script>alert('Input fields can not be empty!');</script>";
                        }
                        
                        
                        
                    }
                 
                 ?>
    
                    <!-- Comments Form -->
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form action="" method="post" role="form">
                            <div class="form-group">
                              <label for="comment_author">Name</label>
                              <input name="comment_author" type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                              <label for="comment_author_email">Email</label>
                              <input name="comment_author_email" type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                              <label for="post_content">Post Content:</label>
                              <textarea name="post_content" class="form-control" placeholder="Enter your comment" cols="30" rows="3"></textarea>
                            </div>
                            <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
    
                    <hr>
    
                    <!-- Posted Comments -->
    
    
                    <?php
                    
                    if (isset($_GET['post_id'])) {
                        $comment_post_id = $_GET['post_id'];
                    }
                    
                    $query = "SELECT * FROM comments WHERE comment_post_id = $comment_post_id ";
                    $query .= "AND comment_status = 'Approved' ";
                    $query .= "ORDER BY comment_id DESC ";
                    
                    $approved_comment = mysqli_query($connection, $query);
                        
                    confirmQuery($approved_comment);
                        
                    while($row = mysqli_fetch_array($approved_comment)){
                        
                        $comment_author = $row['comment_author'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                        
                    ?>
                        
                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment_author; ?>
                                <small><?php echo $comment_date; ?></small>
                            </h4>
                            <?php echo $comment_content; ?>
                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Nested Start Bootstrap
                                        <small>August 25, 2014 at 9:30 PM</small>
                                    </h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            <!-- End Nested Comment -->
                        </div>
                    </div>  
                        
                        
                    <?php } ?>
    
           </div>
            
            <!-- Blog Sidebar Widgets Column -->

<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>