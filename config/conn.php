<?php
    $conn = mysqli_connect('localhost', 'root', '', 'todo_test');
    
    if(mysqli_connect_errno()) {
        echo mysqli_connect_errno();
    }    
?>