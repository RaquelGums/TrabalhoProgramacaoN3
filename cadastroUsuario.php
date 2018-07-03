<!DOCTYPE>
<html>
	<head>
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
		<style>
			body {
				background-image: url(fundo.jpg);
			}
			fieldset{  
				display: inline-block;
				text-align:center;
				position:absolute;
				left:35%;
			}
		</style>
	</head>
	<body>
		<form id="area" method="get">
				
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
				<br>
				<br>
				<div id="a">Numero da Matrícula:  <br><input type="text" name="matri"></div>
				<div style="display:none;" id="b"> SIAPE:  <br> <input type="text" name="siape"></div>
				<br>
				<br>
				<input type="radio" name="ativo" value="1">Ativo
				<input type="radio" name="ativo" value="0">Inativo
				<br>
				<br><input type="submit" value="Cadastrar">
				<button value="cancelar">Cancelar
			</fieldset>
		</form>
	</body>
</html>
