<?php 

namespace Formation\Poo;

interface PageInterface

{
	public function setLink(string $rel, string $href, $key = null);
	
	
	
	
	public function getLink($key);
	
	
	
	
	public function setScript(string $src, string $type, $key = null);
	
	public function getScript(int $key);
	
	public function setTitle(string $name);
	
	
	public function __toString();
}