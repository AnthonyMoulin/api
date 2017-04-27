<?php

namespace FindCode\Api\Model;


use Formation\MVC\AbstractSubject;
use Formation\MVC\SubjectInterface;


class PackageModel extends AbstractSubject implements
	SubjectInterface,
	PackageModelInterface
{

	public
		$testable,
	    $distribuable,
		$package,
		$description,
		$keywords,
		$license,
		$name,
		$homepage,
		$dependencies,
		$devDependencies,
		$author,
		$version,
		$language;

	/**
	 * Construct PackageModel
	 */
	public function __construct()
	{
		parent::__construct();
		$this->type            = "library";
		$this->testable    	   = false;
		$this->distribuable    = false;
		$this->package         = "";
		$this->description     = "";
		$this->keywords        =  [];
		$this->license         = "";
		$this->name            = "";
		$this->homepage        = "";
		$this->dependencies    =  [];
		$this->devDependencies =  [];
		$this->author          = "";
		$this->version         =  [];
		$this->language        = "";
	}

	private function setAttributes($obj)
	{
		if (isset($obj->version)) {
			$this->version[] = $obj->version;
		}
		if (isset($obj->language)) {
			$this->language = $obj->language;
		}
		if (isset($obj->name)) {
			$this->name = $obj->name;
		}
		if (isset($obj->homepage)) {
			$this->homepage = $obj->homepage;
		}
		if (isset($obj->license)) {
			$this->license = $obj->license;
		}
		if (isset($obj->package)) {
			$this->package = $obj->package;
		}
		if (isset($obj->description)) {
			$this->description = $obj->description;
		}
		if (isset($obj->keywords)) {
			$this->keywords[] = $obj->keywords;
		}
		if (isset($obj->author)) {
			$this->author[] = $obj->author;
		}
		if (isset($obj->dependencie)) {
			$this->dependencie[] = $obj->dependencie;
		}
		if (isset($obj->devDependencies)) {
			$this->devDependencies[] = $obj->devDependencies;
		}
		
	}
// 		pas author
// 		pas dzpendencie
// 		pas devdependencie
// 		pas require dev;
		
		
	private function consumeNPM ()
	{
		$url = "https://www.npmjs.com/package/" . $this->name;
	   return $this->distribuable = (bool) $this->consume($url, true);
	}

	
	private function consume ($url, $ping = false)
	{
	    $filename = __DIR__ .  "/cache/" . md5($url);
// 		if (file_exists($filename)) {
// 			$output = file_get_contents($filename);
// 		} else {
			$output = @file_get_contents($url);
			if(isset($http_response_header)) {
			$tab = explode(" ", $http_response_header[0]);
			$code = $tab[1];
			}
			if ($code === "200") {
				file_put_contents($filename, $output);
				
			}
			
			else{$ping = False;
			}
			
// 		}
		return $ping? $ping : json_decode($output);
	}
	
	private function consumePackage ()
	{
		$url = "https://raw.githubusercontent.com/"
		     . $this->package
		     . "/master/package.json";
	    $obj = $this->consume($url);
	    if ($obj) {
	    	$this->language = "js";
	    	$this->setAttributes($obj);
	    	$this->consumeNPM();
	    	$this->consumeTravis();
	    	
	    	
	    	
	    	
	    	return true;
	    }
	    return false;
	}
	
	private function consumeComposer ()
	{
		$url = "https://raw.githubusercontent.com/"
		     . $this->package
		     . "/master/composer.json";
	     $obj = $this->consume($url);
	     if ($obj) {
	     	$this->language = "php";
	     	$this->consumePackagist();
	     	$this->consumeTravis();
	     	$this->setAttributes($obj);
// 	     	var_dump($obj);
	     	
	     	return true;
	     }
	     return false;
	}

	private function consumePackagist ()
	{
		$url = "https://packagist.org/packages/" . $this->package . ".json";
		return $this->distribuable = (bool) $this->consume($url, true);
	}

	public function get()
	{
		if (!$this->consumePackage()
		 && !$this->consumeComposer()) {
		 }
			throw new \RuntimeException();
	}
	
	
	private function consumeTravis ()
	{
		$url = "https://raw.githubusercontent.com/"
				. $this->package
				. "/master/.travis.yml";
	   return $this->testable = (bool) $this->consume($url, true);

	}
	
	
 	
 	



}