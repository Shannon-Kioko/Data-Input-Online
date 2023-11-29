<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
include('components/header.inc.php');
?>

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Input student details</a>
</nav>

<?php
$conn = mysqli_connect("localhost", "root", "Shannon248001###", "kca");
if (!$conn) {
    echo "<p class='text-center text-red m-0'>Connection failed.</p>";
} else {
    echo "<p class='text-center text-green m-0'>Connection successful.</p>";
}
mysqli_select_db($conn,'kca');
// if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $selector = "SELECT * FROM students";
    $result = mysqli_query($conn, $selector);

    if ($result) {
        echo "<p class='text-center text-green m-0'>Data retrieved successfully</p>";
        
    } else {
        echo "<p class='text-center text-red m-0'>Error: " . mysqli_error($connection) . "</p>";
    }

// }
?>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Reg No.</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Age</th>
      <th scope="col">Phone</th>
      <th scope="col">Course</th>
      <th scope="col">Guardian</th>


    </tr>
  </thead>

  <tbody>
<?php

if($result){
    while($row = mysqli_fetch_array($result)){
        echo "<tr>
        <th scope = 'row>{$row['regno']}</th>
        <td>{$row['fname']}</td>
        <td>{$row['mname']}</td>
        <td>{$row['sname']}</td>
        <td>{$row['age']}</td>
        <td>{$row['tel']}</td>
        <td>{$row['course']}</td>
        <td>{$row['guardian']}</td>
        </tr>";
    }
}
?>
</tbody>
</table>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>
<?php
mysqli_close($conn)
?>
</body>
</html>