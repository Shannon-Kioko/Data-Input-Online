<?php include('components/header.inc.php');?>
<nav class="navbar navbar-light sticky-top" style="background-color: #e3f2fd;">
  <span class="navbar-brand">
    Student Registration
  </span>
</nav>
<div class="form-container">
<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="row">    
<div class="form-group col-sm-4">
        <label for="regno" class="col-form-label">Registeration Number</label>
        <div>
            <input type="text" class="form-control" id="regno" name="regno" placeholder="Enter Registration number">
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label for="course" class="col-form-label">Course</label>
        <div>
            <input type="text" class="form-control" id="course" name="course" placeholder="Course">
        </div>
    </div>
    </div>
    <div class="form-row"> 
    <div class="form-group col-sm-4">
        <label for="fname" class="col-form-label">First Name</label>
        <div>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
        </div>
    </div>

    <div class="form-group col-sm-4">
        <label for="mname" class="col-form-label">Middle Name</label>
        <div>
            <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
        </div>
    </div>

    <div class="form-group col-sm-4">
        <label for="sname" class="col-form-label">Surname</label>
        <div>
            <input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
        <label for="age" class="  col-form-label">Age</label>
        <div>
            <input type="text" class="form-control" id="age" name="age" placeholder="Age">
        </div>
    </div>

    <div class="form-group col-sm-4"">
        <label for="guardian" class="col-form-label">Guardian</label>
        <div>
            <input type="text" class="form-control" id="guardian" name="guardian" placeholder="Guardian">
        </div>
    </div>

    <div class="form-group col-sm-4"">
        <label for="tel" class=" col-form-label">Telephone Number</label>
        <div>
            <input type="text" class="form-control" id="tel" name="tel" placeholder="07...">
        </div>
    </div>
</div>
<div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <input type="submit" value="Sign in" name="submit" class="btn btn-primary"/>
        </div>
    </div>
</form>
</div>
    <a href="viewer.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Display Results</button></a>
<?php
$conn = mysqli_connect("localhost", "root", "kca");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $regno = $_POST['regno'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $sname = $_POST['sname'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $guardian = $_POST['guardian'];
    $telno = $_POST['tel'];

    $query = "INSERT INTO students (regno, fname, sname, mname, age, course, guardian, tel) VALUES ('$regno', '$fname', '$sname', '$mname', '$age', '$course', '$guardian', '$telno')";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . $query . "<br>" . mysqli_error($conn));
    }

    // Redirect after processing the form
    header('location: index.php');
}

mysqli_close($conn);
?>

</body>
</html>
