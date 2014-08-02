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
<div align='center'>
<div class='container'>
<h1> welcome to update page </h1>



<?php

        session_start();
	$choice =  $_SESSION['choice'];	

 if ($choice=="Customers"):?>
<?php

  $con=mysqli_connect("localhost","root","xatzdb","hom_db"); 
echo "Customers: " . "<br>" . "<br>";
$result = mysqli_query($con,"SELECT * FROM Pelatis" );
	
 //print out all the customer codes
while($row = mysqli_fetch_array($result)) {

echo  $row['Kwdikos_Pelati']." ".$row['Onoma']." ".$row['Epwnumo'] ;
echo "<br>";
}

?>
<br><br>
<form action="" method="post">

<br><br><br>

Select the code of the customer whose records  you want to change  <input type="text" name="kwdikos"   ><br>
AT:      <input type="text" name="AT" ><br>
Onoma:   <input type="text" name="Onoma" ><br>
Epwnumo: <input type="text" name="Epwnumo"><br>
Odos:    <input type="text" name="Odos"  ><br>
Arithmos: <input type="text" name="Arithmos" ><br>
TK:      <input type="text" name="TK"  ><br>
Poli:    <input type="text" name="Poli" ><br>
Arithmos Pistwtikis Kartas: <input type="text" name="Ar_Pist_kar"  ><br>

<button class="btn btn-danger btn-lg btn-block " name='updateCustomer' type="submit">Update!</button>
</form>

<?php endif;?>

<?php if($choice=="Employees"):?>
<?php
 $con=mysqli_connect("localhost","root","xatzdb","hom_db");
 echo "Employees:"."<br>" . "<br>";
$result = mysqli_query($con,"SELECT * FROM Ypallilos" );
echo "Code - Name<br>";
 while($row = mysqli_fetch_array($result)) {
 echo  $row['Kwdikos_Ypallilou']." -  ".$row['Onoma']."   ".$row['Epwnumo'];
echo "<br>";
}
?>

<br><br>
<form action="" method="post">

<br><br><br>

Select the code of the employee  whose records  you want to change  <input type="text" name="kwdikos_employee"   ><br>
ssn:   <input type="text" name="AFM" ><br>
Name:   <input type="text" name="Onoma" ><br>
Last Name:   <input type="text" name="Epwnumo" ><br>
Street:   <input type="text" name="Odos" ><br>
Number:   <input type="text" name="Arithmos" ><br>
Postal code:   <input type="text" name="TK" ><br>
Town:   <input type="text" name="Poli" ><br>
Hotel Code:   <input type="text" name="Kwdikos_Ksenodoxeiou" ><br>
Start Date:   <input type="date" name="Hm_Enarksis" ><br>
End Date:   <input type="date" name="Hm_Liksis" ><br>
Salary:   <input type="text" name="Misthos" ><br>
Duty:   <input type="text" name="Armodiotita" ><br>

<button class="btn btn-danger btn-lg btn-block " name='updateEmployee' type="submit">Update!</button>
</form>

<?php endif;?>

<?php  if($choice=="Rooms"):?>

<?php 
 $con=mysqli_connect("localhost","root","xatzdb","hom_db");
 echo "Rooms:"."<br>" . "<br>";
$result = mysqli_query($con,"SELECT * FROM Domatio" );
echo "Room code - Room Number - Type - Price<br>";

 while($row = mysqli_fetch_array($result)) {

  echo  $row['kwdikos_dwmatiou']." __________  ".$row['Arithmos']."__________   ".$row['Tupos']."__________   ".$row['Timi'] ;
  echo "<br>";
  }
?>
<br><br>
<form action="" method="post">

<br><br><br>

Select the code of the room  whose records  you want to change  <input type="text" name="kwdikos_room"   ><br>
Type(1bed,2bed,3bed,4bed,suite) :      <input type="text" name="Tupos" ><br>
Price:   <input type="text" name="Timi" ><br>
<br>
<button class="btn btn-danger btn-lg btn-block " name='updateRoom' type="submit">Update!</button>
</form>

<?php endif;?>

<?php  if($choice=="Reservation"):?>
<?php
 $con=mysqli_connect("localhost","root","xatzdb","hom_db");
 echo "Reservations:"."<br>" . "<br>";
$result = mysqli_query($con,"SELECT * FROM Kratisi" );


echo "Reservation code  - Reservation date - hotel code<br>";

 while($row = mysqli_fetch_array($result)) {

  echo  $row['Kwdikos']." __________  ".$row['Hm.Kratisis']."__________   ".$row['Kwdikos'] ;
  echo "<br>";
  }
