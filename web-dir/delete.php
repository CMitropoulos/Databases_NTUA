<html>
<body>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NTUA DB Project</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="css/landing-page.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="css.landing-page.css" />
<?php include('header.html') ?>
</head>
<br> <br> <br><br>
<div align ="center">
<div class='container'>
<?php
	session_start();
	$choice =  $_SESSION['choice'];	
	
	
	// if the user wants to delete a record from table Customers 
	if ($choice == "Customers"){

 	// Show all the records of the database
	echo "Customers: " . "<br>" . "<br>";
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	
	$result = mysqli_query($con,"SELECT * FROM Pelatis" );
	echo "<table class='table table-hover  table-condensed '>
		<tr>
		<th> Customer's Code </th> <th> Name  </th> <th> Surname</th>
		</tr>"; 		
 	//print out all the customer codes
	while($row = mysqli_fetch_array($result)) {
		echo "<tr> <th>" .  $row['Kwdikos_Pelati']."</th> <th> ".$row['Onoma']." </th> <th> ".$row['Epwnumo'] ."</th> </tr> "  ;
	}
	echo "</table>";
	}
	

	if ($choice == "Customers"): ?>
		
		<form action="" method="post">
		Select the ID of the record you want to delete from the database: <input type="text" required="" name="recID"><br>
		<button class="btn btn-danger btn-lg btn-block "   name="DeleteRec"type="submit">Delete!</button>
		</form>
	<?php  endif;



// If the button DeleteRec is pressed the delete the record with the given ID
if (isset($_POST['DeleteRec']) and ($_POST['recID'] != "")){
	$kwdikos = $_POST['recID'];
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	// Delete the record with ID Kwdikos	
	$sqlcommand = "DELETE FROM `Pelatis` WHERE `Kwdikos_Pelati`='$kwdikos'";	
	if (!mysqli_query($con,$sqlcommand)){
		echo("Error description: " . mysqli_error($con));
	}
	else {  
		echo "<br> One record was deleted from table Customers <br> ";		 
		mysqli_close($con);
		}
} 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// if the user wants to delete a record from table Hotels
	if ($choice == "Hotel"){

 	// Show all the records of the database
	echo "Hotels: " . "<br>" . "<br>";
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	
	$result = mysqli_query($con,"SELECT * FROM Ksenodoxeio" );
	echo "<table class='table table-hover  table-condensed '>
		<tr>
		<th> Hotel's Code </th> <th> Name  </th> <th> City</th>
		</tr>"; 		
 	//print out all the customer codes
	while($row = mysqli_fetch_array($result)) {
		echo "<tr> <th>" .  $row['kodikos']."</th> <th> ".$row['Onoma']." </th> <th> ".$row['Poli'] ."</th> </tr> "  ;
	}
	echo "</table>";
	}
	

	if ($choice == "Hotel"): ?>
		
		<form action="" method="post">
		Select the ID of the record you want to delete from the database: <input type="text" required=""  name="recIDH"><br>
		<button class="btn btn-danger btn-lg btn-block "   name="DeleteRecH"type="submit">Delete!</button>
		</form>
	<?php  endif;



// If the button DeleteRec is pressed the delete the record with the given ID
if (isset($_POST['DeleteRecH']) and ($_POST['recIDH'] != "")){
	$kwdikos = $_POST['recIDRH'];
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	// Delete the record with ID Kwdikos	
	$sqlcommand = "DELETE FROM `Ksenodoxeio` WHERE `kodikos`='$kwdikos'";	
	if (!mysqli_query($con,$sqlcommand)){
		echo("Error description: " . mysqli_error($con));
	}
	else {  
		echo "<br> One record was deleted from table Hotel <br> ";		 
		mysqli_close($con);
		}
} 
	
 //////////////////////////////////////////////////////////////////////////////////////////
	// If the user wants to delete a record from table Rooms
	if ($choice == "Rooms"){

 	// Show all the records of the database
	echo "Rooms: " . "<br>" . "<br>";
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");

	$sql = "SELECT `Ksenodoxeio`.`Onoma`,`Domatio`.* FROM Domatio\n" 
		 . "LEFT JOIN `hom_db`.`Ksenodoxeio` ON `Domatio`.`Kwdikos_Ksenodoxeiou` = `Ksenodoxeio`.`kodikos` LIMIT 0, 30 ";
	
	$result = mysqli_query($con,$sql );

	echo "<table  class='table table-hover  table-condensed '>
		<tr>
		<th> Room's Code </th> <th> Room's Number  </th> <th> Hotel's Code</th> <th> Hotel's Name </th>
		</tr>"; 		
 	//print out all the customer codes
	while($row = mysqli_fetch_array($result)) {
		echo "<tr> <th>" .  $row['kwdikos_dwmatiou']."</th> <th> ".$row['Arithmos']." </th> <th> ".$row['Kwdikos_Ksenodoxeiou'] ."</th> <th> " . $row['Onoma'] 
			. "</th> </tr>"  ;
	}
	echo "</table>";
	}
	

	if ($choice == "Rooms"): ?>
		
		<form action="" method="post">
		Select the ID of the record you want to delete from the database: <input type="text" required=""  name="recIDR"><br>
		<button class="btn btn-danger btn-lg btn-block "   name="DeleteRecR"type="submit">Delete!</button>
		</form>
	<?php  endif;



