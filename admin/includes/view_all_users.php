    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>First Name</th>
            <th>last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>
            <th>Approval</th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>
              <!--<tr>-->
                  
                <?php
                $user_query = "SELECT * FROM users ";
                $user_admin_query = mysqli_query($connection, $user_query);
                
                while($row = mysqli_fetch_assoc($user_admin_query)){             
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_role = $row['user_role'];
                    $user_image = $row['user_image'];
                    $user_ranSalt = $row['user_ranSalt'];
                    
                    echo "<tr>";
                    echo "<td>{$user_id}</td>";
                    echo "<td>{$username}</td>";
                    echo "<td>{$user_password}</td>";
                    echo "<td>{$user_firstname}</td>";
                    echo "<td>{$user_lastname}</td>";
                    echo "<td>{$user_email}</td>";
                    echo "<td>{$user_role}</td>";
                    echo "<td>{$user_image}</td>";

                    echo "<td><a href='users.php?approve={$user_id}'>Approve</a> | <a href='users.php?unapprove={$user_id}'>Unapprove</a></td>";
                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>  

            </tbody>
      </table>
      
      <?php
      
       if (isset($_GET['approve'])) {
        
        $approve_comment_id = $_GET['approve'];
        $approve_comment = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$approve_comment_id} ";
        $approve_comment_query = mysqli_query($connection, $approve_comment);
        header("Location: comments.php");
        
      }
      
      if (isset($_GET['unapprove'])) {
        
        $unapprove_comment_id = $_GET['unapprove'];
        $unapprove_comment = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$unapprove_comment_id} ";
        $unapprove_comment_query = mysqli_query($connection, $unapprove_comment);
        header("Location: comments.php");
        
      }
      
      if (isset($_GET['delete'])) {
        
        $del_comment_id = $_GET['delete'];
        $query_comment = "DELETE FROM comments WHERE comment_id = {$del_comment_id} ";
        $del_comment_query = mysqli_query($connection, $query_comment);
        header("Location: comments.php");
        
      }
      
      ?>