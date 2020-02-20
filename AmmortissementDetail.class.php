<?php
/**
 * 
 */
class AmmortissementDetail
{
	private $numeroMensualite;
	private $soldeInitial;
	private $capitalRembourser;
	private $interet;
	private $capitalRestant;
	private $dateVersement;

	function __construct($numeroMensualite,Ammortissement $ammortissement)
	{	
		$this->numeroMensualite = $numeroMensualite;
		$capital = $ammortissement->getCapitalInitial();
		$interet = $ammortissement->get1Interet($capital);
		$capitalRestant = $ammortissement->get1CapitalRestant($capital);
		$capitalRembourse = $ammortissement->get1CapitalRembourser($capital);
		for ($i=0; $i < $this->numeroMensualite ; $i++) { 
			if ($capital==0) {
				break;
			}
			$capital = $ammortissement->get1CapitalRestant($capital);
			$interet = $ammortissement->get1Interet($capital);
			$capitalRestant = $ammortissement->get1CapitalRestant($capital);
			$capitalRembourse = $ammortissement->get1CapitalRembourser($capital);
			if($capitalRestant < 0)
			{
				$capitalRestant = 0;
				break;
			}
		}
		$this->soldeInitial = $capital;
		$this->capitalRembourser = $capitalRembourse;
		$this->interet = $interet;
		$this->capitalRestant = $capitalRestant;
		$this->dateVersement = $this->getDate($numeroMensualite,$ammortissement->getDateDebut());
	}

	public function getNumeroMensualite()
	{
		return $this->numeroMensualite;
	}

	public function getSoldeInitial()
	{
		return $this->soldeInitial;
	}

	public function getCapitalRembourser()
	{
		return $this->capitalRembourser;
	}

	public function getInteret()
	{
		return $this->interet;
	}

	public function getCapitalRestant()
	{
		return $this->capitalRestant;
	}

	public function getDateVersement()
	{
		return $this->dateVersement;
	}

	public function getDate($numeroMensualite,$date)
	{
		$tab = preg_split('/[\s,-]+/', $date);
		$day = $tab[2]; $month = $tab[1];$year = $tab[0];
		$int_month = intval($month);
		$int_year = intval($year);
		$mois = ($int_month+$numeroMensualite)%12; 
		$anWithFloat = (($int_month+$numeroMensualite)/12)+$int_year;
		$an = intval($anWithFloat);
		return "01-". $mois ."-" .$an;
	}

}


 ?>