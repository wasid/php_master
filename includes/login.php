<?php include "db.php"?>
<?php include "function.php"?>

<?php

if (isset($_POST['login'])) {
    
   $username = $_POST['username'];
   $password = $_POST['password'];
   
   $username = mysqli_real_escape_string($connection, $username);
   $password = mysqli_real_escape_string($connection, $password);
   
   $query = "SELECT * FROM users WHERE username = '{$username}'";
   $select_user_query = mysqli_query($connection, $query);
   
   confirmQuery($select_user_query);
}

 while($row = mysqli_fetch_assoc($select_user_query)){  
     
     $db_id = $row['user_id'];
     $db_username = $row['username'];
     $db_password = $row['user_password'];
     $db_firstname = $row['user_firstname'];
     $db_lastname = $row['user_lastname'];
     $db_role = $row['user_role'];
     
     
 }
 
 if ($username !== $db_username && $password !== $db_password) {
     
     header("Location: ../index.php");
 }
 
 elseif ($username === $db_username && $password === $db_password) {
    
     header("Location: ../admin/index.php");
    
 }
 
 else {
    
    header("Location: ../index.php");
 }


?>