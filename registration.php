    <!-- DB Connection -->
<?php include "includes/db.php"; ?>

    <!-- Page Head -->

<?php include "includes/header.php"; ?>
    
    <!-- Nav -->

<?php include "includes/nav.php"; ?>

    <!-- functions -->
<?php include "admin/function.php"; ?>

<?php


if(isset($_POST['submit'])){
    
    $username      = $_POST['username'];
    $user_email    = $_POST['email'];
    $user_password = $_POST['password'];
    
    $username      = mysqli_real_escape_string($connection, $username);
    $user_email    = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    
    $query = "SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    
    confirmQuery($select_randsalt_query);


    
    // $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role )";
    
    // $query .= "VALUE( '{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}' ) ";
    
    
    //     $update_user_query = mysqli_query($connection, $query);

    //     confirmQuery($update_user_query);
        
    
    // header("Location: users.php");

    
  }  
    
    

?>

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <h1 class="text-center">Registration</h1>
            <form action="" method="POST"> 
                    <div class="form-group">
                       <input name="username" class="form-control" type="text" placeholder="Enter username">    
                    </div>            
                    <div class="form-group">
                       <input name="email" class="form-control" type="email" placeholder="Enter email">             
                    </div>            
                    <div class="form-group">
                        <input name="password" class="form-control" type="password" placeholder="Enter password">             
                    </div>            
                    <hr>
                       <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Register</button>
            </form>
        </div>
        
    </div>
	 


<hr>

<?php include "includes/footer.php"; ?>