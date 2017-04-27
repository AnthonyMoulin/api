<?php

namespace FindCode\Api\View;

use Formation\MVC\ObserverInterface;
use Formation\MVC\SubjectInterface;

class PackageView implements ObserverInterface, ViewInterface
{
    
    private $template;
    
    /**
     * 
     * 
     */
    
    public function __construct()
    {
        $this->template="{}";
    }

    /**
     * 
     * @param SubjectInterface $subject
     */
    public function update (SubjectInterface $subject)
    {
        $this->template=json_encode($subject, JSON_PRETTY_PRINT);
    }

    /**
     * 
     * @return string
     */
    public function render()
    {
        return $this->template;
    }
    
   
    

}

