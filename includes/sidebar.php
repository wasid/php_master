    <div class="col-md-4">

   
    
        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <form action="search_ajax.php" method="post">
                <div class="input-group">
                    <input name="search" type="text" class="form-control search" placeholder="Search by tags!">
                </div>
            </form><!--Search Form-->
            <!-- /.input-group -->
        </div>
        
        <?php
       
           $query = "SELECT * FROM categories";
           $cat_sidebar_query = mysqli_query($connection, $query);
   
       ?>
       <!-- Log in -->
       <div class="well">
            <h4>Log in</h4>
            <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username!">
                </div>
                <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter Password!">
                    <span class="input-group-btn">
                        <button name="login" class="btn btn-primary" type="submit">Submit</button>
                    </span>
                </div>
            </form><!--Submit Form-->
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                        <?php
                         
                        while($row = mysqli_fetch_assoc($cat_sidebar_query)){
                               
                               $cat_id = $row['cat_id'];
                               $cat_title = $row['cat_title'];
                               
                               echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                               
                           }
                        
                        ?>
                    </ul>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <?php include 'widget.php'; ?>

    </div>