<?php
/**
 * Represents an input CSV file.
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
        $fp = fopen($this->inputFile, 'r');

        $productData = [];
        while (false !== ($row = fgetcsv($fp, 0, ','))) {
            if (!array_key_exists($row[0], $productData)) {
                $product = new ProductData();
                $product
                    ->setProductId($row[0])
                    ->setBrand($row[1])
                    ->setDisplayName($row[2]);

                $productData[$product->getProductId()] = $product;
            }

            $variation = new ProductVariationData();
            $variation
                ->setProductId($row[3])
                ->setDefault('Y' === $row[6]);

            $variation->addAttribute('colour', $row[4]);
            $variation->addAttribute('size', $row[5]);

            $product->addVariation($variation);
        }
        fclose($fp);

        return array_values($productData);
    }
}
