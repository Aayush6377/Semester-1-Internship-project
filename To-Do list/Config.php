<?php
$con=new Mysqli("localhost","root","","todo_list");

if ($con->connect_error){
    die("Can't connect to database.");
}
?>