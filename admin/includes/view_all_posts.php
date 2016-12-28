    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Contents</th>
            <th>Tags</th>
            <th>Status</th>
            <th>Image</th>
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
                    $post_author = $row['post_author'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
            
                    echo "<tr>";
                    echo "<td>{$post_id}</td>";
                    echo "<td>{$post_author}</td>";
                    echo "<td>{$post_title}</td>";
                    echo "<td>{$post_content}</td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td>{$post_status}</td>";
                    echo "<td><img width='250' class='img-responsive' src='../images/{$post_image}' alt='image'></td>";
                    echo "<td>{$post_date}</td>";
                    echo "<td><a href='posts.php?edit={$post_id}'>Edit</a> | <a href='posts.php?delete={$post_id}'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>  

            </tbody>
      </table>