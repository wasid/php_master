<?php

function confirmQ($result){
global $connection;
    
    if(!$result){
      die("Query failed. " . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }
}


?>