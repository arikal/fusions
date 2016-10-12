<?php
/**
 * @TODO
 *
 * Example usage:
 *
 * php converter.php product-data.csv
 *
 * @author Mark Shercliff <mark@arikal.com>
 */

if (!isset($argv[1])) {
    throw new RuntimeException('No input file specified.');
}

$inputFile = $argv[1];

require_once __DIR__ . '/vendor/autoload.php';

$inputFile = new Arikal\DemandwareXmlConverter\InputFile($inputFile);
$converter = new Arikal\DemandwareXmlConverter\Converter($inputFile);

$xml = $converter->toXml()->saveXML();
echo $xml;