?>
<br><br>
<form action="" method="post">

<br><br><br>

Select the code of the reservation  whose records  you want to change  <input type="text" name="kwdikos_reservation"   ><br>
Reserve Date :      <input type="date" name="Hm_krat" ><br>
Start Date :   <input type="date" name="Hm_enarxis" ><br>
End Date :      <input type="date" name="Hm_lixis" ><br>
Payment type :   <input type="text" name="Plirwmi" ><br>
Customer code :      <input type="text" name="kwd_pelati" ><br>
Hotel Code :   <input type="text" name="kwd_ksen" ><br>
Room code :      <input type="text" name="kwd_dwm" ><br>   
<button class="btn btn-danger btn-lg btn-block " name='updateReservation' type="submit">Update!</button>
</form>
<?php endif ?>


<?php if($choice=='Hotel'):?>
<?php
$con=mysqli_connect("localhost","root","xatzdb","hom_db");
echo "Hotels:"."<br>" . "<br>";
$mysqlcommand=" SELECT * FROM `Ksenodoxeio` ";
$result = mysqli_query($con,$mysqlcommand);
 echo "<table  class='able-hover  table-condensed' >
                <tr>
                <th>Hotel code</th>  <th>Name</th> <th>Stree</th> <th>Street number</th> <th>Postal code</th> <th>Town</th> <th>Phone</th> <th>extra features</th> <th> Rating </th> <th>Construct year</th> <th>Remade year</th> 
                </tr>";


 if (!$result=mysqli_query($con,$mysqlcommand)){
                echo("Error description: " . mysqli_error($con));
        }
        else {
                while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['kodikos'] . "</td>";
                        echo "<td>" . $row['Onoma'] . "</td>";
                        echo "<td>" . $row['Odos'] . "</td>";
                        echo "<td>" . $row['Arithmos'] . "</td>";
                        echo "<td>" . $row['TK'] . "</td>";
                        echo "<td>" . $row['Poli'] . "</td>";
                        echo "<td>" . $row['Tilefwno'] . "</td>";
                        echo "<td>" . $row['Ipiresia'] . "</td>";
                        echo "<td>" . $row['Vathmologia'] . "</td>";
                        echo "<td>" . $row['Etos_kataskevis'] . "</td>";
                        echo "<td>" . $row['Etos_Anakataskevis'] . "</td>";
                     
}
                echo "</table>";
                }
?>

<form action="" method="post">

<br><br><br>

Select the code of the hotel  whose records  you want to change  <input type="text" name="kwdikos_hotel"   ><br>
Hotel name :      <input type="text" name="Onoma" ><br>
Street :   <input type="text" name="Odos" ><br>
Street Number :      <input type="text" name="Arithmos" ><br>
Postal code :   <input type="text" name="TK" ><br>
Town :      <input type="text" name="Poli" ><br>
Phone :   <input type="text" name="Tilefwno" ><br>
Extras :      <input type="text" name="Ipiresia" ><br>
Rating :      <input type="text" name="Vathmologia" ><br>
Year of construct:      <input type="text" name="Etos_kataskevis" ><br>
Year of remade:      <input type="text" name="Etos_Anakataskevis" ><br>

<button class="btn btn-danger btn-lg btn-block " name='updateHotel' type="submit"> Update!</button>
</form>
<?php endif?>


