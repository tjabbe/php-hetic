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
	    } catch (\Exception $e){
            echo('<pre>');
	    	die($e);
		}

		$this->pdo = $pdo;
	    $this->hydrate();
	}

	public function persist($fourmi)
	{
        if ($fourmi instanceof Fourmi){
            if ($fourmi->getId() !== null){
                return $this->updateFourmi($fourmi);
            }

            else {
                return $this->insertFourmi($fourmi);
            }
        }

        else if (is_array($fourmi)){
            foreach($fourmi as $_fourmi){
                if (!$_fourmi instanceof Fourmi){
                    throw new \Exception('Not a Fourmi', 10);
                }

                $_fourmi = $this->persist($_fourmi);
            }

            return $fourmi;
        }

        else {
            throw new \Exception('Not a Fourmi or an Array', 11);
        }
	}

	private function insertFourmi(Fourmi $fourmi)
	{
		$prepare = $this->pdo->prepare('INSERT INTO fourmi (taille, couleur)
										VALUES (:taille, :couleur)');
		$prepare->bindValue(':taille', $fourmi->getTaille());
		$prepare->bindValue(':couleur', $fourmi->getCouleur());

		$prepare->execute();

		$fourmi->setId($this->pdo->lastInsertId());
		return $fourmi;
	}

	private function updateFourmi(Fourmi $fourmi)
	{
		$prepare = $this->pdo->prepare('UPDATE fourmi
										SET couleur = :couleur, taille = :taille
										WHERE id = :id');
		$prepare->bindValue(':taille', $fourmi->getTaille());
		$prepare->bindValue(':couleur', $fourmi->getCouleur());
		$prepare->bindValue(':id', $fourmi->getId());

		$prepare->execute();
		return $fourmi;
	}

	public function remove($fourmi)
	{
        if ($fourmi instanceof Fourmi){
            if ($fourmi->getId() !== null){
                $this->removeFourmi($fourmi);
                return $this;
            }

            else {
                unset($fourmi);
                return $this;
            }
        }

        else if (is_array($fourmi)){
            foreach($fourmi as $_fourmi){
                if (!$_fourmi instanceof Fourmi){
                    throw new \Exception('Not a Fourmi', 10);
                }

                $this->remove($_fourmi);
            }

            return $this;
        }

        else {
            throw new \Exception('Not a Fourmi or an Array', 11);
        }
	}

    private function removeFourmi(Fourmi $fourmi)
    {
        $prepare = $this->pdo->prepare('DELETE FROM fourmi
										WHERE id = :id');
        $prepare->bindValue(':id', $fourmi->getId());

        $exec = $prepare->execute();

        if ($exec){
       		unset($fourmi);
        }

        else {
        	throw new \Exception('Fourmi not deleted', 12);
        }
    }

	private function requestAllFourmis()
	{
		$query = $this->pdo->query('SELECT id, taille, couleur
									FROM fourmi');

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