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
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
    
    $query .= "VALUE( {$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";
    
    
    $create_post_query = mysqli_query($connection, $query);
    
    
    confirmQuery($create_post_query);

    
  }  
    
    

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="username">User Name:</label>
      <input name="username" type="text" class="form-control" placeholder="Enter User Name">
    </div>
    <div class="form-group">
      <label for="user_password">User Password:</label>
      <input name="user_password" type="password" class="form-control" placeholder="Enter User Password">
    </div>
    
    
    
    
    <div class="form-group">
      <label for="user_role">User Role:</label>
      
      <select name="role_id" id="">
          
        <option value='1'>Admin</option>
        <option value='2'>Author</option>
        <option value='3'>Subscriber</option>

      </select>
    
    </div>
    
    
    
    
    <div class="form-group">
      <label for="user_firstname">User First Name:</label>
      <input name="user_firstname" type="text" class="form-control" placeholder="Enter User First Name">
    </div>
    <div class="form-group">
      <label for="user_lastname">User Last Name:</label>
      <input name="user_lastname" type="text" class="form-control" placeholder="Enter User Last Name">
    </div>
    <div class="form-group">
      <label for="user_email">User Email:</label>
      <input name="user_email" type="email" class="form-control" placeholder="Enter User Email">
    </div>
    <div class="form-group">
      <label for="user_image">User Image:</label>
      <input name="user_image" type="file">
    </div>
    <!--<div class="form-group">-->
    <!--  <label for="user_role">User Role:</label>-->
    <!--  <input name="user_role" type="text" class="form-control" placeholder="Enter User Role">-->
    <!--</div>-->

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>