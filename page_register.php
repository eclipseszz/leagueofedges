<?php
	include("connection.php");
	session_start();
	include("sairPagina.php");
	sairPagina();
?>

<!DOCTYPE html>
<html>
	<head>
		<title> BornToPlay - Registro </title>
		<link rel="stylesheet" href="styles/style-register.css" type="text/css" media="all" />
	</head>
	<body>
		<div id="div_Container">
			<div id="div_Topo"> 
				<img id="imageTOPO" src="images/topo.png" alt="Imagem Togo" />
			</div>
			<div id="div_Menu"> 
				<ul>
					<?php
						if(isset($_SESSION["Usuario"])) { ?>
					<li> <a href="index.php"> Início </a> </li>
					<li> <a href="contato.php"> Contato </a> </li>
					<li> <a href="panel.php"> Painel </a> </li>
					<li> <a href="doacao.php"> Doações </a> </li>					
					<li> <a href="index.php?func=sairPagina"> Sair ( <?php echo $_SESSION["Usuario"]; ?> ) </a> </li>
					<?php	} else { ?>
					<li> <a href="index.php"> Início </a> </li>
					<li> <a href="contato.php"> Contato </a> </li>
					<li> <a href="doacao.php"> Doações </a> </li>					
					<li> <a href="pag-register.php"> Registro </a> </li>
					<li> <a href="pag-login.php"> Login </a> </li>
					<?php } ?>
				</ul>
			</div>
			<div id="div_Construcao">
				<h1> <b>EM CONSTRUÇÃO!!!</b> <br /> </h1>
			</div>
			<div id="div_Conteudo"> 

				<div id="div_Registro">
			<div id="login">
				<form action="" method="POST">
					<img src="images/protecao.png" alt="Imagem Protecao"/>
					<div id="input">
						<span> Usuário </span>
							<input name="input_User" type="text" /> <br />
						<span> E-mail </span>
							<input name="input_Email" type="text" /> <br />
						<span> Senha </span>
							<input name="input_Pass" type="password" />
						<input type="submit" name="button" value="Registrar" />
					</div>
				</div>
			</div>
			<div id="div_Rodape"> 
				<span> BornToPlay 2014 - Todos os direitos reservados. </span>
			</div>
		</div>
	</body>
</html>
<?php	
	if(isset($_POST["button"])) {
		$user  = mysqli_real_escape_string($mysqli, $_POST["input_User"]);
		$email = mysqli_real_escape_string($mysqli, $_POST["input_Email"]);
		$pass  = mysqli_real_escape_string($mysqli, $_POST["input_Pass"]);
		
		if($user == "" OR $pass == "") {
			echo "<script> alert('Preencha todos os campos'); location.href='pag-register.php'</script>";
		}
		$query = $mysqli->query("SELECT * FROM usuarios WHERE Email='$email' OR Usuario='$user'");
		$row = $query->num_rows;
		if($row > 0) {
			echo "<script> alert('Usuário ou e-mail já existente no Banco de Dados!'); </script>";
		} else {
			$query2 = $mysqli->query("INSERT INTO usuarios (Usuario, Senha, Email, Permissao) VALUES ('$user', '$pass', '$email', '0')");
			if($query2) {
				echo "<script> alert('Usuário registrado com sucesso!'); location.href='pag-login.php' </script>";
			} else {
				echo "<script> alert('Erro ao adicionar usuário!'); </script>";
			}
		}
	}
?>