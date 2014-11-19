<?php
	include("connection.php");
	session_start();
	include("sairPagina.php");
	sairPagina();
?>
<?php

$campeao = $_POST['campeao'];


$sql = ("SELECT * FROM tbl_skin WHERE campeao='$campeao'");;
$query = $mysqli->query($sql);


if(mysqli_num_rows($query) == 0){
   echo  '<option value="0">'.htmlentities('Aguardando campeão...').'</option>';
   
}else{
   	  echo '<option value="">Selecione skin...</option>';
   while($ln = mysqli_fetch_assoc($query)){
      echo '<option value="'.$ln['id'].'">'.$ln['skin'].'</option>';
	  
   }
}

?>
