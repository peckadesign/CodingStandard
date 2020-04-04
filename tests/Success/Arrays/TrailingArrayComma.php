<?php declare(strict_types = 1);

namespace PdTests\Success\Arrays;

class TrailingArrayComma
{

	public function one(): void
	{
		$array = ['hello', 'hello'];
		$array = [
			'one',
			'two',
		];
	}

}
