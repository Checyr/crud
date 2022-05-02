<?php
require("db/connection.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="modal fade" tabindex="-1" role="dialog" id="modaledit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="name">
                <input type="email" name="email">
                <input type="date" name="date">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="<?

                ?>">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <?php

    if (isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['data'])){

        //in connection.php theres a function called CleaningInput that clear the input
        $name = CleaningInput($_POST['name']);
        $email= CleaningInput($_POST['email']);
        #TODO: PROBLEM WITH THE DATE OF BRAZIl
        $date=date('d-m-Y');

        if (isset($_POST["name"]) && isset($_POST["email"])&& isset($_POST["date"])){
            if((empty($name) || empty($email)) || empty($data)){
                echo "<p style='color: red'>Type correctly the input</p>" . PHP_EOL;
            }else{
                $sql = $pdo->prepare("INSERT INTO clients VALUES (default,?,?,?)");
                $sql->execute(array($name,$email,$date));
                echo "<p style='color: green'>Submited</p>" . PHP_EOL;
            }
        }
    }
    ?>
    <div class="container">
        <form action="" method="post">
            <input type="text" name="name">
            <input type="email" name="email">
            <input type="date" name="data">
            <button type="submit" name="send">Send</button>
        </form>
    </div>

    <table class="table table-hover">
        <div class="table">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>

        </div>
    <?php
    $sql = $pdo->prepare("SELECT * FROM clients");
    $sql->execute();
    $datainfo = $sql->fetchAll();
    if(count($datainfo) > 0){
        foreach ($datainfo as $key => $value) {
            echo"<tr>
                <td>".$value['id']."</td> 
                <td>".$value['first_name']."</td>
                <td>".$value['email']."</td>
                <td>".$value['datinha']."</td>
                <td><button href='editdata.php' id='edit' class='btn btn-success editbtn' data-toggle='modal' >edit</button> <button href='deletedata.php' class='btn btn-danger'>delete</button></td>
             </tr>";
        }
        echo "</table>";
    }else{
        echo "<p style='color: red'>The Database is empty</p>". \n;
    }
    ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $(document).ready({
                $(.editbtn).on('click', function () {
                    $('#modaledit').modal('show');
                    var id = $(this).attr('data-id');
                    var name = $(this).attr('data-name');
                    var email = $(this).attr('data-email');
                    var date = $(this).attr('data-date');
                    alert("a");
                })
            })

        </script>
</body>
</html>

