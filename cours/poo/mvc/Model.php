<?php

namespace Formation\MVC;

class Model extends AbstractSubject implements SubjectInterface

{
	public $title;
	
	/**
	 * Construct Model
	 */
	public function __construct()
	{
		parent::__construct();
	}
	public function get()
	{
		$this->title = "hello";
		$this->notify();
		
	}
}
