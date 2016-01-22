<?php
use \Repository\FourmiRepository;
use \Entity\Fourmi;
require 'vendor/autoload.php';

$fourmiRepository = new FourmiRepository([
	'DB_HOST'	  => 'localhost',
	'DB_NAME'	  => 'cours_hetic',
	'DB_USERNAME' => 'root',
	'DB_PASSWORD' => ''
]);

// INSERT
// $fourmi = new Fourmi();
// $fourmi->setTaille(23)->setCouleur('noire');
// $fourmiRepository->persist($fourmi);

// UPDATE
// $fourmi = Fourmi::getAll()[0];
// $fourmi->setTaille(12);
// $fourmiRepository->persist($fourmi);

// REMOVE
// $fourmi = Fourmi::getAll()[0];
// $fourmiRepository->remove($fourmi);

Fourmi::printInstances();