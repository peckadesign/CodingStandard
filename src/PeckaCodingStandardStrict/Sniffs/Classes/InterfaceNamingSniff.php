<?php declare(strict_types = 1);

namespace PeckaDesignCodingStandard\Sniffs\Classes;

class PeckaCodingStandardStrict_Sniffs_Classes_InterfaceNamingSniff implements \PHP_CodeSniffer\Sniffs\Sniff
{

	/**
	 * @return (int|string)[]
	 */
	public function register(): array
	{
		return [
			T_INTERFACE,
		];
	}
	/**
	 * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
	 * @param \PHP_CodeSniffer\Files\File $phpcsFile
	 * @param int $interfacePointer
	 */
	public function process(\PHP_CodeSniffer\Files\File $phpcsFile, $interfacePointer): void
	{
		$interfaceName = \SlevomatCodingStandard\Helpers\ClassHelper::getName($phpcsFile, $interfacePointer);
		$this->checkSuffix($phpcsFile, $interfacePointer, $interfaceName);
	}


	private function checkSuffix(\PHP_CodeSniffer\Files\File $phpcsFile, int $interfacePointer, string $interfaceName): void
	{
		$suffix = substr($interfaceName, -9);
		if ($suffix === 'Interface') {
			return;
		}

		$phpcsFile->addError('Name of interface not ending with Interface suffix', $interfacePointer, 'InterfaceSuffix');
	}
}
