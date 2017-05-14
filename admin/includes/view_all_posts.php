<?php

if(isset($_POST['selectBoxIdArray'])){
  
  $allboxId = $_POST['selectBoxIdArray'];
  
  foreach($allboxId as $post_Id){
  
  $bulk_options = $_POST['bulk_options'];
  
    switch($bulk_options){
      
      case 'Published':
          
          $query = "UPDATE posts SET ";
          $query .="post_status = '{$bulk_options}' ";
          $query .="WHERE post_id = '{$post_Id}' ";
          
          $update_published_post_query = mysqli_query($connection, $query);
  
          confirmQuery($update_published_post_query);
          
        break;
        
      case 'Unpublished':
        
          $query = "UPDATE posts SET ";
          $query .="post_status = '{$bulk_options}' ";
          $query .="WHERE post_id = '{$post_Id}' ";
          
          $update_unpublished_post_query = mysqli_query($connection, $query);
  
          confirmQuery($update_unpublished_post_query);
          
        break;
      
      case 'Delete':
        
          $query = "DELETE FROM posts ";
          $query .="WHERE post_id = '{$post_Id}' ";
          
          $delete_post_query = mysqli_query($connection, $query);
  
          confirmQuery($delete_post_query);
      
        break;
      
    }
  
    
  }
}

?>

<form action="" method="post">
  <div id="bulkOptionContainer" class="col-xs-4">
    <select class="form-control" name="bulk_options" id="">
      <option value="Published">Published</option>
      <option value="Unpublished">Unpublished</option>
      <option value="Delete">Delete</option>
    </select>
  </div>
  <div class="col-xm-4">
    <input class="btn btn-success" type="submit" value="Apply"/>
    <a class="btn btn-primary" href="../admin/posts.php?source=add_post">Add New</a>
  </div>
  

    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th><input id="selectAllBox" type="checkbox" /></th>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Contents</th>
            <th>Tags</th>
            <th>Status</th>
            <th>Image</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>
              <!--<tr>-->
                  
                <?php
                $query = "SELECT * FROM posts";
                $post_admin_query = mysqli_query($connection, $query);    
                
                while($row = mysqli_fetch_assoc($post_admin_query)){
                       
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_cat_id = $row['post_category_id'];
                    $post_author = $row['post_author'];
                    $post_content = $row['post_content'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
            
                    echo "<tr>";
                    ?>
                    <td><input class='selectBox' type='checkbox' name='selectBoxIdArray[]' value='<?php echo $post_id; ?>'/></td>
                    <?php
                    echo "<td>{$post_id}</td>";
                    echo "<td>{$post_author}</td>";
                    echo "<td><a href='../post.php?post_id=$post_id'>{$post_title}</a></td>";
                    
                    $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id ";
                    $cat_query = mysqli_query($connection, $query);    
                    
                    while($row = mysqli_fetch_assoc($cat_query)){
                           
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        
                    echo "<td>{$cat_title}</td>";
                    
                      
                    }
                    
                    echo "<td>{$post_content}</td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td>{$post_status}</td>";
                    echo "<td><img width='250' class='img-responsive' src='../images/{$post_image}' alt='image'></td>";
                    echo "<td>{$post_comment_count}</td>";
                    echo "<td>{$post_date}</td>";
                    echo "<td><a href='posts.php?source=update_post&post_update_id={$post_id}'>Edit</a> | <a href='posts.php?delete={$post_id}'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>  

            </tbody>
      </table>
    </form>  
      
      <?php
      
      if (isset($_GET['delete'])) {
        
        $del_post_id = $_GET['delete'];
        $query_post = "DELETE FROM posts WHERE post_id = {$del_post_id} ";
        $del_post_query = mysqli_query($connection, $query_post);
        header("Location: posts.php");
        
      }
      
      ?>