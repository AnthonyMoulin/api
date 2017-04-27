<?php 

namespace Formation\Poo;

abstract class AbstractPage
{
	
	protected 
	
	$titre,
	$link,
	$script;
	
	protected function __construct()
	{
	
	$this->title = "";
	$this->link = [];
	$this->script = [];
		
	}
	
	public function __set($name, $value)
	{
		
	}
	
	public function __get($name)
	{
		if (property_exists($this, $name)){
			return $this->{$name};
			
		}
	}
	
	public function getLink($key)
	{
		
		if (array_key_exists($key, $this->link)){
			return $this->{$key};
			
		}
		
	}
	
	public function getScript(int $key)
	{
		if (array_key_exists($key, $this->link)){
			return $this->{$key};
		}
	}
	
	public function setTitle(string $name)
	{
		$this->title = $name;
	}
	
}
