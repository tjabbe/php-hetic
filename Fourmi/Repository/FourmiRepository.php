<?php
namespace Repository;

use \Entity\Fourmi;
require 'vendor/autoload.php';

class FourmiRepository
{
	private $pdo;

	public function __construct($params)
	{
	    try{
	        $pdo = new \PDO('mysql:host='.$params['DB_HOST'].';dbname='.$params['DB_NAME'], $params['DB_USERNAME'], $params['DB_PASSWORD']);
	        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
	    } catch (Exception $e){
	    	die('Could not connect');
		}

		$this->pdo = $pdo;
	    $this->hydrate();
	}

	public function insertFourmi(Fourmi $fourmi)
	{
		$prepare = $this->pdo->prepare('INSERT INTO fourmi (taille, couleur) VALUES (:taille, :couleur)');

		$prepare->bindValue(':taille', $fourmi->taille);
		$prepare->bindValue(':couleur', $fourmi->couleur);

		$prepare->execute();

		$fourmi->setId($this->pdo->lastInsertId());
	}

	public function updateFourmi(Fourmi $fourmi)
	{
		$prepare = $this->pdo->prepare('UPDATE fourmi SET couleur = :couleur, taille = :taille WHERE id = :id');

		$prepare->bindValue(':taille', $fourmi->getTaille());
		$prepare->bindValue(':couleur', $fourmi->getCouleur());
        $prepare->bindValue(':id', $fourmi->getId());

		$prepare->execute();
	}

	private function requestAllFourmis()
	{
		$query = $this->pdo->query('SELECT id, taille, couleur FROM fourmi');

		return $query->fetchAll();
	}

	private function hydrate()
	{
		$fourmis = $this->requestAllFourmis();

		foreach ($fourmis as $fourmi){
			new Fourmi($fourmi);
		}
	}
}