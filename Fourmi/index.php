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

// $fourmiRepository->insertFourmi(23, 'noire');

Fourmi::printInstances();