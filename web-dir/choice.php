<html>
<body>

<?php
	$choice;
	
	session_start();	
	$login = $_SESSION['login'];
	$Action = $_POST["Action"];
	$Table = $_POST["table"];
    	$_SESSION['choice'] = $Table;
?>

<p>You requested to: <strong> <?php echo $Action; ?> </strong>
to  table: <strong>  <?php echo $Table; ?> </strong> </p> 



<?php
	// we keep the table choice for the next sesion
// login =10 means that the user entered as admin
if ($login == 10){

// If the user wants to update  the  Data
 if ($Action == "Update Data") 
{   
	header ('Location: update.php');
}

// if the user wants to insert new data  to table customers 


if ($Action == "Insert New Data"){

 	header( 'Location: insert.php' ) ;

}



// if the user wants to delete data from table customers
if ($Action == "Delete Data"){


	header( 'Location: delete.php' );
}
  }
else {
	echo "You don't have the required permission to do this action. Please enter as <a href=login.html>admin</a>";

	}	
?>


</body>
</html>

