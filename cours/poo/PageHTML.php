<?php

namespace Formation\Poo;

class PageHTML extends AbstractPage implements PageInterface, PageHTMLInterface

{ 
	public static $foo = "Foo";

	protected
	$doctype,

	$page;

	public function __construct()
	
	{
		parent:: __construct();
		$this->doctype = "<!DOCTYPE html>";
		$this->page = [];
		
		
	}
	


public function setLink(string $rel, string $href, $key = null)
{
	
	$link = "<link rel=\""
			. $rel 
			."\" href=\""
			.$href
			. "\"/>";
	if (null !== $key) {
		$this->link[$key] = $link;
		
	} else {
		$this->link[] = $link;
		
	}
	
	//ajouter un élément au tableau (link[])
			$this->link[] = $link;
			
			
}



public function setScript(string $src, string $type, $key = null)

{
	$script= "<script type=\""
			. $type
			. "\" src=\""
			. $src		
			."\"></script>";
	
					if (null !== $key) {
						$this->script[$key] = $script;
						
					} else {
						$this->script[] = $script;
						
					}
							
	
}





public function setJQueryPage (string $id, string $theme = "b")
{
	$page =  "\t" . "<div data-role=\"page\" id=\"" . $id . "\">" . "\n";
	$page .= "\t\t" . "<div data-role=\"header\" data-theme=\"" . $theme ."\"></div>" . "\n";
	$page .= "\t\t" . "<div data-role=\"main\" class=\"ui-content\"></div>" . "\n";
	$page .= "\t\t" . "<div data-role=\"footer\" data-position=\"fixed\"></div>" . "\n";
	$page .= "\t" . "</div>" . "\n";
	$this->page[] = $page;
	
	var_dump($page);
	
}

public function __toString()
	
{
	$page = $this->doctype. "\n";
	$page .= "<html>" . "\n";
	$page .= "\t" . "<head>" . "\n";
	$page .= "\t\t" . "<meta charset=\"utf-8\">". "\n";
	$page .= "\t\t"
			."<title>"
			. $this->title 
			. "</title>" 
			. "\n";
	
	foreach ($this->link as $value) {
		$page .="\t\t" .$value. "\n";
	}
	foreach ($this->script as $value) {
		$page .="\t\t" .$value. "\n";
	}
	
	$page .= "\t" . "</head>" . "\n";
	$page .= "\t" . "<body>" . "\n";
	foreach ($this->page as $value) {
		$page .="\t\t" .$value. "\n";
	}
	
	$page .= "\t" . "</body>" . "\n";
	$page .= "\t" . "</html>" . "\n";
	return $page;
}
}