<?php
//update hotel
 if (isset($_POST['updateHotel'])){
$hotel_code=$_POST['kwdikos_hotel'];
$Onoma=$_POST['Onoma'];
$Odos=$_POST['Odos'];
$Arithmos=$_POST['Arithmos'];
$Tk=$_POST['TK'];
$Poli=$_POST['Poli'];
$Tilefwno=$_POST['Tilefwno'];
$Ipiresia=$_POST['Ipiresia'];
$Vathmologia=$_POST['Vathmologia'];
$Etos_kataskevis=$_POST['Etos_kataskevis'];
$Etos_Anakataskevis=$_POST['Etos_Anakataskevis'];
//make connection
$con=mysqli_connect("localhost","root","xatzdb","hom_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//else {
//echo "you are connected to the database <br>";
//echo "<br>";
//}
if ($Onoma  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Onoma  ='$Onoma'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's Name  <br>";
 }
if ($Odos  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Odos ='$Odos'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's street <br>";
 }
if ($Arithmos  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Arithmos ='$Arithmos'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's street number <br>";
 }
if ($Tk  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET TK ='$Tk'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's postal code <br>";
 }
if ($Poli  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Poli ='$Poli'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's town <br>";
 }
if ($Tilefwno  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Tilefwno ='$Tilefwno'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's  <br>";
 }
if ($Ipiresia  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Ipiresia ='$Ipiresia'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's  <br>";
 }
if ($Vathmologia  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Vathmologia ='$Vathmologia'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's  <br>";
 }
if ($Etos_kataskevis  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Etos_kataskevis ='$Etos_kataskevis'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's  <br>";
 }
if ($Etos_Anakataskevis  != "") {
     mysqli_query ($con, "UPDATE Ksenodoxeio  SET Etos_Anakataskevis ='$Etos_Anakataskevis'  WHERE kodikos='$hotel_code'  ");
        echo "you have changed hotel's  <br>";
 }
















}
//update employee
 if (isset($_POST['updateEmployee'])){
$employee_code=$_POST['kwdikos_employee'];
$AFM=$_POST['AFM'];
$Onoma=$_POST['Onoma'];
$Epwnumo=$_POST['Epwnumo'];
$Odos=$_POST['Odos'];
$Arithmos=$_POST['Arithmos'];
$Tk=$_POST['TK'];
$Poli=$_POST['Poli'];
$Kwd_ksenod=$_POST['Kwdikos_Ksenodoxeiou'];
$start=$_POST['Hm_Enarksis'];
$end=$_POST['Hm_Liksis'];
$Armodiotita=$_POST['Duty'];
$misthos=$_POST['Misthos'];
//make connection
$con=mysqli_connect("localhost","root","xatzdb","hom_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//else {
//echo "you are connected to the database <br>";
//echo "<br>";
//}

if ($AFM  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET AFM ='$AFM'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' SSN <br>";

 }
if ($Onoma  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Onoma ='$Onoma'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' name <br>";

 }
if ($Epwnumo  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Epwnumo ='$Epwnumo'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' Lastname <br>";

 }
if ($Odos  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Odos ='$Odos'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' street <br>";

 }
if ($Arithmos  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Arithmos ='$Arithmos'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' street number <br>";

 }
if ($Tk  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET TK ='$Tk'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' postal code <br>";

 }
if ($Poli  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Poli ='$Poli'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' town <br>";

 }
if ($Kwd_ksenod  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Kwdikos_Ksenodoxeiou  ='$Kwd_ksenod'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' hotel <br>";

 }
if ($start != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Hm_Enarksis ='$start'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' Starting date <br>";

 }
if ($end  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Hm_Liksis ='$end'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' Ending date <br>";

 }
if ($Armodiotita  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Armodiotita  ='$Armodiotita'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' duty <br>";

 }
if ($misthos  != "") {
     mysqli_query ($con, "UPDATE Ypallilos  SET Misthos  ='$misthos'  WHERE Kwdikos_Ypallilou='$employee_code'  ");
        echo "you have changed employees' salary<br>";

 }






} 
//update room
if (isset($_POST['updateRoom'])){
$room_code=$_POST['kwdikos_room'];
$Tupos=$_POST['Tupos'];
$Timi=$_POST['Timi'];

//make connection
$con=mysqli_connect("localhost","root","xatzdb","hom_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//else {
//echo "you are connected to the database <br>";
//echo "<br>";
//}
//echo $room_code;echo $Tupos; echo $Timi;

 if ($Tupos  != "") {
     mysqli_query ($con, "UPDATE Domatio  SET Tupos ='$Tupos'  WHERE kwdikos_dwmatiou='$room_code'  ");
        echo "you have changed room's type <br>";

 }
if ($Timi  != "") {
     mysqli_query ($con, "UPDATE Domatio  SET Timi ='$Timi'  WHERE kwdikos_dwmatiou='$room_code'  ");
        echo "you have changed room's price <br>";

 }
}

//update customer 
if (isset($_POST['updateCustomer']))
{
//declare all the variables from the new form
$customer_code=$_POST['kwdikos'];
$AT=$_POST['AT'];
$Onoma =$_POST['Onoma'];
$Epwnumo =$_POST['Epwnumo'];
$Odos =$_POST['Odos'];
$Arithmos =$_POST['Arithmos'];
$TK =$_POST['TK'];
$Poli =$_POST['Poli'];

$Ar_Pist_kar =$_POST['Ar_Pist_kar'];
//make connection
$con=mysqli_connect("localhost","root","xatzdb","hom_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//else {
//echo "you are connected to the database <br>";
//echo "<br>";
//}

 if ($AT  != "") {
     mysqli_query ($con, "UPDATE Pelatis  SET AT ='$AT'  WHERE Kwdikos_Pelati ='$customer_code'  ");
	echo "you have changed customer AT <br>"; 
   
 }
                                         
  if ($Onoma  != "") {

 mysqli_query($con, "UPDATE Pelatis SET Onoma ='$Onoma'  WHERE Kwdikos_Pelati ='$customer_code'");
 echo "you have changed customer Name <br>"; 
 } 
  if ($Epwnumo  != "") {
     $query = "UPDATE Pelatis SET Epwnumo = '$Epwnumo ' WHERE Kwdikos_Pelati = '$customer_code'";
 echo "you have changed customer Surname <br>";
 
 } 
  if ($Odos  != "") {
     $query = "UPDATE Pelatis SET Odos = '$Odos ' WHERE Kwdikos_Pelati = '$customer_code'";
 echo "you have changed customer Street <br>";
 
 } 
  if ($Arithmos  != "") {
     $query = "UPDATE Pelatis SET  Arithmos= '$Arithmos ' WHERE Kwdikos_Pelati = '$customer_code'";
 echo "you have changed customer Street Number <br>";
 
 } 
  if ($TK  != "") {
    $query = "UPDATE Pelatis SET TK = '$TK ' WHERE Kwdikos_Pelati = '$customer_code'";
 echo "you have changed customer Postal code <br>";
 
 } 
  if ($Poli != "") {
    $query = "UPDATE Pelatis SET Poli = '$Poli ' WHERE Kwdikos_Pelati = '$customer_code'";
 echo "you have changed customer Town <br>";
 
 } 
  if ($Ar_Pist_kar  != "") {
    $query = "UPDATE Pelatis SET  Ar_Pist_kar= '$Ar_Pist_kar ' WHERE Kwdikos_Pelati = '$customer_code'";
 echo "you have changed customer Credit Card Number <br>";
 
 } 
} 
//update reservation
if (isset($_POST['updateReservation']))
{
//declare all the variables from the new form
$reservation_code=$_POST['kwdikos_reservation'];
$Hm_krat=$_POST['Hm_krat'];
$Hm_enarxis =$_POST['Hm_enarxis'];
$Hm_lixis =$_POST['Hm_lixis'];
$Plirwmi =$_POST['Plirwmi'];
$kwd_pelati =$_POST['kwd_pelati'];
$kwd_ksen =$_POST['kwd_ksen'];
$kwd_dwm =$_POST['kwd_dwm'];
//echo $Hm_krat; echo $reservation_code;



//make connection
$con=mysqli_connect("localhost","root","xatzdb","hom_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//else {
//echo "you are connected to the database <br>";
//echo "<br>";
//}

 if ($Hm_krat != "") {
     mysqli_query ($con, "UPDATE Kratisi  SET `Hm.Kratisis` ='$Hm_krat'  WHERE Kwdikos ='$reservation_code'  ");
        echo "you have changed reservation booking date <br>";
 }
 if ($Hm_enarxis != "") {
     mysqli_query ($con, "UPDATE Kratisi  SET `Hm.Enarksis` ='$Hm_enarxis'  WHERE Kwdikos ='$reservation_code'  ");
        echo "you have changed reservation starting date <br>";
 }
 if ($Hm_lixis != "") {
     mysqli_query ($con, "UPDATE Kratisi  SET `Hm.Liksis` ='$Hm_lixis'  WHERE Kwdikos ='$reservation_code'  ");
        echo "you have changed reservation endind date <br>";
 }
 if ($Plirwmi != "") {
     mysqli_query ($con, "UPDATE Kratisi  SET `Tropos plirwmis` ='$Plirwmi'  WHERE Kwdikos ='$reservation_code'  ");
        echo "you have changed reservation payment type <br>";
 }
 if ($kwd_pelati != "") {
     mysqli_query ($con, "UPDATE Kratisi  SET `Kwdikos_Pelati` ='$kwd_pelati'  WHERE Kwdikos ='$reservation_code'  ");
        echo "you have changed reservation's customer code <br>";
 }
 if ($kwd_ksen != "") {
     mysqli_query ($con, "UPDATE Kratisi  SET `Kwdikos_Ksenodoxeiou` ='$kwd_ksen'  WHERE Kwdikos ='$reservation_code'  ");
        echo "you have changed reservation date <br>";
 }
 if ($kwd_dwm != "") {
     mysqli_query ($con, "UPDATE `Kratisi`  SET `kwdikos_dwmatiou` ='$kwd_dwm'  WHERE Kwdikos ='$reservation_code'  ");
        echo "you have changed reservation date <br>";
 }

}





mysqli_close($con);


 




?> 







</div><!--align-->
</div><!--container-->
<?php include('footer.html')?>


</body>
</html>
