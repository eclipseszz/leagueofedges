<html>
<head>
	<link rel="stylesheet" href="styles/style-panel.css" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<center><h1> Me Ajude a Registrar</h1></center>
<center><div id="div_Champion">
<form method="post" action="champions.php" enctype="multipart/form-data">Nome: <input type="text" name="nome" /> <br>
<input type="hidden" name="acao" value="enviado"/>
<input type="submit" value="Enviar Informações"/>
<?php
// Get all the data from the "example" table
$result = $mysqli->query("SELECT * FROM tbl_campeao") 
or die(mysqli_error());  

echo "<table border='1'>";
echo "<tr> <th>ID</th> <th>Champion</th> </tr>";
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
</form>
</div></center>
</body>
</html>