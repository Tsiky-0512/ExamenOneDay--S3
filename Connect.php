<?php 
 function dbconnect()
{
	$user='simulation';
    $pass='123456';
    $dsn='pgsql:host=localhost;port=5432;dbname=simulate';
    $dbh = null;
    try {
            $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        print "Erreur ! : " . $e->getMessage();
        die();
    }
    return $dbh;
}
?>