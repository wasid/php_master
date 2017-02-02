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
                    echo "<td><img width='250' class='img-responsive' src='../images/{$user_image}' alt='image'></td>";
                    echo "<td><a href='users.php?add_admin={$user_id}'>Make Admin</a> | <a href='users.php?add_sub={$user_id}'>Make Subscriber</a> | <a href='users.php?add_auth={$user_id}'>Make Author</a></td>";
                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>  

            </tbody>
      </table>
      
      <?php
      
       if (isset($_GET['add_admin'])) {
        
        $admin_user_id = $_GET['add_admin'];
        $admin_user = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$admin_user_id} ";
        $admin_user_query = mysqli_query($connection, $admin_user);
        header("Location: users.php");
        
      }
      
      if (isset($_GET['add_sub'])) {
        
        $sub_user_id = $_GET['add_sub'];
        $sub_user = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$sub_user_id} ";
        $sub_user_query = mysqli_query($connection, $sub_user);
        header("Location: users.php");
        
      }
      
      if (isset($_GET['add_auth'])) {
        
        $auth_user_id = $_GET['add_auth'];
        $auth_user = "UPDATE users SET user_role = 'Author' WHERE user_id = {$auth_user_id} ";
        $auth_user_query = mysqli_query($connection, $auth_user);
        header("Location: users.php");
        
      }
      
      if (isset($_GET['delete'])) {
        
        $del_user_id = $_GET['delete'];
        $query_user = "DELETE FROM users WHERE user_id = {$del_user_id} ";
        $del_user_query = mysqli_query($connection, $query_user);
        header("Location: users.php");
        
      }
      
      ?>