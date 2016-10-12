<?php
/**
 * @TODO
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
}
