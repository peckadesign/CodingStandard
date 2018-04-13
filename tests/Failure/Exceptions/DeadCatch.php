<?php declare(strict_types = 1);

namespace PdTests\Failure\Exceptions;

class DeadCatch
{

	public function hello(): void
	{
		try {
			throw new \InvalidArgumentException();
		} catch (\Throwable $e) {
		} catch (\InvalidArgumentException $e) {
		}
	}

}
