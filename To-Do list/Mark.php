<?php
include "config.php";
$id=$_GET['id'];
$status=($_GET['status'])?0:1;
$sql=$con->query("Update todo set status=$status where id=$id");
if ($status){
    $mark="mark";
}
else{
    $mark="unmark";
    $sql=$con->query("Update todo set updated=CURRENT_TIMESTAMP where id=$id");
}
header("Location: index.php?mark=$mark");
?>