<?php
use \Repository\FourmiRepository;
use \Entity\Fourmi;
require 'vendor/autoload.php';

$fourmiRepository = new FourmiRepository([
	'DB_HOST' 	  => 'localhost',
	'DB_NAME' 	  => 'cours_hetic',
	'DB_USERNAME' => 'root',
	'DB_PASSWORD' => ''
]);

/*
$fourmi = new Fourmi();
$fourmi->setTaille(23);
$fourmi->setCouleur('noire');
$fourmi->addToRepository($fourmiRepository);
*/

Fourmi::printInstances();