<?php declare(strict_types = 1);

namespace PdTests\Failure\Classes;

class UnusedPrivateElements
{

	/**
	 * @var int|string
	 */
	private $element;


	private function hello(): void
	{

	}

}
