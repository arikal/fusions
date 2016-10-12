<?php
/**
 * Represents a row of product data from the input CSV file.
 *
 * @author Mark Shercliff <mark@arikal.com>
 */

namespace Arikal\DemandwareXmlConverter;

class ProductData
{
    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $brand;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * Collection of product variations.
     *
     * @var Arikal\DemandwareXmlConverter\ProductVariationData[]
     */
    protected $variations = [];

    /**
     * Sets the product ID.
     *
     * @param string $productId
     *
     * @return $this
     */
    public function setProductId(string $productId)
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * Gets the product ID.
     *
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * Sets the brand.
     *
     * @param string $brand
     *
     * @return $this
     */
    public function setBrand(string $brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Gets the brand.
     *
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * Sets the display name.
     *
     * @param string $displayName
     *
     * @return $this
     */
    public function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * Gets the display name.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * Sets the variations.
     *
     * @param Arikal\DemandwareXmlConverter\ProductVariationData[] $variations
     *
     * @return $this
     */
    public function setVariations(array $variations)
    {
        $this->variations = [];
        foreach ($variations as $variation) {
            $this->addVariation($variation);
        }
        return $this;
    }

    /**
     * Gets the variations.
     *
     * @return Arikal\DemandwareXmlConverter\ProductVariationData[]
     */
    public function getVariations(): array
    {
        return $this->variations;
    }

    /**
     * Adds a variation.
     *
     * @param Arikal\DemandwareXmlConverter\ProductVariationData
     *
     * @return $this
     */
    public function addVariation(ProductVariationData $variation)
    {
        $this->variations[] = $variation;
        return $this;
    }

    /**
     * Converts the product data to a XML.
     *
     * @param DOMDocument $xml
     *
     * @return DOMNode
     */
    public function toXml(\DOMDocument $xml): \DOMNode
    {
        $root = $xml->createElement('product');

        $productId = $xml->createAttribute('product-id');
        $productId->value = $this->getProductId();
        $root->appendChild($productId);

        $displayName = $xml->createElement('display-name', $this->getDisplayName());
        $lang = $xml->createAttribute('xml:lang');
        $lang->value = 'x-default';
        $displayName->appendChild($lang);
        $root->appendChild($displayName);

        $brand = $xml->createElement('brand', $this->getBrand());
        $root->appendChild($brand);

        $variations = $xml->createElement('variations');
        $root->appendChild($variations);

        $variants = $xml->createElement('variants');
        $variations->appendChild($variants);

        foreach ($this->getVariations() as $_variation) {
            $variation = $xml->createElement('variant');
            $productId = $xml->createAttribute('product-id');
            $productId->value = $_variation->getProductId();
            $variation->appendChild($productId);

            if ($_variation->getDefault()) {
                $default = $xml->createAttribute('default');
                $default->value = 'true';
                $variation->appendChild($default);
            }

            $variants->appendChild($variation);
        }

        return $root;
    }
}
