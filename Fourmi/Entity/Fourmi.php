<?php
namespace Entity;

use \Repository\FourmiRepository;
require 'vendor/autoload.php';
class Fourmi 
{
	// @var int $id
    private $id;

    // @var string $couleur
    private $couleur;

    // @var int $taille
    private $taille;

    public function __construct($fourmi = null)
    {
        if (isset($fourmi)){
            $this->setId($fourmi->id);
            $this->setCouleur($fourmi->couleur);
            $this->setTaille($fourmi->taille); 
        }

        self::$instances[] = $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param mixed $couleur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * @param mixed $taille
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
        return $this;
    }

    private static $instances = [];

    public static function printInstances()
    {
    	echo '<pre>';
    	print_r(self::$instances);
    	echo '</pre>';

        return $this;
    }

    public static function getAll()
    {
        return self::$instances;
    }
}