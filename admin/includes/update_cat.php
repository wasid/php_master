    <form action="" method="POST">
      <div class="form-group">
        <label for="cat-title-update">Update Category</label>
        
        
        <!-- edit category -->
        <?php
        
        if(isset($_GET['edit'])){
            
            $cat_id = $_GET['edit'];
        
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
            $cat_edit_query = mysqli_query($connection, $query);    
            
            while($row = mysqli_fetch_assoc($cat_edit_query)){
                   
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            
       ?>
       
       <input value = "<?php if(isset($cat_title)){ echo $cat_title;} ?>" name="cat_title_update" type="text" class="form-control" placeholder="Updated Category Name">
       
       <?php }
       
        } ?>
       
       <?php
       
       // Update category
       
       if(isset($_POST['update_cat'])){
                $the_cat_title = $_POST['cat_title_update'];
                $query_update_cat = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$update_cat_id} ";
                $update_query = mysqli_query($connection, $query_update_cat);
                //header("Location: categories.php");
            
           if(!update_query){
               die('Update failed' . mysqli_error($connection));
           }
       }
            
       
       ?>
        
        
         
        
        </div>
        <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_cat" value="Update">
        </div>
    </form>