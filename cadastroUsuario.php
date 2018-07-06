<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script>
			function mudarp() ///trocar as caixas de professor e aluno
			{
    			document.getElementById("a").style.display = "none"; 
				document.getElementById("b").style.display = "block"; 
			}
			function mudara()
			{
				document.getElementById("b").style.display = "none";
				document.getElementById("a").style.display = "block"; 
			}
			mudara();
		</script>

	</head>
	<body>
		<form id="areaB" method="get">
				
			<fieldset>
				<legend>Novo Usuário</legend>
				Nome: <input type="text" name="nome"><br>
				<br>Email: <input type="text" name="email"><br>
				<br>Senha: <input type="password" name="senha"> <br>
				<br>
				<input onclick="mudara();" checked="true" type="radio" name="tipoUsuario" value="1">Aluno
				<input onclick="mudarp();" type="radio" name="tipoUsuario" value="2"> Professor
				<br>
				<br>
				<div id="a">Numero da Matrícula:<br><input type="text" name="matri"></div>
				<div style="display:none;" id="b"> SIAPE:  <br> <input type="text" name="siape"></div>
				<br>
				<br><input type="submit" value="Cadastrar">
				<input type="button" value="Cancelar" onClick='location.href="login.php"'>
			</fieldset>
		</form>
	</body>
</html>
