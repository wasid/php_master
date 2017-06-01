<?php


    
    if(isset($_GET['post_update_id'])){
            
    $post_id = $_GET['post_update_id'];
    
    $query = "SELECT * FROM posts WHERE post_id = $post_id ";
    
    $post_admin_update_query = mysqli_query($connection, $query);    
    
    while($row = mysqli_fetch_assoc($post_admin_update_query)){
           
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_cat_id = $row['post_category_id'];
        $post_author = $row['post_author'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        
        
        
        if (isset($_POST['update_post'])) {
          
            
          if(isset($_SESSION['user_id'])){
            $post_user_id = $_SESSION['user_id'];
            
            $query = "SELECT * FROM users WHERE user_id = $post_user_id ";
            $post_user_query = mysqli_query($connection, $query);
            
            confirmQuery($post_user_query);
            
            while($row = mysqli_fetch_assoc($post_user_query)){
                
                 $post_author = $row['username'];
            }
          }

        // echo $_POST['u_author'];
        
        // $post_author = $_POST['u_author'];
        $post_title = $_POST['u_title'];
        $post_category_id = $_POST['u_post_category'];
        $post_status = $_POST['u_post_status'];
        
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_content = $_POST['u_post_content'];
        $post_tags = $_POST['u_post_tags'];

        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        if (!$post_image) {
            $query_image = "SELECT * FROM posts WHERE post_id = $post_id ";
            $select_image = mysqli_query($connection,$query_image);
            
            while($row = mysqli_fetch_array($select_image)){
                $post_image = $row['post_image'];
            }
        }
        
        $query = "UPDATE posts SET ";
        $query .="post_title = '{$post_title}', ";
        $query .="post_category_id = {$post_category_id}, ";
        $query .="post_author = '{$post_author}', ";
        $query .="post_date = now(), ";
        $query .="post_image = '{$post_image}', ";
        $query .="post_status = '{$post_status}', ";
        $query .="post_tags = '{$post_tags}', ";
        $query .="post_content = '{$post_content}' ";
        $query .="WHERE post_id = '{$post_id}' ";
        
        $update_post_query = mysqli_query($connection, $query);

        confirmQuery($update_post_query);
        
        echo "<p class='bg-success'>Post Updated Successfully: " . " " . "<a href='../../post.php?post_id=$post_id'>View Updated Post</a> or <a href='../admin/posts.php'>View All Posts</a></p>";
        
        // header("Location: posts.php");

        }

    }
       
} 

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Post Title:</label>
      <input name="u_title" type="text" class="form-control" value="<?php echo $post_title; ?>">
    </div>
    
    
    <div class="form-group">
      <label for="post_category">Post Category:</label>
      
      <select name="u_post_category" id="">
          
          <?php
            // getting current category
            $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id";
            $cat_query = mysqli_query($connection, $query);
            
            confirmQuery($cat_query);
            
            while($row = mysqli_fetch_assoc($cat_query)){
                   
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                echo "<option value='$cat_id'>$cat_title</option>";
            }
            echo "<option>~~~~~~~</option>";
            // for updating category
            $query = "SELECT * FROM categories";
            $cat_query = mysqli_query($connection, $query);
            
            confirmQuery($cat_query);
            
            while($row = mysqli_fetch_assoc($cat_query)){
                   
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                echo "<option value='$cat_id'>$cat_title</option>";
            }
          
          
          ?>

      </select>
    
    </div>
    
    
    <div class="form-group">
      <label for="post_author">Post Author:</label>
      <?php echo $post_author; ?>
    </div>
    <div class="form-group">
      <label for="post_status">Post Status:</label>
      <!--<input name="u_post_status" type="text" class="form-control" value="">-->
      <select name="u_post_status" id="">
        <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
        <?php 
          if($post_status == 'Published'){
           echo "<option value='Unpublished'>Unpublished</option>";
          } else{
           echo "<option value='Published'>Published</option>"; 
          }
        ?>
        
      </select>
    </div>
    
    <!--images upload-->
    <!--<div class="form-group">-->
    <!--  <label for="post_image">Post Image:</label>-->
      
    <!--  <input type="file" name="u_image"/>-->
    <!--</div>-->
    <div class="form-group">
      <img width="100" src="../images/<?php echo $post_image;?>" alt="">
      <label for="post_image">Post Image:</label>
      <input name="image" type="file">
    </div>
    
    
    <div class="form-group">
      <label for="post_tags">Post Tags:</label>
      <input name="u_post_tags" type="text" class="form-control" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
      <label for="post_content">Post Content:</label>
      <textarea name="u_post_content" class="form-control" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    
    <button type="submit" name="update_post" class="btn btn-primary">Submit</button>
</form>