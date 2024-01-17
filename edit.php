<?php 
include_once("connections/connection.php");

$con = connection();
$id = $_GET['ID'];
$sql = "SELECT * FROM student_list WHERE id='$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $birth_day = $_POST['birth_day'];

    $sql = "UPDATE student_list SET first_name='$fname', last_name='$lname', gender='$gender', department='$department', birth_day='$birth_day' WHERE id='$id'";
    $con->query($sql) or die($con->error);
    header("Location: details.php?ID=".$id);
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
  <div class="d-flex justify-content-center align-items-center" style="height:100vh;">
      
  <form action="" method="post" class="shadow-lg p-5 border rounded bg-secondary" onsubmit="return validateForm()">

          <label for="firstname" class="form-label">First Name</label>
          <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>">
          
          <label for="lastname" class="form-label mt-3">Last Name</label>
          <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>">
          <label for="department" class="form-label mt-3">Department</label>
          <input class="form-control" type="text" name="department" id="department" value="<?php echo $row['department'];?>">
          
          <label for="birth_day" class="form-label mt-3">Birthday:</label>
          <input class="form-control" type="date" id="birth_day" name="birth_day" value="<?php echo $row['birth_day'];?>">
          <label for="gender" class="form-label mt-3">Gender</label>
          <select class="form-control" name="gender" id="gender" >
              <option value="Male"<?php echo($row['gender'] == "Male")? 'selected' : '';?>>Male</option>
              <option value="Female" <?php echo($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
            </select>
           <div class="text-center mt-3">
           <input type="submit" name="submit" value="Update" class="btn btn-warning">
           </div>
        </form>
    </div>
    <script>
function validateForm() {
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var department = document.getElementById("department").value;
    var birth_day = document.getElementById("birth_day").value;
    var gender = document.getElementById("gender").value;

    if (firstname === "") {
        alert("Please enter the name");
        return false;
    }
    if (lastname === "") {
        alert("Please enter the lastname");
        return false;
    }
    if (department === "") {
        alert("Please enter the department");
        return false;
    }
    if (birth_day === "") {
        alert("Please enter the birthday");
        return false;
    }
    if (gender === "") {
        alert("Please enter the gender");
        return false;
    }

    return true;
}
</script>

    </body>
    </html>