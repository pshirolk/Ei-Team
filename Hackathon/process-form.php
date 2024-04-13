<?php
$Email = $_POST["txtEmail"];

$Title = $_POST["txtTitle"];

$Body = $_POST["txtBody"];

$Topic = $_POST["radTopic"];

$Satisfied = $_POST["radSatisfied"];

$databasename = 'MHAYES17_labs';
$host = 'webdb.uvm.edu'; 
$username = 'mhayes17_writer';
$password = 'ki2BLWHHczKb';

$conn = mysqli_connect($host, $username, $password, $databasename);

if (mysqli_connect_errno()){
    die("Connection Error: " . mysqli_connect_error());
}


$sql = "INSERT INTO tblForumPost (fldEmail, fldTitle, fldBody, fldTopic, fldRating)
VALUES('$Email', '$Title', '$Body', $Topic, $Satisfied)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>


