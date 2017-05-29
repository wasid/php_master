<?php

if(isset($_GET['update_user'])){

  $update_user_id = $_GET['update_user'];
  
  $user_query = "SELECT * FROM users WHERE user_id = $update_user_id";
                $user_admin_query = mysqli_query($connection, $user_query);
                
                while($row = mysqli_fetch_assoc($user_admin_query)){             
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_role = $row['user_role'];
                    $user_image = $row['user_image'];
                    $user_ranSalt = $row['user_ranSalt'];
                }

}

if(isset($_POST['update_user_submit'])){
  
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    
    // $user_image = $_FILES['image']['name'];
    // $user_image_temp = $_FILES['image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    
    // move_uploaded_file($user_image_temp, "../images/$user_image");
    
    // $salt_query = "SELECT randSalt FROM users";
    // $select_randsalt_query = mysqli_query($connection, $salt_query);
    
    // confirmQuery($select_randsalt_query);
    
    // $row = mysqli_fetch_array($select_randsalt_query);
        
    // $salt = $row['randSalt'];
    
    $hashed_password = password_hash("$user_password", PASSWORD_BCRYPT, array('cost' => 12) );

    $query = "UPDATE users SET ";
    $query .="username = '{$username}', ";
    $query .="user_password = '{$hashed_password}', ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    // $query .="post_date = now(), ";
    // $query .="post_image = '{$post_image}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_role = '{$user_role}' ";
    $query .="WHERE user_id = {$update_user_id} ";
    
    $update_user_query = mysqli_query($connection, $query);

    confirmQuery($update_user_query);
        
    
    header("Location: users.php");

    
  }  
    
    

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="username">User Name:</label>
      <input name="username" value="<?= $username ?>" type="text" class="form-control" placeholder="Enter User Name">
    </div>
    <div class="form-group">
      <label for="user_password">User Password:</label>
      <input name="user_password" value="<?= $user_password ?>" type="password" class="form-control" placeholder="Enter User Password">
    </div>
    
    
    
    
    <div class="form-group">
      <label for="user_role">User Role:</label>
      
      <select name="user_role" id="">
        
        <option value='<?= $user_role ?>'><?= $user_role ?></option>
        <?php
        
        if($user_role == 'Admin'){
          
          echo "<option value='Author'>Author</option>";
          echo "<option value='Subscriber'>Subscriber</option>";
          
        }
        elseif($user_role == 'Subscriber'){
          echo "<option value='Author'>Author</option>";
          echo "<option value='Admin'>Admin</option>";
        }
        
        else{
          echo "<option value='Admin'>Admin</option>";
          echo "<option value='Subscriber'>Subscriber</option>";
        }
        
        ?>
        
        

      </select>
    
    </div>
    
    
    
    
    <div class="form-group">
      <label for="user_firstname">User First Name:</label>
      <input name="user_firstname" value="<?= $user_firstname ?>" type="text" class="form-control" placeholder="Enter User First Name">
    </div>
    <div class="form-group">
      <label for="user_lastname">User Last Name:</label>
      <input name="user_lastname" value="<?= $user_lastname ?>" type="text" class="form-control" placeholder="Enter User Last Name">
    </div>
    <div class="form-group">
      <label for="user_email">User Email:</label>
      <input name="user_email" value="<?= $user_email ?>" type="email" class="form-control" placeholder="Enter User Email">
    </div>
    <div class="form-group">
      <label for="user_image">User Image:</label>
      <input name="image" type="file">
    </div>
    <!--<div class="form-group">-->
    <!--  <label for="user_role">User Role:</label>-->
    <!--  <input name="user_role" type="text" class="form-control" placeholder="Enter User Role">-->
    <!--</div>-->

    <button type="submit" name="update_user_submit" class="btn btn-primary">Submit</button>
</form>