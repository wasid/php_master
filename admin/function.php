<?php

function confirmQuery($result){
global $connection;
    
    if(!$result){
      die("Query failed." . mysqli_error($connection));
    }
}


function insertCat(){
global $connection;

        if(isset($_POST['cat_title'])){
                            
        $cat_title = $_POST['cat_title'];
         
        if($cat_title == "" || empty($cat_title)){
             
             echo "This field should not be empty!";
        }
        else{
             
             $query = "INSERT INTO categories(cat_title)";
             $query .= "VALUE('{$cat_title}')";
             
             $create_cat_query = mysqli_query($connection, $query);
         
             if(!$create_cat_query){
                 die('QUERY FAILED!' . mysqli_error($connection));
             }
        }
    }

}

function getCat(){
global $connection;
    $query = "SELECT * FROM categories";
    $cat_admin_query = mysqli_query($connection, $query);    
    
    while($row = mysqli_fetch_assoc($cat_admin_query)){
           
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a> | <a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";
    }
}

function deleteCat(){
global $connection;

    if(isset($_GET['delete'])){
            
            $the_cat_id = $_GET['delete'];
            $query_cat = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
            $delete_query = mysqli_query($connection, $query_cat);
            header("Location: categories.php");
        }
    
    }




?>