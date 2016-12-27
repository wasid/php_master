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
                <div class="col-lg-6">
                    <?php
                  
                        insertCat();
                    
                    ?>
                    <form action="" method="POST">
                      <div class="form-group">
                        <label for="cat-title">Add Category</label>
                        <input name="cat_title" type="text" class="form-control" placeholder="Category Name">
                      </div>
                      <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add">
                      </div>
                    </form>
                    
                <?php 
                
                if(isset($_GET['edit'])){
                    
                    $update_cat_id = $_GET['edit'];
                    
                    include "includes/update_cat.php";
                }
                
                ?>

                    
                </div><!-- category form -->

                <div class="col-lg-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Category Title</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        // Get all categories
                        
                            getCat();
                        
                        // Delete Category
                        
                            deleteCat();
                        
                        ?>
                        </tbody>
                      </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"?>
