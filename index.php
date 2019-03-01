
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php

	require_once("config.php");

	//$sql =  new Sql();
	//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
	//echo json_encode($usuarios);

	//$root = new usuario();

	//1 - traz apenas um usuário da tabela

	//$root->loadById(4);

	//var_dump($root);
	//echo $root;

	//2- traz uma lista de usuários.

	//$lista = usuario::getlist();

	//echo json_encode($lista);

	//localizar lista de usuarios por parte do login
	//$search = usuario::search("jo");

	//echo json_encode($search);

	//carrega usuario usando login e senha

	$usuario =  new usuario();
	$usuario->login("root","12345");

	print_r($usuario);
?>
	
</body>
</html>