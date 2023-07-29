<?php
include "config.php";
$id=$_GET['id'];
$con->query("Delete from todo where id=$id");
header("Location: index.php?delete=1");
?>