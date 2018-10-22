<?php
	
try
 {
    $conn = new PDO("sqlsrv:server = tcp:kilak.database.windows.net,1433; Database = UniversityDB", "Kilak", "Hanu@7248321326");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$roll=$_POST["roll"];
$sql="Select * from TopStudents where RollNo=$roll";



try
 {
   $rows=$conn->query($sql);
 } 
catch(PDOException $r)
 { 
	print("$r");
 }



foreach ($rows as  $row)
{
   if ($row!=NUll)
   {
	$FName = $row['FirstName'];
	$LName = $row['LastName']
	$GPA  = $row['GPA'];
	$M= $row['Major'];
   }
   else
	{
	print("NO RECORD FOUND !!");	
	}
}
print("FirstName :- '$FName' <br>LastName:- '$LName'<br> GPA :- '$GPA' <BR> Major Project :- '$M'");

$conn.close();
?>
