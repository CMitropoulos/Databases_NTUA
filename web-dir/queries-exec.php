
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
       <?php include('header.html') ?>
<div class="queries" '>
<h1 class="lead" >Hello! Here are the results of the  query you requested</h1>
</div>
<?php 
$query = $_POST["query"];

// Create & check the  connection to the database
	$con=mysqli_connect("localhost","root","xatzdb","hom_db");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// if the user wants to see the Details of customers who have booked, along with the details of their detention

if ($query == "query1"){

	echo "<table class='table table-hover  table-condensed ' >
		<tr>
		<th>Kwdikos Pelati</th> <th>AT </th> <th>Onoma</th> <th>Epwnumo</th> <th>Odos</th> <th>Arithmos</th> <th>TK</th> <th>Poli</th> <th> Arithmos_Pistwtikis_Kartas</th> <th> Kwdikos </th> <th>Hm.Kratisis</th> <th>Hm. Enar3is</th>  <th> Hm. Lixis</th>  <th>Tropos Plirwmis </th>  <th>Kwdikos_Ksenodoxeiou</th> <th>kwdikos_dwmatiou</th>
		</tr>";
	$mysqlcommand = " SELECT `Pelatis`.*,`Kratisi`.* FROM Pelatis LEFT JOIN `hom_db`.`Kratisi` ON `Pelatis`.`Kwdikos_Pelati` = `Kratisi`.`Kwdikos_Pelati`";
	if (!$result=mysqli_query($con,$mysqlcommand)){
		echo("Error description: " . mysqli_error($con));
	}
	else {  
		while($row = mysqli_fetch_array($result)) {
  			echo "<tr>";
  			echo "<td>" . $row['Kwdikos_Pelati'] . "</td>";
  			echo "<td>" . $row['AT'] . "</td>";
  			echo "<td>" . $row['Onoma'] . "</td>";
  			echo "<td>" . $row['Epwnumo'] . "</td>";
  			echo "<td>" . $row['Odos'] . "</td>";
  			echo "<td>" . $row['Arithmos'] . "</td>";
  			echo "<td>" . $row['TK'] . "</td>";
  			echo "<td>" . $row['Poli'] . "</td>";
  			echo "<td>" . $row['Arithmos_Pistwtikis_Kartas'] . "</td>";
  			echo "<td>" . $row['Kwdikos'] . "</td>";
  			echo "<td>" . $row['Hm.Kratisis'] . "</td>";
  			echo "<td>" . $row['Hm.Enarksis'] . "</td>";
  			echo "<td>" . $row['Hm.Liksis'] . "</td>";
  			echo "<td>" . $row['Tropos plirwmis'] . "</td>";
  			echo "<td>" . $row['Kwdikos_Ksenodoxeiou'] . "</td>";
  			echo "<td>" . $row['kwdikos_dwmatiou'] . "</td>";  			
			echo "</tr>";
		}

		echo "</table>";	
		}
 
} 
// if the user wants to see the  Name and Surname of the staff and the name of the hotel they work for
else if ($query == "query2"){
	
	echo "<table class='table table-hover  table-condense' >
		<tr>
		<th>Name</th> <th>Surname</th> <th>Hotel Name</th>
		</tr>";	
	$mysqlcommand = "SELECT `Ypallilos`.`Onoma` AS Name, `Ypallilos`.`Epwnumo` , `Ksenodoxeio`.`Onoma` \n"
    . "FROM Ypallilos\n"
    . "LEFT JOIN `hom_db`.`Ksenodoxeio` ON `Ypallilos`.`Kwdikos_Ksenodoxeiou` = `Ksenodoxeio`.`kodikos` LIMIT 0, 30 "; 
	
	if (!$result=mysqli_query($con,$mysqlcommand)){
		echo("Error description: " . mysqli_error($con));
	}
	else {
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Name'] . "</td>";	
			echo "<td>" . $row['Epwnumo'] . "</td>";
			echo "<td>" . $row['Onoma']  . "</td>";
			echo "</tr>";
		  }
		echo "</table>";
         	}
}