// If the button DeleteRec is pressed the delete the record with the given ID
if (isset($_POST['DeleteRecR']) and ($_POST['recIDR'] != "")){
	$kwdikos = $_POST['recIDR']; 
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	// Delete the record with ID Kwdikos	
	$sqlcommand = "DELETE FROM `Domatio` WHERE `kwdikos_dwmatiou`='$kwdikos'";	
	if (!mysqli_query($con,$sqlcommand)){
		echo("Error description: " . mysqli_error($con));
	}
	else {  
		echo "<br> One record was deleted from table Rooms <br> ";		 
		mysqli_close($con);
		}
} 


//////////////////////////////////////////////////////////////////////////////////////////
	// If the user wants to delete a record from table Rooms
	if ($choice == "Employees"){

 	// Show all the records of the database
	echo "Employees: " . "<br>" . "<br>";
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	
	$result = mysqli_query($con,"SELECT * FROM   `Ypallilos` " );
	echo "<table class='table table-hover  table-condensed '>
		<tr>
		<th> Staff Member's Code </th> <th> Name  </th> <th> Surname</th>
		</tr>"; 		
 	//print out all the customer codes
	while($row = mysqli_fetch_array($result)) {
		echo "<tr> <th>" .  $row['Kwdikos_Ypallilou']."</th> <th> ".$row['Onoma']." </th> <th> ".$row['Epwnumo'] ."</th> </tr> "  ;
	}
	echo "</table>";
	}
	

	if ($choice == "Employees"): ?>
		
		<form action="" method="post">
		Select the ID of the record you want to delete from the database: <input type="text" required="" name="recIDE"><br>
		<button class="btn btn-danger btn-lg btn-block "   name="DeleteRecE"type="submit">Delete!</button>
		</form>
	<?php  endif;



// If the button DeleteRec is pressed the delete the record with the given ID
if (isset($_POST['DeleteRecE']) and ($_POST['recIDE'] != "")){
	$kwdikos = $_POST['recIDE']; 
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	// Delete the record with ID Kwdikos	
	$sqlcommand = "DELETE FROM `Ypallilos` WHERE `Kwdikos_Ypallilou`= '$kwdikos'";	
	if (!mysqli_query($con,$sqlcommand)){
		echo("Error description: " . mysqli_error($con));
	}
	else {  
		echo "<br> One record was deleted from table Employees <br> ";		 
		mysqli_close($con);
		}
} 

//////////////////////////////////////////////////////////////////////////////////////////
	// If the user wants to delete a record from table Reservation
	if ($choice == "Reservation"){

 	// Show all the records of the database
	echo "Reservation: " . "<br>" . "<br>";
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	
$sql = "SELECT `Pelatis`.`Onoma`,`Pelatis`.`Epwnumo`,`Kratisi`.* FROM Pelatis\n"
    . "LEFT JOIN `hom_db`.`Kratisi` ON `Pelatis`.`Kwdikos_Pelati` = `Kratisi`.`Kwdikos_Pelati` LIMIT 0, 30 ";
	

	$result = mysqli_query($con,$sql );
	echo "<table class='table table-hover  table-condensed ' >
		<tr>
		<th> Reservation's Code </th> <th> Customer's Code  </th>  <th> Customer's Name </th> <th> Surname </th>
		</tr>"; 		
 	//print out all the customer codes
	while($row = mysqli_fetch_array($result)) {
		if ($row['Kwdikos'] != Null){
		echo "<tr> <th>" .  $row['Kwdikos']."</th> <th> ".$row['Kwdikos_Pelati']. " </th> <th>" . $row['Onoma'] .  " </th> <th>" . $row['Epwnumo'] . " </th> </tr> " ;
				}
	}
	echo "</table>";
	}
	

	if ($choice == "Reservation"): ?>
		
		<form action="" method="post">
		Select the ID of the record you want to delete from the database: <input type="text" required="" name="recIDRes"><br>
		<button class="btn btn-danger btn-lg btn-block "   name="DeleteRecRes"type="submit">Delete!</button>
		</form>
	<?php  endif;



// If the button DeleteRec is pressed the delete the record with the given ID
if (isset($_POST['DeleteRecRes']) and ($_POST['recIDRes'] != "")){
	$kwdikos = $_POST['recIDRes']; 
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	// Delete the record with ID Kwdikos	
	$sqlcommand = "DELETE FROM `Kratisi` WHERE `Kwdikos`='$kwdikos'";	
	if (!mysqli_query($con,$sqlcommand)){
		echo("Error description: " . mysqli_error($con));
	}
	else {  
		echo "<br> One record was deleted from table Reservation <br> ";		 
		mysqli_close($con);
		}
} 

?>
</div>
</div>
<?php include('footer.html') ?>

</body>
</html>
