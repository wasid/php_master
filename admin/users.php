<?php include "includes/admin_header.php"?>

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
                            <small>Author</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
               
            
            <div class="col-lg-12">
                
                <?php
                
                if(isset($_GET['source'])){
                    
                    $source = $_GET['source'];
                
                }
                else{
                    $source = "";
                }
                
                switch ($source) {
                    
                    case 'add_user':
                        include "includes/add_user.php";
                        break;
                        
                    case 'update_user':
                        include "includes/update_user.php";
                        break;
                    
                    default:
                        include "includes/view_all_users.php";
                        break;
                }
                
                ?>

            </div>
            
            
            
            
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"?>
