<?php

namespace Formation\MVC;

interface ObserverInterface

{
	
	/**
	 * Update
	 * Updated on subject notification
	 * 
	 * @param $SubjectInterface $subject
	 */
	public function update(SubjectInterface $subject);
	
}