<?php
include "Config.php";
$sql=$con->query('Select id,task,status from todo order by updated desc,task');
$rows=$sql->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>To Do Application</title>
</head>
<body>
    <main>
        <center>
            <?php 
            include "Message.php";
            ?>
        </center>
        <div class='container pt-5'>
            <div class="row">
                <div class="col-sm-12 col-md-3"></div>
                <div class="col-sm-12 col-md-6">
                    <div class='card'>
                        <div class="card-header">
                            <p>Todo List</p>
                        </div>
                        <div class="card-body">
                            <form action="Task.php" method="post">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="item" placeholder="Add a Todo item" title="Add a item" required>
                                </div>
                                <input type="submit" class="btn btn-dark" name="add" value="Add item">
                            </form>
                            <div class="mt-5 mb-5">
                                <?php if ($rows==0){ ?>
                                <center>
                                    <img src="Folder.png" width="50px" alt="Empty list"><br>
                                    <span>Your list is empty</span>
                                </center>
                                <?php } else{
                                    $result=$sql->fetch_all(MYSQLI_ASSOC);
                                    for ($i=0; $i<$rows; $i++){
                                ?>
                                <div class="row mt-2">
                                    <div class="col-sm-12 col-md-1"><h5><?php echo ">";?></h5></div>
                                    <div class="col-sm-12 col-md-6 <?php echo ($result[$i]['status'])?"text-decoration-line-through":""; ?>"><h5><?php echo $result[$i]['task']; ?></h5></div>
                                    <div class="col-sm-12 col-md-5">
                                        <?php
                                        $mark_message="Mark as read";
                                        $type="primary";
                                        if ($result[$i]['status']){
                                            $mark_message="&nbsp &nbsp Unmark &nbsp &nbsp";
                                            $type="warning";
                                        }
                                        echo "<a href='Mark.php?id=".$result[$i]['id']."&status=".$result[$i]['status']."' class='btn btn-outline-$type'>$mark_message</a>  ";
                                        echo "<a href='Delete.php?id=".$result[$i]['id']."' class='btn btn-outline-danger'>Delete</a>";
                                        ?>
                                    </div>
                                </div>
                                <?php }}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>