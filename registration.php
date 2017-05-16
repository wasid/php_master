    <!-- DB Connection -->
<?php include "includes/db.php"; ?>

    <!-- Page Head -->

<?php include "includes/header.php"; ?>
    
    <!-- Nav -->

<?php include "includes/nav.php"; ?>

    <!-- functions -->
<?php include "admin/function.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <h1>Registration</h1>
            <form action="" method="" class="register-form"> 
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
                       <button class="btn btn-primary btn-block">Register</button>
            </form>
        </div>
        
    </div>
	 


<hr>

<?php include "includes/footer.php"; ?>