<?php declare(strict_types = 1);

namespace PdTests\Success\Classes;

class UnusedPrivateElements
{

	/**
	 * @var int|string
	 */
	private $element;


	private function hello(): void
	{
		$this->element;
	}


	public function execute(): void
	{
		$this->hello();
	}

}
