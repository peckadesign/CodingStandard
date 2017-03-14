# Integrace CodeSnifferu do PhpStormu

1. PhpStorm - Preferences - Language & Framewroks - PHP - Code Sniffer
2. Trojtečka pro výběr interpreteru

![Nastavení CodeSniffer] (phpstorm/code-sniffer-configuration.png)

3. Přidat nový interpreter

![PHP interpreter] (phpstorm/code-sniffer-interpreter.png)

4. Nastavit cestu pro binární soubor CodeSnifferu `vendor/bin/phpcs`

![CodeSniffer file] (phpstorm/code-sniffer-path.png)

5. Vše uložit
6. V nastavení přejít do Editor - Inspections
7. V sekci PHP zaškrtnout PHP Code Sniffer validation
8. Severity zvolit Error
9. Coding standard vybrat Custom
10. Zvolit trojtečkou vpravo cestu k pravidlům `vendor/pd/coding-standard/src/PeckaCodingStandard/ruleset.xml`. 

![CodeSniffer inspections] (phpstorm/code-sniffer-inspections-select.png)

