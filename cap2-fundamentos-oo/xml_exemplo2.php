<?php
// interpreta o documento XML
$xml = simplexml_load_file('xml/paises.xml');

// imprime os atributos do objeto criado
echo 'Nome : '     . $xml->nome      . "<br>\n";
echo 'Idioma : '   . $xml->idioma    . "<br>\n";
echo 'Religiao : ' . $xml->religiao . "<br>\n";
echo 'Moeda : '    . $xml->moeda     . "<br>\n";
echo 'Popula��o : '. $xml->populacao . "<br>\n";
?>