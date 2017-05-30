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
      
      case 'Clone':
        
          $query = "SELECT * FROM posts WHERE post_id = $post_Id ";
          
          $select_post__query = mysqli_query($connection, $query);    
          
          while($row = mysqli_fetch_assoc($select_post__query)){
                 
              $post_title = $row['post_title'];
              $post_cat_id = $row['post_category_id'];
              $post_author = $row['post_author'];
              $post_content = $row['post_content'];
              $post_tags = $row['post_tags'];
              $post_status = $row['post_status'];
              // $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              
              
          }
          
          $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
    
          $query .= "VALUE( {$post_cat_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";
          
          
          $cloned_post_query = mysqli_query($connection, $query);
          
          
          confirmQuery($cloned_post_query);
          
          $created_post_id = mysqli_insert_id($connection);
          
          echo "<p class='bg-success'>Post Cloned Successfully!";
      
            
        break;
        
        case 'reset_views':
        
          $query = "UPDATE posts SET ";
          $query .="post_views_count = 0 ";
          $query .="WHERE post_id = '{$post_Id}' ";
          
          $reset_post_views_query = mysqli_query($connection, $query);
  
          confirmQuery($reset_post_views_query);
      
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
      <option value="Clone">Clone</option>
      <option value="reset_views">Reset Post Views</option>
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
            <th>Post viewed</th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>
              <!--<tr>-->
                  
                <?php
                $query = "SELECT * FROM posts ORDER BY post_id DESC";
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
                    $post_views_count = $row['post_views_count'];
            
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
                    
                    // Counting comments for particular post
                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                    $comment_count_query = mysqli_query($connection, $query);
                    confirmQuery($comment_count_query);
                    $row = mysqli_fetch_array($comment_count_query);
                    $comment_id = $row['comment_id'];
                    $post_comment_count = mysqli_num_rows($comment_count_query);
                    

                    echo "<td><a href='comment.php?=$comment_id'>{$post_comment_count}</a></td>";
                    
   
                    echo "<td>{$post_date}</td>";
                    echo "<td>{$post_views_count}</td>";
                    echo "<td><a href='posts.php?source=update_post&post_update_id={$post_id}'>Edit</a> | <a onClick=\" javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
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