<html>
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
</head>



<body>
<div align='center'>
<div class='container'>
<?php include('header.html'); ?>
<br> <br>
 <?php
	session_start();
	$choice =  $_SESSION['choice'];
	 
if ($choice == "Customers"): ?>
<br><br>
<h1> Insert New Record to Table Customers </h1>

<form action="" method="post">
Passport Number:      <input type="text" name="AT"   value="<?php echo $AT; ?>"><br>
Name:   <input type="text" name="Onoma" value="<?php echo $Onoma; ?>"><br>
Surname: <input type="text" name="Epwnumo" value="<?php echo $Epwnumo; ?>"><br>
Street:    <input type="text" name="Odos"  value="<?php echo $Odos; ?>"><br>
Number: <input type="text" name="Arithmos" value="<?php echo $Arithmos; ?>" ><br>
Postal Code:      <input type="text" name="TK"  value="<?php echo $TK; ?>"><br>
City:    <input type="text" name="Poli"   value="<?php echo $Poli; ?>"><br>
Credit Card Number: <input type="text" name="Ar_Pist_kar"  value="<?php echo $Pist_karta; ?>"><br>

<button class="btn btn-danger btn-lg btn-block " value="InsertC" name="InsertC" type= "submit">Insert!</button>
</form>

<?php   endif; ?>


<?php
// O xristis evales stoixeia gia neo pelati
if (isset($_POST['InsertC'])){

 	$AT =  $_POST['AT'];
 	$Onoma = $_POST['Onoma'];
 	$Epwnumo = $_POST['Epwnumo'];
 	$Odos = $_POST['Odos'];
 	$Arithmos = $_POST['Arithmos'];
 	$TK = $_POST['TK'];
 	$Poli = $_POST['Poli'];
 	$Pist_karta = $_POST['Ar_Pist_kar'];

	
	//Establish connection to the database & add the new record
	
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sqlcommand = " INSERT INTO  Pelatis  VALUES ('','$AT','$Onoma','$Epwnumo','$Odos','$Arithmos','$TK','$Poli','$Pist_karta')";
	
	if (!mysqli_query($con,$sqlcommand)){

	    echo("Error description: " . mysqli_error($con));

	}
	else {  
		echo "<br> The following record was added to table Customers <br> ";		 
		$result = mysqli_query($con,"SELECT * FROM Pelatis WHERE `Arithmos_Pistwtikis_Kartas` ='$Pist_karta'" );
	echo "AT  Onoma Epwnumo  Odos  Arithmos TK Poli      " . "<br>";
	while($row = mysqli_fetch_array($result)) {
  		echo $row['AT']  .  " " . $row['Onoma'] . "  " . $row['Epwnumo'] . "  " . $row['Odos'] . " " . $row['Arithmos'] . " ";
		echo $row['TK'] . "  " . $row['Poli'] . "  " . $row['Arithmos_Pistwtikis_Kartas'];
  		echo "<br>";
						}
	mysqli_close($con);
		}
}

?>
<?php if ($choice == "Rooms"):?>

<h1> Insert New Record to Table Rooms </h1>

<form action="" method="post">
Room Number:      <input type="text" name="Room_Number" ><br>
Hotel Name: <select name="Hotel_Code">
	<option value="novalue">--</option>
	<?php
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sql = "SELECT `Ksenodoxeio`.`Onoma`,`Ksenodoxeio`.`kodikos` FROM Ksenodoxeio LIMIT 0, 30 ";
	$result = mysqli_query($con,$sql );
		while($row = mysqli_fetch_array($result)): ?>
	 		<option   value="<?php echo $row['kodikos'];?>" > <?php echo  $row['Onoma']; ?>  </option>  
		<?php endwhile; 	
	mysqli_close($con); ?>
	</select> <br>
Room Type: <input type="text" name="Room_Type"><br>
Price:    <input type="text" name="Price"    > <br>

<button class="btn btn-danger btn-lg btn-block " value="Insert Room" name="Insert_Room" type= "submit">Insert!</button>
</form>

<?php   endif; ?>


<?php
// The user chose to insert new room

