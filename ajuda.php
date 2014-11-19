<style type="text/css"> 
table 
{ 
float:left; 
width:50%;
} 
</style> 
<?php
// Get all the data from the "example" table
$result = $mysqli->query("SELECT * FROM tbl_skin") 
or die(mysqli_error());  

echo "<table border='1'>";
echo "<tr> <th>Campeao</th> <th>SKIN</th> <th>ID</th> <th></th><th></th></tr>";
// keeps getting the next row until there are no more to get
while($row = mysqli_fetch_array( $result )) {
	// Print out the contents of each row into a table
	echo "<tr><td>"; 
	echo $row['id'];
	echo "</td><td>"; 
	echo $row['skin'];
	echo "</td><td>"; 
	echo $row['campeao'];
	echo "</td><td>"; 	
	echo "</td><td>"; 
} 

echo "</table>";
?>

<?php
// Get all the data from the "example" table
$result = $mysqli->query("SELECT * FROM tbl_campeao") 
or die(mysqli_error());  

echo "<table border='1'>";
echo "<tr> <th>ID</th> <th>Nomes</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysqli_fetch_array( $result )) {
	// Print out the contents of each row into a table
	echo "<tr><td>"; 
	echo $row['id'];
	echo "</td><td>"; 
	echo $row['campeao'];
	echo "</td></tr>"; 
} 

echo "</table>";
?>
