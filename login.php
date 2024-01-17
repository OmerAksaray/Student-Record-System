<?php 
if(!isset($_SESSION)){
    session_start();

 }
include_once("connections/connection.php");

 $con=connection();

 if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
   $sql="SELECT* FROM student_users WHERE username= '$username' AND password = '$password'";
   $user=$con->query($sql) or die ($con->error);
   $row=$user->fetch_assoc();
   $total=$user->num_rows;

   if($total>0){      
       $_SESSION['UserLogin']=$row['username'];
       $_SESSION['Access']=$row['access'];
    echo header("Location: index.php");
   }
   else{
    echo "No user found.";
   }

 }


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
    
    
<div class="d-flex justify-content-center align-items-center" style="height:100vh;" >

    
    <form action="" method="post" class="bg-warning p-5">
        <h1 class="text-center p-3">Login Page</h1>
        
        <div class="pb-3 text-left">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="pb-3
        ">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control"></div>
        <div class="text-center pt-3">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
    
    
</body>
</html>