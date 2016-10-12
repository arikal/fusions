<?php
/**
 * Converts the given input file to DemandwareXML.
 *
 * @author Mark Shercliff <mark@arikal.com>
 */

namespace Arikal\DemandwareXmlConverter;

class Converter
{
    /**
     * Wrapped input file object.
     *
     * @var Arikal\DemandwareXmlConverter\InputFile
     */
    protected $inputFile;

    /**
     * Constructor.
     *
     * @param Arikal\DemandwareXmlConverter\InputFile $inputFile
     */
    public function __construct(InputFile $inputFile)
    {
        $this->inputFile = $inputFile;
    }

    /**
     * Gets the output XML.
     *
     * @return string
     */
    public function toXml(): \DOMDocument
    {
        $xml = new \DOMDocument('1.0', 'UTF-8');

        $root = $xml->createElementNS('http://www.demandware.com/xml/impex/catalog/2006-10-31', 'catalog');

        $catalogId = $xml->createAttribute('catalog-id');
        $catalogId->value = 'TestCatalog';
        $root->appendChild($catalogId);

        $xml->appendChild($root);

        foreach ($this->inputFile->getProductData() as $product) {
            $root->appendChild($product->toXML($xml));

            foreach ($product->getVariations() as $variation) {
                $root->appendChild($variation->toXML($xml));
            }
        }

        return $xml;
    }
}
