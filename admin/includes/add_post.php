<?php

if(isset($_POST['submit'])){
    
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
    
    $query .= "VALUE( {$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}' ) ";
    
    
    $create_post_query = mysqli_query($connection, $query);
    
    
    confirmQuery($create_post_query);

    
  }  
    
    

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Post Title:</label>
      <input name="title" type="text" class="form-control" placeholder="Enter Post Title">
    </div>
    <div class="form-group">
      <label for="post_category">Post Category ID:</label>
      <input name="post_category_id" type="text" class="form-control" placeholder="Enter Post Category ID">
    </div>
    <div class="form-group">
      <label for="post_author">Post Author:</label>
      <input name="author" type="text" class="form-control" placeholder="Enter Post Author">
    </div>
    <div class="form-group">
      <label for="post_status">Post Status:</label>
      <input name="post_status" type="text" class="form-control" placeholder="Enter Post Status">
    </div>
    <div class="form-group">
      <label for="post_image">Post Image:</label>
      <input name="image" type="file">
    </div>
    <div class="form-group">
      <label for="post_tags">Post Tags:</label>
      <input name="post_tags" type="text" class="form-control" placeholder="Enter Post Tags">
    </div>
    <div class="form-group">
      <label for="post_content">Post Content:</label>
      <textarea name="post_content" class="form-control" placeholder="Enter Post Content" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>