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
					<li> <a href="page_register.php"> Registro </a> </li>
					<li> <a href="page_login.php"> Login </a> </li>
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
						<span> Senha </span>
							<input name="input_Pass" type="password" />
						<input type="submit" name="button" value="Login" />
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
<?php	
	if(isset($_POST["button"])) {
		$user = mysqli_real_escape_string($mysqli, $_POST["input_User"]);
		$pass = mysqli_real_escape_string($mysqli, $_POST["input_Pass"]);
		
		if($user == "" OR $pass == "") {
			echo "<script> alert('Preencha todos os campos'); location.href='pag-login.php'</script>";
		}
		$check = $mysqli->query("SELECT * FROM usuarios WHERE Usuario='$user' AND Senha='$pass'");
		$row   = $check->num_rows;
		if($row > 0) {
			$check2 = $mysqli->query("SELECT Permissao FROM usuarios WHERE Usuario='$user'");
			$row2 = $check2->num_rows;
			if($row2) {
				$dadosUsuario = $check2->fetch_array();
				if($dadosUsuario["Permissao"] == 1) {
					echo "<script> alert('Bem vindo ao Painel de Controle!'); location.href='panel.php'</script>";
					session_start();
					$_SESSION["Usuario"] = $user;
				} else {
					echo "<script> alert('Você não tem permissão!'); location.href='page_login.php'</script>";
				}
			}
		} else {
			echo "<script> alert('Usuário ou Senha incorretos!'); location.href='page_login.php'</script>";
		}
	}
?>