if (isset($_POST['Insert_Room'])){
	// Pass the the variables the data from the rooms form
 	$Room_Number =  $_POST['Room_Number']; $Hotel_Code = $_POST['Hotel_Code']; $Room_Type = $_POST['Room_Type']; $Price = $_POST['Price'];
	//Establish connection to the database & add the new record
	
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sqlcommand = " INSERT INTO  `Domatio`  VALUES ('','$Room_Number','$Hotel_Code','$Room_Type','$Price')";
	
	if (!mysqli_query($con,$sqlcommand)){

	    echo("Error description: " . mysqli_error($con));

	}
	else {  
		echo "<br> The following record was added to table Rooms: <br> <br> ";		 
	mysqli_close($con);
		echo "<table  table-hover  table-condensed>
		<tr>
		<th>Room Number</th> <th>Hotel Code</th> <th>Room Type</th> <th>Price </th>
		</tr>";
		echo "<tr>";
			echo "<td>" . $Room_Number . "</td>";
			echo "<td>" . $Hotel_Code . "</td>";
			echo "<td>" . $Room_Type . "</td>";
			echo "<td>" . $Price . "</td>";
		echo "</tr>";
		echo "</table>";
         }

}

?>
<?php
	if ($choice == "Reservation"): ?>

<h1> Insert New Record to Table Reservation </h1>

<form action="" method="post">
Reservation Date      <input type="date" name="DateR" ><br>
Date of Arrival:   <input type="date" name="DateA" ><br>
Date of Depart: <input type="date" name="DateD"><br>
Payment: <select name="Payment"> <option value="novalue"> -- </option> <option value="Cash"> Cash</option> <option value="Credit Card"> Credit Card</option>
<option value="Paypal"> Paypal </option>  </select><br>
Hotel Name: <select name="Hotel_Code" >
	<option value="novalue">--</option>
	<?php
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sql = "SELECT `Ksenodoxeio`.`Onoma`,`Ksenodoxeio`.`kodikos` FROM Ksenodoxeio LIMIT 0, 30 ";
	$result = mysqli_query($con,$sql );
		while($row = mysqli_fetch_array($result)): ?>
	 		<option   value="<?php echo $row['kodikos'];?>" > <?php echo  $row['Onoma']; ?>  </option>  
		<?php endwhile; 	
	mysqli_close($con); ?>
	</select> </br>
Room's Code: <select name="Room_Code"> 
	<option value="novalue">--</option>
	<?php
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sql = "SELECT `kwdikos_dwmatiou` FROM `Domatio` WHERE 1 LIMIT 0, 30 ";
	$result = mysqli_query($con,$sql );
		while($row = mysqli_fetch_array($result)): ?>
	 		<option   value="<?php echo $row['kwdikos_dwmatiou'];?>" > <?php echo  $row['kwdikos_dwmatiou']; ?>  </option>  
		<?php endwhile; 	
	mysqli_close($con); ?>
	</select></br>
Customer's Code: <select name="Customer_Code"> 
	<option value="novalue">--</option>
	<?php
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sql = "SELECT `Kwdikos_Pelati`, `Onoma` FROM `Pelatis` WHERE 1 LIMIT 0, 30 ";
	$result = mysqli_query($con,$sql );
		while($row = mysqli_fetch_array($result)): ?>
	 		<option   value="<?php echo $row['Kwdikos_Pelati'];?>" > <?php echo  $row['Onoma']; ?>  </option>  
		<?php endwhile; 	
	mysqli_close($con); ?>
	</select></br>

 <button class="btn btn-danger btn-lg btn-block "  value="Insert Reservation" name="Insert_Reservation" type= "submit">Insert!</button>
</form>

  <table class='table table-hover  table-condensed'  >
		<tr>
		<th>Hotel Name</th> <th> City </th> <th>Hotel ID</th> <th>Room Name</th> <th>Room ID</th>
		</tr>	
<?php	$mysqlcommand = "SELECT  `Ksenodoxeio`.`Onoma` ,`Ksenodoxeio`.`Poli`,  `Ksenodoxeio`.`kodikos` ,`Domatio`.`Arithmos`, `Domatio`.`kwdikos_dwmatiou`
                     FROM Ksenodoxeio
                     LEFT JOIN  `hom_db`.`Domatio` ON  `Ksenodoxeio`.`kodikos` =  `Domatio`.`Kwdikos_Ksenodoxeiou` 
                     LIMIT 0 , 30 "; 
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	
	if (!$result=mysqli_query($con,$mysqlcommand)){
		echo("Error description: " . mysqli_error($con));
	}
	else {
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Onoma'] . "</td>";	
			echo "<td>" . $row['Poli'] . "</td>";
			echo "<td>" . $row['kodikos'] . "</td>";
			echo "<td>" . $row['Arithmos']  . "</td>";
			echo "<td>" . $row['kwdikos_dwmatiou']  . "</td>";
			echo "</tr>";
		  }
		echo "</table>";
 
}
   endif; ?>


