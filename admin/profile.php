<?php include "includes/admin_header.php"?>

<?php

    if (isset($_SESSION['user_role'])) {
        
    
        
    }

?>

    <div id="wrapper">

        <!-- Navigation -->
        
<?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
               
            
            <div class="col-lg-12">
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

            </div>
            
            
            
            
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"?>
