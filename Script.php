<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:kilak.database.windows.net,1433; Database = UniversityDB", "kilak", "Hanu@7248321326");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	print("Connection is there \n");
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}


Print("Taking Values \n");

$id=$_POST["id"];
$roll=$_POST["roll"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$gpa=$_POST["gpa"];
$major=$_POST["major"];


$data = [
    'id1' => $id,
	'roll1' => $roll,
    'fname1' => $fname,
    'lname1' => $lname,
	'gpa1' => $gpa,
	'major1' => $major,
	
];
$sql = "INSERT INTO TopStudents (Id,RolLNo,FirstName,LastName,AvgGPA,Major) VALUES (:id1, :roll1, :fname1, :lname1,:gpa1,:major1)";


$stmt= $conn->prepare($sql);
$stmt->execute($data);
Print("Ending program");
    header("Location:login.html");

$conn.close();
?>