<?php
// The user chose to insert a new Reservation

if (isset($_POST['Insert_Reservation'])){
	// Pass the the variables the data from the rooms form
 	$DateR =  $_POST['DateR']; $DateA = $_POST['DateA']; $DateD= $_POST['DateD']; $Payment = $_POST['Payment']; $Hotel_Code = $_POST['Hotel_Code'];
	$Room_Code = $_POST['Room_Code']; $Customer_Code = $_POST['Customer_Code']; 
	//Establish connection to the database & add the new record
	
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sqlcommand = " INSERT INTO  `Kratisi`  VALUES ('','$DateR','$DateA','$DateD','$Payment','$Customer_Code','$Hotel_Code','$Room_Code')";
	
	if (!mysqli_query($con,$sqlcommand)){

	    echo("Error description: " . mysqli_error($con));

	}
	else {  
		echo "<br> The following record was added to table Reservation: <br> <br> ";		 
	mysqli_close($con);
		echo "<table border='1'>
		<tr>
		<th>Reservation Date</th> <th>Date of Arrival</th> <th>Date of Depart</th> <th>Payment </th> <th>Hotel Code </th> <th>Room Code</th>
		<th>Customer's Code</th> 
		</tr>";
		echo "<tr>";
			echo "<td>" . $DateR . "</td>";
			echo "<td>" . $DateA . "</td>";
			echo "<td>" . $DateD . "</td>";
			echo "<td>" . $Payment . "</td>";
			echo "<td>" . $Hotel_Code . "</td>";
			echo "<td>" . $Room_Code . "</td>";
			echo "<td>" . $Customer_Code . "</td>";
		echo "</tr>";
		echo "</table>";
         }

}

?>
<?php
	if ($choice == "Hotel"): ?>

<h1> Insert New Record to Table Hotel </h1>

<form action="" method="post">
Hotel Name:      <input type="text" name="HotelN" ><br>
Street:   <input type="text" name="Street" ><br>
Number: <input type="text" name="SNumber"><br>
ZipCode: <input type="text" name="ZP" > <br>
City: <input type="text" name="City" > <br>
Telephone: <input type="text" name="Tel" > <br>
Services: <input type="text" name="Services" > <br>
Stars: <input type="text" name="Stars" > <br>
Year of Construction: <input type="text" name="CYear" > <br>
Renovation Year: <input type="text" name="RYear" > <br>

 <button class="btn btn-danger btn-lg btn-block " value="Insert Hotel" name="Insert_Hotel" type= "submit">Insert!</button>
</form>

<?php   endif; ?>


<?php
// The user chose to insert a new Reservation

if (isset($_POST['Insert_Hotel'])){
	// Pass the the variables the data from the rooms form
 	$HotelN =  $_POST['HotelN']; $Street = $_POST['Street']; $SNumber = $_POST['SNumber'];  $ZP= $_POST['ZP']; $City= $_POST['City']; $Tel= $_POST['Tel'];
	$Services= $_POST['Services']; $Stars= $_POST['Stars']; $CYear = $_POST['CYear']; $RYear = $_POST['RYear'];
	//Establish connection to the database & add the new record
	
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sqlcommand = " INSERT INTO  `Ksenodoxeio`  VALUES ('','$HotelN','$Street','$SNumber','$ZP','$City','$Tel','$Services','$Stars','$CYear','$RYear')";
	
	if (!mysqli_query($con,$sqlcommand)){

	    echo("Error description: " . mysqli_error($con));

	}
	else {  
		echo "<br> The following record was added to table Hotel: <br> <br> ";		 
	mysqli_close($con);
		echo "<table border='1'>
		<tr>
		<th>Hotel Name</th> <th>Street</th> <th>Number</th> <th>Postal Code</th> <th>City </th> <th>Telephone</th>
		<th>Services</th> <th>Stars </th> <th>Year of Construction </th> <th> Renovation Year </th> 
		</tr>";
		echo "<tr>";
			echo "<td>" . $HotelN . "</td>";
			echo "<td>" . $Street . "</td>";
			echo "<td>" . $SNumber . "</td>";
			echo "<td>" . $ZP . "</td>";
			echo "<td>" . $City . "</td>";
			echo "<td>" . $Tel . "</td>";
			echo "<td>" . $Services . "</td>";
			echo "<td>" . $Stars . "</td>";
			echo "<td>" . $CYear . "</td>";
			echo "<td>" . $RYear . "</td>";
		echo "</tr>";
		echo "</table>";
         }

}

