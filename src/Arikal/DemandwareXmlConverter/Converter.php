<?php
/**
 * @TODO
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
    public function toXml(): string
    {
        foreach ($this->inputFile->getProductData() as $product) {
        }
    }
}
