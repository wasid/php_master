    <!-- DB Connection -->
<?php include "includes/db.php"; ?>

    <!-- Page Head -->

<?php include "includes/header.php"; ?>
    
    <!-- Nav -->

<?php include "includes/nav.php"; ?>

    <!-- functions -->
<?php include "includes/indexFunction.php"; ?>

<?php


if(isset($_POST['submit'])){
    
    $username      = $_POST['username'];
    $user_email    = $_POST['email'];
    $user_password = $_POST['password'];
    
    if(!empty($username) && !empty($user_email) && !empty($user_password)){
        
        
        $username      = mysqli_real_escape_string($connection, $username);
        $user_email    = mysqli_real_escape_string($connection, $user_email);
        $user_password = mysqli_real_escape_string($connection, $user_password);
        
        $user_password = password_hash("$user_password", PASSWORD_BCRYPT, array('cost' => 12) );
        
        // $query = "SELECT randSalt FROM users";
        // $select_randsalt_query = mysqli_query($connection, $query);
        
        // confirmQuery($select_randsalt_query);
        
        // $row = mysqli_fetch_array($select_randsalt_query);
            
        // $salt = $row['randSalt'];

        
        // $user_password = crypt($user_password, $salt);
    
    
        
        $query = "INSERT INTO users(username, user_password, user_email, user_role )";
        
        $query .= "VALUE( '{$username}', '{$user_password}', '{$user_email}', 'Subscriber' ) ";
        
        
            $register_user_query = mysqli_query($connection, $query);
    
            confirmQ($register_user_query);
            
            $msg ="<p class='bg-success text-center'>Your Registration has been submitted!</p>";
            
        
        // header("Location: users.php");   
        
        
    }
    
    else{
            $msg ="<p class='bg-danger text-center'>Input fields can not be empty!</p>";
        }
    
   

    
  }
  
    else{
            $msg ="";
        }
    
    

?>

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <h1 class="text-center">Registration</h1>
            <?php echo $msg; ?>
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