?>
<?php
	if ($choice == "Employees"): ?>

<h1> Insert New Record to Table Employees </h1>

<form action="" method="post">
AFM:      <input type="text" name="AFM" ><br>
Name:   <input type="text" name="Name" ><br>
Surname: <input type="text" name="SName"><br>
Street: <input type="text" name="Street" > <br>
Number: <input type="text" name="SNumber"> <br>
ZipCode: <input type="text" name="ZP" > <br>
City: <input type="text" name="City" > <br>
Hotel Name: <select name="Hotel_Code">
	<option value="novalue">--</option>
	<?php
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sql = "SELECT `Ksenodoxeio`.`Onoma`,`Ksenodoxeio`.`kodikos` FROM Ksenodoxeio LIMIT 0, 30 ";
	$result = mysqli_query($con,$sql );
		while($row = mysqli_fetch_array($result)): ?>
	 		<option   value="<?php echo $row['kodikos'];?>" > <?php echo  $row['Onoma']; ?>  </option>  
		<?php endwhile; 	
	mysqli_close($con); ?>
	</select> <br>
Start  Date: <input type="date" name="SDate" > <br>
Due Date <input type="date" name="DDate" > <br>
Salary: <input type="text" name="Salary" > <br>
Role: <input type="text" name="Role" > <br>


 <button class="btn btn-danger btn-lg btn-block " value="Insert Employee" name="Insert_Employee" type= "submit">Insert!</button>
</form>

<?php   endif; ?>


<?php
// The user chose to insert a new Employee

if (isset($_POST['Insert_Employee'])){
	// Pass the the variables the data from the rooms form
 	$AFM =  $_POST['AFM']; $Name = $_POST['Name']; $SName = $_POST['SName']; $Street = $_POST['Street']; $SNumber = $_POST['SNumber'];  $ZP= $_POST['ZP']; 
	$City= $_POST['City'];  $HotelC= $_POST['HotelC']; $SDate= $_POST['SDate']; $DDate= $_POST['DDate']; $Salary= $_POST['Salary']; $Role = $_POST['Role'];
	//Establish connection to the database & add the new record
	
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
	$sqlcommand = " INSERT INTO  `Ypallilos`  VALUES ('','$AFM','$Name','$SName','$Street','$SNumber','$ZP','$City','$HotelC','$SDate','$DDate','$Salary','$Role')";
	
	if (!mysqli_query($con,$sqlcommand)){

	    echo("Error description: " . mysqli_error($con));

	}
	else {  
		echo "<br> The following record was added to table Employee: <br> <br> ";		 
	mysqli_close($con);
		echo "<table border='1'>
		<tr>
		<th>AFM</th> <th>Name</th> <th>Surname</th> <th>Street</th>  <th> Number</th><th>Postal Code</th> <th>City </th> <th>Hotel Code</th>
		<th>Start Date</th> <th>Due Date </th> <th>Salary </th> <th> Role </th> 
		</tr>";
		echo "<tr>";
			echo "<td>" . $AFM . "</td>";
			echo "<td>" . $Name . "</td>";
			echo "<td>" . $SName . "</td>";
			echo "<td>" . $Street . "</td>";
			echo "<td>" . $SNumber . "</td>";
			echo "<td>" . $ZP . "</td>";
			echo "<td>" . $City . "</td>";
			echo "<td>" . $HotelC . "</td>";
			echo "<td>" . $SDate . "</td>";
			echo "<td>" . $DDate . "</td>";
			echo "<td>" . $Salary . "</td>";
			echo "<td>" . $Role . "</td>";
		echo "</tr>";
		echo "</table>";
         }

}

?>

</div>
</div>
<?php include('footer.html'); ?>

</body>
</html>
