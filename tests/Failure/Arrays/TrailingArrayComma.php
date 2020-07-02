<?php declare(strict_types = 1);

namespace PdTests\Failure\Arrays;

class TrailingArrayComma
{

	public function one(): void
	{
		$array = [
			'one',
			'two'
		];

		\var_dump($array);
	}

}
