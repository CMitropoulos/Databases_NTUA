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
<h1>Welcome to views page </h1>

<?php
$View=$_POST["View"];?>
<?php
if ($View=='Total charge'):
$con=mysqli_connect("localhost","root","xatzdb","hom_db");
        $sqlcommand = " SELECT * FROM `non_updatable_view_for_total_charge`";
      $result = mysqli_query($con,$sqlcommand );
 echo "<table class='table table-hover  table-condensed'  >

                <tr>
                <th> Name</th>  <th>Lastname</th>   <th>Price </th>
                </tr>";

        
             while($row = mysqli_fetch_array($result)) {               

                echo "<tr>";
                        echo "<td>" .$row['Onoma']." </td>";
                           echo "<td>" .$row['Epwnumo']." </td>";

                       echo "<td>" .$row['d.Timi * ABS( DATEDIFF( `k`.`Hm.Enarksis` , `k`.`Hm.Liksis` ) )'] . "</td>";
                       
                       
               
           }
echo "</tr>";
                echo "</table>";         

?>

<?php endif; ?>

<?php 

if ($View=='Working now'):
$con=mysqli_connect("localhost","root","xatzdb","hom_db");
        $sqlcommand = " SELECT * FROM `updatable_view_for_workers_in_lagonisi`";
      $result = mysqli_query($con,$sqlcommand );

 echo " <table class='table table-hover  table-condensed'  >
                <tr>
                <th>Employee Name</th>  <th>Employee Lastname</th>

                </tr>";

             while($row = mysqli_fetch_array($result)) {
               


                echo "<tr>";
                        echo "<td>" .$row['Onoma']." </td>";
                        echo "<td>" .$row['Epwnumo']." </td>";



               
               
           }
                 echo "</tr>";
                echo "</table>";


?>
<?php endif; ?>

</div>
</div>
<?php include('footer.html') ?>


</body>
