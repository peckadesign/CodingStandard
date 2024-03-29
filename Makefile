composer:
	composer validate
	composer update --no-interaction --prefer-dist

run-tests:
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Success/
	./vendor/bin/phpcs --standard=src/PeckaCodingStandardStrict/ruleset.xml tests/Success/
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Arrays/TrailingArrayComma.php | tests/errorNumber.sh 1
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Classes/ClassConstantVisibility.php | tests/errorNumber.sh 1
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Classes/PropertySpacing.php | tests/errorNumber.sh 2
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Classes/MethodSpacingSniff.php | tests/errorNumber.sh 2
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Classes/ClassMemberSpacing.php | tests/errorNumber.sh 1
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Classes/ClassBraces.php | tests/errorNumber.sh 2
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Files/LineEndings.php | tests/errorNumber.sh 1
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Namespaces/UnusedUses.php | tests/errorNumber.sh 1
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Formatting/SpaceAfterCast.php | tests/errorNumber.sh 2
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/WhiteSpace/DisallowSpaceIndent.php | tests/errorNumber.sh 2
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/TypeHints/ParameterTypeHintSpacing.php | tests/errorNumber.sh 2
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Formatting/SpaceAfterCast.php | tests/errorNumber.sh 2
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Exceptions/DeadCatch.php | tests/errorNumber.sh 1
	./vendor/bin/phpcs --standard=src/PeckaCodingStandard/ruleset.xml tests/Failure/Variables/UnusedVariable.php | tests/errorNumber.sh 1
