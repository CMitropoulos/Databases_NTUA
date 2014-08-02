<?php
// Create connection
$con=mysqli_connect("localhost","root","xatzdb","hom_db");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
  echo " you are connected to the database <br>"  ;
}

$sqlpel = "SELECT * FROM `Pelatis` LIMIT 0, 30 ";

$result = mysqli_query($con,"SELECT * FROM Pelatis" );
//$result = mysqli_query($con,$sqlpel );


while($row = mysqli_fetch_array($result)) {
  echo $row['Onoma'] . " " . $row['Epwnumo']  .  " " . $row['AT'];
  echo "<br>";
}

mysqli_close($con);

?>



<?php
$con=mysqli_connect("localhost","root","xatzdb","hom_db");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_close($con);
?>

