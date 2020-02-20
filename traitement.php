<?php
require 'Function.php';
session_start();


if (isset($_GET['name'])&&isset($_GET['mdp'])) {
	if (strlen($_GET['name'])>0&&strlen($_GET['mdp'])>0&&!is_null($_GET['name'])&&!is_null($_GET['mdp'])) {
		$id = getCountUtilisateur();
		$val = Inscription($id->isa+1,$name,$passwrd);
		if ($val) {
			$_SESSION['id'] = $id->isa+1;
			header('Location:index.php?connected');
		}else{
			header("Location:index.php?error_connexion");
		}
	}else{
		header("Location:index.php?error_connexion");

	}
}else if (isset($_GET['deconnex'])) {
	$_SESSION['id'] = NULL;
	header('Location:index.php?deconnected');
}else if (isset($_GET['id'])&&isset($_GET['mdp'])) {
	if (is_null($_GET['id'])||is_null($_GET['mdp'])||$_GET['id']==NULL) {
		header("Location:index.php?error_connexion");
	}else{
		$id = connexion($_GET['id'],$_GET['mdp']);
		if ($id==-1) {
			header("Location:index.php?error_connexion");
		}
		else{
			$_SESSION['id'] = $id;
			header("Location:index.php?connected");
		}	
	}
}


?>