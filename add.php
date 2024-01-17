<?php 
session_start();
include_once("connections/connection.php");

 $con=connection();

// if(isset($_POST['submit'])){
//     $fname= $_POST['firstname'];
//     $lname= $_POST['lastname'];
//     $gender= $_POST['gender'];
//    $sql="INSERT INTO `student_list`(`first_name`,`last_name`,  `gender`) VALUES ('$fname','$lname','$gender')";
//    $con->query($sql) or die($con->error);
// }
// if(isset($_POST['submit'])){
    

//     $fname= $_POST['firstname'];
//     $lname= $_POST['lastname'];
//     $gender= $_POST['gender'];
//    $sql="INSERT INTO `student_list`(`first_name`,`last_name`,  `gender`) VALUES ('$fname','$lname','$gender')";
//    $con->query($sql) or die($con->error);
// }
if(isset($_POST['submit'])){
    
    $bday= $_POST['birth_day'];
    $department=$_POST['department'];
    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];
    $gender= $_POST['gender'];
   $sql="INSERT INTO `student_list`(`first_name`,`last_name`,  `gender`, `birth_day`, `department`) VALUES ('$fname','$lname','$gender','$bday', '$department')";
   $con->query($sql) or die($con->error);
   header("Location:index.php");
}

if(!isset($_SESSION['Access']) || $_SESSION['Access'] != "admin"){
    header("Location:login.php");
    exit();
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
  <div class="d-flex justify-content-center align-items-center " style="height:100vh;">

      <form action="" method="post" class="bg-primary p-5 rounded border shadow-lg">
        <h3>Add New Student</h3>
          <label for="firstname" class="form-label">>First Name</label>
          <input type="text" name="firstname" id="firstname" class="form-control">
          
          <label for="lastname" class="form-label">>Last Name</label>
          <input type="text" name="lastname" id="lastname"  class="form-control">
          
          <label for="department" class="form-label">>Department</label>
          <input type="text" name="department" id="department" class="form-control">
          
          <label for="birth_day" class="form-label">>Birthday:</label>
          <input type="date" id="birth_day" name="birth_day" class="form-control">
          
          <label for="genedr" class="form-label">>Gender</label>
          <select name="gender" id="gender" class="form-control">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <div class="text-center">
            <input type="submit" name="submit" value="Submit Form" class="btn btn-success mt-3">

            </div>
        </form>
    </div>
    <script>
  const form = document.querySelector('form');

  form.addEventListener('submit', (event) => {
    const requiredFields = ['firstname', 'lastname', 'department', 'birth_day', 'gender'];
    let isEmptyField = false;

    requiredFields.forEach((field) => {
      const input = document.getElementById(field);

      if (input.value.trim() === '') {
        isEmptyField = true;
        alert(`Please fill in the ${field} field.`);
        input.focus(); 
        return false; 
      }
    });

    if (isEmptyField) {
      event.preventDefault(); 
    }
  });
</script>

</body>
</html>
