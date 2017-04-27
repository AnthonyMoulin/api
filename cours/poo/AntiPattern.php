<?php

namespace Formation\Poo;

class AntiPattern
{
	
	private static $instance;
	
	private function __construct()
	{
		
		
	}
	
	public static function getInstance(): AntiPattern
	{
	if (null === self::$instance) {
		self::$instance = new AntiPattern;
	}
	return self::$instance; 
}
		
}
	


