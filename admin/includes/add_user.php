<?php

if(isset($_POST['user_submit'])){
    
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    
    move_uploaded_file($user_image_temp, "../images/$user_image");
    
    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role )";
    
    $query .= "VALUE( '{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}' ) ";
    
    
    $create_user_query = mysqli_query($connection, $query);
    
    
    confirmQuery($create_user_query);
    
    echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
    
    // header("Location: users.php");

    
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
      
      <select name="user_role" id="">
          
        <option value='Admin'>Admin</option>
        <option value='Author'>Author</option>
        <option value='Author'>Subscriber</option>

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
      <input name="image" type="file">
    </div>
    <!--<div class="form-group">-->
    <!--  <label for="user_role">User Role:</label>-->
    <!--  <input name="user_role" type="text" class="form-control" placeholder="Enter User Role">-->
    <!--</div>-->

    <button type="submit" name="user_submit" class="btn btn-primary">Submit</button>
</form>