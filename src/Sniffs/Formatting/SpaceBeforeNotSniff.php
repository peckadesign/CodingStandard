<?php declare(strict_types = 1);

namespace PdCodingStandard\Sniffs\Formatting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Util\Tokens;

use const T_BOOLEAN_NOT;
use const T_WHITESPACE;

class SpaceBeforeNotSniff implements Sniff
{
	/**
	 * A list of tokenizers this sniff supports.
	 *
	 * @var array<string>
	 */
	public array $supportedTokenizers = [
		'PHP',
		'JS',
	];

	/**
	 * The number of spaces desired after the NOT operator.
	 *
	 */
	public int $spacing = 1;

	/**
	 * Allow newlines instead of spaces.
	 *
	 */
	public bool $ignoreNewlines = true;


	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register()
	{
		return [T_BOOLEAN_NOT];
	}


	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being scanned.
	 * @param int $stackPtr The position of the current token in the stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process(File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();
		$this->spacing = (int) $this->spacing;

		$nextNonEmpty = $phpcsFile->findPrevious(Tokens::$emptyTokens, ($stackPtr - 1), null, true);
		if ($nextNonEmpty === false) {
			return;
		}

		if (
			$this->ignoreNewlines === true
			&& $tokens[$stackPtr]['line'] !== $tokens[$nextNonEmpty]['line']
		) {
			return;
		}

		if ($this->spacing === 0 && $nextNonEmpty === ($stackPtr + 1)) {
			return;
		}

		$previousNonWhitespace = $phpcsFile->findPrevious(T_WHITESPACE, ($stackPtr - 1), null, true);
		if ($nextNonEmpty !== $previousNonWhitespace) {
			$error = 'Expected %s space(s) before NOT operator';
			$data = [$this->spacing];
			$phpcsFile->addError($error, $stackPtr, 'CommentFound', $data);

			return;
		}

		$found = 0;
		if ($tokens[$stackPtr]['line'] !== $tokens[$nextNonEmpty]['line']) {
			$found = 'newline';
		} elseif ($tokens[($stackPtr - 1)]['code'] === T_WHITESPACE) {
			$found = $tokens[($stackPtr - 1)]['length'];
		}

		if ($found === $this->spacing) {
			return;
		}

		$error = 'Expected %s space(s) before NOT operator; %s found';
		$data = [
			$this->spacing,
			$found,
		];

		$fix = $phpcsFile->addFixableError($error, $stackPtr, 'Incorrect', $data);
		if ($fix === true) {
			$padding = str_repeat(' ', $this->spacing);
			if ($found === 0) {
				$phpcsFile->fixer->addContentBefore($stackPtr, $padding);
			} else {
				$phpcsFile->fixer->beginChangeset();
				$start = ($stackPtr - 1);

				if ($this->spacing > 0) {
					$phpcsFile->fixer->replaceToken($start, $padding);
					--$start;
				}

				for ($i = $start; $i < $previousNonWhitespace; $i++) {
					$phpcsFile->fixer->replaceToken($i, '');
				}

				$phpcsFile->fixer->endChangeset();
			}
		}
	}
}
