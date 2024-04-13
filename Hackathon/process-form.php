<?php
$Email = $_POST["txtEmail"];

$Title = $_POST["txtTitle"];

$Body = $_POST["txtBody"];

$MountainBiking = filter_input(INPUT_POST, "chkMountainBiking", FILTER_VALIDATE_BOOL);

$Skiing =filter_input(INPUT_POST, "chkSkiing", FILTER_VALIDATE_BOOL);

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
VALUES('$Email', '$Title', '$Body', $MountainBiking, $Satisfied)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>


