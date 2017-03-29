<?php


class PeckaCodingStandardStrict_Sniffs_Files_OneClassInterfaceTraitPerFileSniff implements PHP_CodeSniffer_Sniff
{

	public function register()
	{
		return [T_CLASS, T_INTERFACE, T_TRAIT];
	}


	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$nextInterface = $phpcsFile->findNext($this->register(), ($stackPtr + 1));
		if ($nextInterface !== FALSE) {
			$error = 'Only one class, interface or trait is allowed in a file';
			$phpcsFile->addError($error, $nextInterface, 'MultipleFound');
		}
	}

}
