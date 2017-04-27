<?php

spl_autoload_register(
		
// 		cette fonction est invoquée à chaque fois qu'une classe est demandée 
// 		mais qu'elle n'a pas ete incluse dans le programme'
		
		function ($className) {
// La responsabilité de ce bloc
// c'est d'aller cherche le symbole manquant

	include $className . ".php";
	var_dump ($className);
	exit;
	
	}

);

$obj = new Tutorial\Poo\Francais;

var_dump($obj);
