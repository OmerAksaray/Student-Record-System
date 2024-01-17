<?php 
if(!isset($_SESSION)){
    session_start();

 }
 if(isset($_SESSION['UserLogin'])){
    echo "Welcome ".$_SESSION['UserLogin'];

 }
 else{
    echo "Welcome Guest";
 }
include_once("connections/connection.php");

 $con=connection();

$sql= "SELECT * FROM student_list ORDER BY id DESC";
$students= $con->query($sql) or die ($con-error);
$row=$students->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            font-weight: 300;
            color: #333;
            margin-bottom: 30px;
        }
        .table {
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            border-top: 1px solid #ddd;
        }
        th {
            background-color: #f0f0f0;
        }
        .btn {
            border-radius: 5px;
        }
        .welcome-message {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Student Management System</h1>
        </div>

        <div class="welcome-message text-center">
            <?php
                if (isset($_SESSION['UserLogin'])) {
                    echo "Welcome " . $_SESSION['UserLogin'];
                } else {
                    echo "Welcome Guest";
                }
            ?>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <?php if (isset($_SESSION['UserLogin'])) { ?>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            <?php } else { ?>
                <a href="login.php" class="btn btn-warning">Login</a>
            <?php } ?>
            <a href="add.php" class="btn btn-success">Add New</a>
        </div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><a class="btn btn-primary" href="details.php?ID=<?php echo $row['id']; ?>">View</a></td>
                    </tr>
                <?php } while ($row = $students->fetch_assoc()); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
