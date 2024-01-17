<?php 
if(!isset($_SESSION)){
    session_start();

 }
 if(isset($_SESSION['Access']) && $_SESSION['Access'] == "admin"){
    echo "Welcome ".$_SESSION['UserLogin']."<br>";

 }
 else{
    echo header("Location:login.php");
 }
 
include_once("connections/connection.php");

 $con=connection();
$id= $_GET['ID'];
$sql= "SELECT * FROM student_list WHERE id='$id'";
$students= $con->query($sql) or die ($con-error);
$row=$students->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form action="delete.php" method="post">
    <a href="index.php" class="btn btn-info mx-2"><-Back</a>
<a class="btn btn-warning me-2" href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>
<?php if($_SESSION['Access']=="admin"){?>
    <button type="submit" name="delete" class="btn btn-danger ">Delete</button>
<?php
}?>
    <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
</form>


<table class="table table-bordered ">
    <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col" >Name and Surname</th>
      <th scope="col">Gender</th>
      <th scope="col">Birth Day</th>
      <th scope="col">Department</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <th scope="row"><?php echo $row['gender'];?></th>
      <td><p><?php echo $row['first_name'];?> <?php echo $row ['last_name']; ?></p></td>
      <td><p><?php echo $row['gender'];?> </p></td>
      <td><p> <?php echo $row['birth_day'];?></p></td>
      <td><p><?php echo $row['department'];?></p></td>
    </tr>
    </tbody>
</table>
</body>
</html>