else if ($query == "query3"){

	echo "<table class='table table-hover  table-condensed'>
		<tr>
		<th>Average Salary</th>
		</tr>";
	
	$sql = "SELECT AVG( Misthos ) AS lefta  \n"
    		. "FROM Ypallilos";	

	if (!$result=mysqli_query($con,$sql)){
		echo("Error description: " . mysqli_error($con));
	}
	else {
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['lefta'] . "</td>";	
			echo "</tr>";
		}
	echo "</table>";
	}	

}
else if ($query == "query4"){


	echo "<table class='table table-hover  table-condensed'>
		<tr>
		<th>Room Number</th> <th>Hotel Code Number</th> <th> Type</th> <th>Price </th>
		</tr>";
$sql = "SELECT `Arithmos`, `Kwdikos_Ksenodoxeiou`, `Tupos`, `Timi` \n"
    . "FROM `Domatio` \n"
    . "ORDER BY `Timi` DESC LIMIT 0, 30 ";

	if (!$result=mysqli_query($con,$sql)){
                  echo("Error description: " . mysqli_error($con));
          }
          else {
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Arithmos'] . "</td>";	
			echo "<td>" . $row['Kwdikos_Ksenodoxeiou'] . "</td>";	
			echo "<td>" . $row['Tupos'] . "</td>";	
			echo "<td>" . $row['Timi'] . "</td>";	
			echo "</tr>";
		}
	echo "</table>";
	}
}
else if ($query == "query5"){

	echo "<table class='table table-hover  table-condensed'>
		<tr>
		<th> Total Bookings</th> <th> Hotel Code </th>
		</tr>";
$sql = "SELECT COUNT(`Pelatis`.`Kwdikos_Pelati`) AS Total, `Kratisi`.`Kwdikos_Ksenodoxeiou` AS hotelC \n"
    . "FROM Pelatis\n"
    . "LEFT JOIN `hom_db`.`Kratisi` ON `Pelatis`.`Kwdikos_Pelati` = `Kratisi`.`Kwdikos_Pelati`\n"
    . "WHERE `Kratisi`.`Kwdikos_Ksenodoxeiou` IS NOT NULL \n"
    . "GROUP BY `Kratisi`.`Kwdikos_Ksenodoxeiou` LIMIT 0, 30 ";

if (!$result=mysqli_query($con,$sql)){
                   echo("Error description: " . mysqli_error($con));
           }
           else {
                 while($row = mysqli_fetch_array($result)) {
                         echo "<tr>";
                         echo "<td>" . $row['Total'] . "</td>";       
                         echo "<td>" . $row['hotelC'] . "</td>";   
                         echo "</tr>";
                 }
         echo "</table>";
         }
}
else if ($query == "query6"){
	echo "<table class='table table-hover  table-condensed'>
		<tr>
		<th> Staff Code</th> <th> AFM </th> <th> Name</th> <th> Surname </th> <th>Street </th> <th> Number </th> <th>Zip Code </th> <th>City</th><th>Hotel Code</th>
		<th> Start Date</th> <th> Last Day</th> <th>Salary</th> <th> Role</th> 
		</tr>";
   $sql = "SELECT * \n" . "FROM `Ypallilos` \n" . "WHERE `Kwdikos_Ypallilou` \n". "IN (\n" . "\n"
    . "SELECT `Kwdikos_Ypallilou` \n"
    . "FROM `Ypallilos` \n"
    . "WHERE `Misthos` > ( \n"
    . "SELECT AVG( `Misthos` ) \n"
    . "FROM `Ypallilos` )\n"
    . ")";

if (!$result=mysqli_query($con,$sql)){
                   echo("Error description: " . mysqli_error($con));
           }
           else {
                 while($row = mysqli_fetch_array($result)) {
                         echo "<tr>";
			
			for ($i=0; $i<13; $i++) { 
                         echo "<td>" . $row[$i+$j] . "</td>";   
			 
			} 
                 echo "</tr>";
                 }
		echo "</table>";
         }
}
else if ($query == "query7"){
	echo "<table class='table table-hover  table-condensed'>
		<tr>
		<th>Name</th> <th>Total Bookings</th> <th>Hotel Code</th>
		</tr>";
$sql = "SELECT `Pelatis`.`Onoma` , COUNT( `Pelatis`.`Kwdikos_Pelati` ) , `Kratisi`.`Kwdikos_Ksenodoxeiou` \n"
    . "FROM Pelatis\n"
    . "LEFT JOIN `hom_db`.`Kratisi` ON `Pelatis`.`Kwdikos_Pelati` = `Kratisi`.`Kwdikos_Pelati` \n"
    . "WHERE `Kratisi`.`Kwdikos_Ksenodoxeiou` IS NOT NULL \n"
    . "GROUP BY `Kratisi`.`Kwdikos_Ksenodoxeiou` \n"
    . "HAVING COUNT( `Pelatis`.`Kwdikos_Pelati` ) >1\n"
    . "LIMIT 0 , 30";

	if (!$result=mysqli_query($con,$sql)){
                   echo("Error description: " . mysqli_error($con));
           }
           else {
                 while($row = mysqli_fetch_array($result)) {
                         echo "<tr>";
			
			for ($i=0; $i<3; $i++) { 
                         echo "<td>" . $row[$i+$j] . "</td>";   
			 
			} 
                 echo "</tr>";
                 }
		echo "</table>";
         }




}
	mysqli_close($con);
	include 'footer.html';
?>

</body>
</html>
