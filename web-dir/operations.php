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
<h1>Welcome to operations  page </h1>
</div>
<?php
$View=$_POST["View"];
//echo $view;
?>
<div align='center'>

<p> You requested to view <?php echo $View;?> </p>

</div>
<?php

//if the user chose to see avalaible rooms
if ($View== "Avalaible rooms" ):




?>
<div class='container'>
<div align="center">
<form role='form' action="" method="post">
Select the hotel and the dates you want to check for avalaibility<br>
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

<input type="date" name="Start_Date">Start Date<br>
<input type="date" name="End_Date">End Date<br><br>
<button class="btn btn-danger btn-lg btn-block " name="Avalaible" type="submit">Go!</button>
</form>
</div>
</div>
<?php endif; ?>
<div class='container'>
<div align='center'>

<?php 
if ($View=="Total charge"):

while($row = mysqli_fetch_array($result)) {

echo  $row['Kwdikos_Pelati']." ".$row['Onoma']." ".$row['Epwnumo'] ;
echo "<br>";
}
?>
<form action="" method="post">
select the customer to see the total charge:<br>
<select name="Customer">
         <option required="" value="novalue">--</option>
         <?php
         $con=mysqli_connect("localhost","root","xatzdb","hom_db");
         $sql = "SELECT * FROM Pelatis LIMIT 0, 30 ";
         $result = mysqli_query($con,$sql );
                 while($row = mysqli_fetch_array($result)): ?>
                         <option   value="<?php echo $row['Kwdikos_Pelati'];?>" > <?php echo  $row['Onoma']." ". $row['Epwnumo']; ?>  </option>
                 <?php endwhile;
         mysqli_close($con); ?>
 </select> <br>
<br>

<button class="btn btn-danger btn-lg btn-block " name="Charge" type="submit">Go!</button>
</form>
<?php endif; ?>

<? if(isset($_POST['Charge'])){
$code=$_POST['Customer'];
 $con=mysqli_connect("localhost","root","xatzdb","hom_db");
$mysqlcommand = "SELECT DISTINCT p.Onoma,p.Epwnumo, k.Kwdikos, d.Timi * ABS( DATEDIFF( k.`Hm.Enarksis` , k.`Hm.Liksis` ) ) \n"
    . "FROM Pelatis, Domatio AS d\n"
    . "INNER JOIN Kratisi k ON ( k.kwdikos_dwmatiou = d.kwdikos_dwmatiou ) \n"
    . "INNER JOIN Pelatis p ON ( p.Kwdikos_Pelati = k.Kwdikos_Pelati ) \n"
    . "WHERE p.Kwdikos_Pelati ='$code'\n"
    . " LIMIT 0, 30 ";
$result = mysqli_query($con,$mysqlcommand);
 echo "<table class='table table-hover  table-condensed '>
                <tr>
                <th>Name</th>  <th>Last Name</th> <th>Total Charge</th>
                </tr>";


 if (!$result=mysqli_query($con,$mysqlcommand)){
                echo("Error description: " . mysqli_error($con));
        }
        else {
                while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        
                        echo "<td>" . $row['Onoma'] . "</td>";
                       echo "<td>" . $row['Epwnumo']. "</td>";
                         echo "<td>" .$row['d.Timi * ABS( DATEDIFF( k.`Hm.Enarksis` , k.`Hm.Liksis` ) )']. "</td>";
                       
                  }                  
                  echo "</table>";


            }
}
?>
<?php

if(isset($_POST['Avalaible'])){

$hotel=$_POST['Hotel'];
$start=$_POST['Start_Date'];
$end=$_POST['End_Date'];

//echo $hotel; echo $start; echo $end;
 $con=mysqli_connect("localhost","root","xatzdb","hom_db");


$mysqlcommand = "SELECT Onoma, Domatio.Arithmos\n"
    . "FROM Domatio\n"
    . "INNER JOIN Ksenodoxeio t0 ON Domatio.Kwdikos_Ksenodoxeiou=t0.kodikos\n"
    . "WHERE t0.kodikos='$hotel'\n"
    . "AND Domatio.kwdikos_dwmatiou NOT IN (SELECT t1.kwdikos_dwmatiou\n"
    . " FROM Domatio t1\n"
    . " INNER JOIN Kratisi t2 ON t1.kwdikos_dwmatiou=t2.kwdikos_dwmatiou\n"
    . " WHERE NOT(DATE('$end')<t2.`Hm.Enarksis` OR (DATE('$start')>t2.`Hm.Liksis`))) ";




$result = mysqli_query($con,$mysqlcommand);
 echo "<table class='table table-hover  table-condensed '>
                <tr>
                <th>room number</th>  <th>Hotel Name</th> 
                </tr>";


 if (!$result=mysqli_query($con,$mysqlcommand)){
                echo("Error description: " . mysqli_error($con));
        }
        else {
                while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Arithmos'] . "</td>";
                        echo "<td>" . $row['Onoma'] . "</td>";
}
                echo "</table>";
                }
           mysqli_close($con);
 }



?>




</div>
</div>
<?php include('footer.html') ?>



</body>
</html>
