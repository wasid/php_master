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
                    
                    case 'add_comment':
                        include "includes/add_comment.php";
                        break;
                        
                    case 'update_comment':
                        include "includes/update_comment.php";
                        break;
                    
                    default:
                        include "includes/view_all_comments.php";
                        break;
                }
                
                ?>

            </div>
            
            
            
            
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"?>
