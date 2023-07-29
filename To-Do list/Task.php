<?php 
include "Config.php";

$task=$_POST['item'];
$check=$con->query("Select * from todo where task like '$task'");
if ($check->num_rows>0){
    $con->query("Update todo set updated=CURRENT_TIMESTAMP where task='$task'");
    $insert=0;
}
else{
    $sql=$con->prepare("Insert into todo (task,status) values ('$task',0)");
    $sql->execute();
    $insert=1;
}
header("Location: index.php?insert=$insert");
?>