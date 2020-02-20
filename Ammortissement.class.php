<?php
/**
 * 
 */
class Ammortissement
{
	private $capitalInitial;
	private $taux;
	private $duree;
	private $dateDebut;
	public function __construct($capitalInitial,$taux,$duree,$date)
	{
		$this->capitalInitial = $capitalInitial;
		$this->taux = $taux;
		$this->duree = $duree;
		$this->dateDebut = $date;
	}

	public function getCapitalInitial()
	{
		return $this->capitalInitial;
	}

	public function getTaux()
	{
		return $this->taux;
	}

	public function getDuree()
	{
		return $this->duree;
	}

	public function getDateDebut()
	{
		return $this->dateDebut;
	}

	public function setCapitalInitial($capitalInitial)
	{
		$this->capitalInitial = $capitalInitial;
	}

	public function setTaux($taux)
	{
		$this->taux = $taux;
	}

	public function setDuree($duree)
	{
		$this->duree = $duree;
	}

	public function FunctionName($date)
	{
		$this->dateDebut = $date;
	}

	public function getTauxMensuel()
	{
		return (($this->taux)/100)/12;
	}

	public function getMensualite()
	{
		return ($this->capitalInitial*$this->getTauxMensuel())/(1-pow(1+$this->getTauxMensuel(),-$this->duree));
	}

	public function getCoutTotalPret()
	{
		return $this->getMensualite()*$this->duree;
	}

	public function getCoutCredit()
	{
		return $this->getCoutTotalPret()-$this->capitalInitial;
	}

	public function get1Interet($capital)
	{
		return $capital*$this->getTauxMensuel();
	}

	public function get1CapitalRembourser($capital)
	{
		return $this->getMensualite()-$this->get1Interet($capital);
	}

	public function get1CapitalRestant($capital)
	{
		return $capital-$this->get1CapitalRembourser($capital);
	}
}


?>