<?php declare(strict_types = 1);

namespace PdTests\Success\Exceptions;

class DeadCatch
{

	public function hello(): void
	{
		try {
			throw new \InvalidArgumentException();
		} catch (\InvalidArgumentException $e) {
		} catch (\Exception $e) {
		}
	}

}
