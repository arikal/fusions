<?php
/**
 * @TODO
 *
 * @author Mark Shercliff <mark@arikal.com>
 */

namespace Arikal\DemandwareXmlConverter;

class InputFile
{
    /**
     * Path to the input file.
     *
     * @var string
     */
    protected $inputFile;

    /**
     * Constructor.
     *
     * @throws RuntimeException if the input file can not be opened.
     *
     * @param string $inputFile Path to the input file.
     */
    public function __construct(string $inputFile)
    {
        if (!file_exists($inputFile) || !is_readable($inputFile)) {
            throw new \RuntimeException('Input file could not be opened.');
        }
        $this->inputFile = $inputFile;
    }

    /**
     * Gets the product data from the input file.
     *
     * @return Arikal\DemandwareXmlConverter\ProductData[]
     */
    public function getProductData()
    {
    }
}
