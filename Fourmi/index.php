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
// $fourmiRepository->insertFourmi($fourmi);

// UPDATE
// $fourmi = Fourmi::getAll()[0];
// $fourmi->setTaille(12);
// $fourmiRepository->updateFourmi($fourmi);

// REMOVE
// $fourmi = Fourmi::getAll()[0];
// $fourmiRepository->removeFourmi($fourmi);

Fourmi::printInstances();