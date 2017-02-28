# CodingStandard

Soupis firemního coding standardu pro PHP programátory v nástroji [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).

## Jak začít používat na svém projektu

Každá vydaná verze obsahuje nová pravidla. Je vhodné tak začít na verzi 1.0.0 a postupně navyšovat verzi podle nalezených chyb a varování.

Do projektu je nejsnazší přidat podporu pomocí `composeru`:

```
$ composer require pd/coding-standard --dev
```

CI server spustí kontrolu, pokud `Makefile` na projektu obsahuje cíl `cs`:

```
$ cat Makefile
cs:
	- vendor/bin/phpcs app/ --standard=vendor/pd/coding-standard/src/PeckaCodingStandard/ruleset.xml --report-file=output.cs
```

Lokálně je možné spustit kontrolu přes `make cs` nebo pomocí příkazu:

```
vendor/bin/phpcs app/ --standard=vendor/pd/coding-standard/src/PeckaCodingStandard/ruleset.xml -p
```

## Výstup

Na GitHubu se po spuštění na CI serveru objeví shrnutí výsledků a pod odkazem `Details` je kompletní výstup nástroje PHP CS

![Vzorový výstup na GitHubu]
(doc/example-github.png)
