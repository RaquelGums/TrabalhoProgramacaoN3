<!DOCTYPE>
<html>
	<head>
	<style>
		body {
			background-image: url(fundo.jpg);
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
				<input type="radio" name="tipoUsuario" value="1">Aluno
				<br>
				Numero da Matrícula: <input type="text" name="email"><br>
				<br>
				<input type="radio" name="tipoUsuario" value="2"> Professor
				<br>
				SIAPE: <input type="password" name="senha"> <br>
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