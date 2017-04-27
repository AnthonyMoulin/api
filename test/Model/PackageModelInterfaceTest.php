<?php

namespace FindCode\Test\Model;

use FindCode\Api\Model\PackageModelInterface;
use Formation\MVC\SubjectInterface;




abstract class PackageModelInterfaceTest extends \PHPUnit\Framework\TestCase
{
	
	abstract public function getPackageModelInterface(): PackageModelInterface;
	
	/**
	 * @dataProvider attributesProvider
	 */
	public function testAttribut($attribut)
	
	{
		$mock = $this->getPackageModelInterface();
		$this->assertTrue (property_exists($mock, $attribut));
		
	}
	
	/**
	 * attributesProvider
	 */
	public final function attributesProvider()
	{
		return [
			["distribuable"],
			["language"],
			["name"],
			["homepage"],
			["package"],
			["description"],
			["keywords"],
			["dependencies"],
			["devDependencies"],
			["version"],
			["license"],
			["author"],
					
	];
	
}

/**
 * @dataProvider methodsProvider
 */
public function testMethod($method)
{
	$mock = $this->getPackageModelinterface();
	$this->assertTrue(
			method_exists($mock, $method)
			);
	
}

	/**
	 * methodsProvider
	 */
	public final function methodsProvider()
	{
		return [
			["get"],
				
				
		];
	}
	
	/**
	 * 
	 * testInstanceOfSubjectinterface
	 */
	public function testInstanceOfSubjectInterface()
	{
		$mock = $this->getPackageModelinterface();
		$this->assertTrue(
				$mock instanceof SubjectInterface
				);
		
	}
	
	/**
	 * testInstanceOfPackageModelinterface
	 */
	public function testInstanceOfPackageModelInterface()
	{
		$mock = $this->getPackageModelinterface();
		$this->assertTrue(
				$mock instanceof PackageModelInterface
				);
		
	}
	
	/**
	 * @expectedException runtimeException
	 */
	public function testRuntimeException()
	{
		$this->getPackageModelinterface()->get();
		
		
	}
}
