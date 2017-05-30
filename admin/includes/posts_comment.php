    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comments</th>
            <th>Status</th>
            <th>Related Post Title</th>
            <th>Date</th>
            <th>Approval</th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>
              <!--<tr>-->
                  
                <?php
                
                if(isset($_GET['post_id'])){
                    
                  $post_id = $_GET['post_id'];
                  
                  $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                  $comment_admin_query = mysqli_query($connection, $query);    
                  
                  while($row = mysqli_fetch_assoc($comment_admin_query)){
                         
                      $comment_id = $row['comment_id'];
                      $comment_post_id = $row['comment_post_id'];
                      $comment_author = $row['comment_author'];
                      $comment_email = $row['comment_email'];
                      $comment_content = $row['comment_content'];
                      $comment_status = $row['comment_status'];
                      $comment_date = $row['comment_date'];
                      
                      echo "<tr>";
                      echo "<td>{$comment_id}</td>";
                      echo "<td>{$comment_author}</td>";
                      echo "<td>{$comment_email}</td>";
                      echo "<td>{$comment_content}</td>";
                      echo "<td>{$comment_status}</td>";
                      
                      $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                      $post_query = mysqli_query($connection, $query);    
                      
                      while($row = mysqli_fetch_assoc($post_query)){
                             
                          $post_id = $row['post_id'];
                          $post_title = $row['post_title'];
                          
                      echo "<td><a href='../post.php?post_id=$post_id'>{$post_title}</a></td>";
                      
                        
                      }
  
                      echo "<td>{$comment_date}</td>";
                      echo "<td><a href='comments.php?source=posts_comment&post_id=$post_id&approve={$comment_id}'>Approve</a> |
                      <a href='comments.php?source=posts_comment&post_id=$post_id&unapprove={$comment_id}'>Unapprove</a></td>";
                      echo "<td><a href='comments.php?source=posts_comment&post_id=$post_id&delete={$comment_id}'>Delete</a></td>";
                      echo "</tr>";
                  }
                
                }
                ?>  

            </tbody>
      </table>
      
      <?php
      
       if (isset($_GET['approve'])) {
        
        $approve_comment_id = $_GET['approve'];
        $approve_comment = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$approve_comment_id} ";
        $approve_comment_query = mysqli_query($connection, $approve_comment);
        header('Location: https://'. $_SERVER['SERVER_NAME'] .'/admin/comments.php?source=posts_comment&post_id='.$post_id.'');
        
      }
      
      if (isset($_GET['unapprove'])) {
        
        $unapprove_comment_id = $_GET['unapprove'];
        $unapprove_comment = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$unapprove_comment_id} ";
        $unapprove_comment_query = mysqli_query($connection, $unapprove_comment);
        header('Location: https://'. $_SERVER['SERVER_NAME'] .'/admin/comments.php?source=posts_comment&post_id='.$post_id.'');
        
      }
      
      if (isset($_GET['delete'])) {
        
        $del_comment_id = $_GET['delete'];
        $query_comment = "DELETE FROM comments WHERE comment_id = {$del_comment_id} ";
        $del_comment_query = mysqli_query($connection, $query_comment);
        header('Location: https://'. $_SERVER['SERVER_NAME'] .'/admin/comments.php?source=posts_comment&post_id='.$post_id.'');
        
      }
      
      ?>