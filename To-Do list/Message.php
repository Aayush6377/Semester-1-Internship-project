<?php
$refresh=0; 
if (isset($_GET['insert'])){
    if ($_GET['insert']==1){ 
        echo "<div class='alert alert-success'> Item Added Successfully!</div>";
    }
    elseif ($_GET['insert']==0){
        echo "<div class='alert alert-info'> Item Already Exist!</div>";
    }
    $refresh=1;
}

elseif (isset($_GET['mark'])){
    if ($_GET['mark']=='mark'){ 
        echo "<div class='alert alert-primary'> Item Marked as done!</div>";
    }
    elseif ($_GET['mark']=='unmark'){
        echo "<div class='alert alert-warning'> Item Unmarked!</div>";
    }
    $refresh=1;
}

elseif (isset($_GET['delete'])){
    if ($_GET['delete']==1){ 
        echo "<div class='alert alert-danger'> Item Deleted Successfully!</div>";
    }
    $refresh=1;
}

else{
    echo "<div class='alert alert'>&nbsp</div>";
}

if ($refresh){
    $refresh=0;
    header("Refresh: 2.5;url=index.php");
}
?>