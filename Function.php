<?php include ('Connect.php'); ?>
<?php
 spl_autoload_register ('chargerClasse');
function chargerClasse ($classe) {
	require $classe . '.class.php';
}
function Inscription($id,$nom,$motdepasse)
{
	if ($nom!=null&&$motdepasse!=null&&strlen($nom)<30&&strlen($motdepasse)<30) {
		$sql = "insert into utilisateur values(%s,'%s','%s')";
		$req = sprintf($sql,$id,$nom,$motdepasse);
		echo $req;
		$data = dbconnect()->exec($req);
		return true;
	}else{
		return false;
	}
}

function getCountUtilisateur()
{
	$sql = "select count(id) as isa from utilisateur";
	$data = dbconnect()->query($sql);
	$data->setFetchMode(PDO::FETCH_OBJ);
	$result ;
	while($ligne = $data->fetch())
	{
		$result = $ligne;
	}
	$data->closeCursor();
	return $result; 
}

function getCountHist()
{
	$sql = "select count(id) as isa from Ammortissement";
	$data = dbconnect()->query($sql);
	$data->setFetchMode(PDO::FETCH_OBJ);
	$result ;
	while($ligne = $data->fetch())
	{
		$result = $ligne;
	}
	$data->closeCursor();
	return $result; 
}

function connexion($id,$mdp)
{
	$sql = "select * from utilisateur where id='%s' and mdp='%s'";
	$req = sprintf($sql,$id,$mdp);
	$data = dbconnect()->query($req);
	$data->setFetchMode(PDO::FETCH_OBJ);
	$result = NULL;
	while($ligne = $data->fetch())
	{
		$result = $ligne;
	}
	$data->closeCursor();
	if (is_null($result)) {
		return -1;
	}
	else{
		return $result->id;
	}
}

function saveIntoBdd(Ammortissement $simulation,$id)
{
	$ide = getCountHist()->isa+1;
	$sql = "insert into Ammortissement values ('%s','%s','%s','%s','%s','%s')";
	$req = sprintf($sql,$ide,$id,$simulation->getCapitalInitial(),$simulation->getTaux(),$simulation->getDuree(),$simulation->getDateDebut());
	$data = dbconnect()->exec($req);
}

function getHist($id)
{
	$req = "select * from Ammortissement where idAdmin='%s'";
	$sql = sprintf($req,$id);
	$data = dbconnect()->query($sql);
	$data->setFetchMode(PDO::FETCH_OBJ);
	$result = array();
	while($ligne = $data->fetch())
	{
		$result[] = $ligne;
	}
	$data->closeCursor();
	return $result; 
}

function deleteHist($id)
{
	$req = "delete from Ammortissement where id='%s'";
	$sql = sprintf($req,$id);
	$data = dbconnect()->exec($sql);
}

?>