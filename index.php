<?php

	require_once("config.php");

	//$sql =  new Sql();
	//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
	//echo json_encode($usuarios);

	$root = new usuario();

	$root->loadById(4);

	var_dump($root);
	//echo $root;

?>