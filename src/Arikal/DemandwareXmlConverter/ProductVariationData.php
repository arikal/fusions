<?php
/**
 * Represents a product variation, derived from an input CSV file row.
 *
 * @author Mark Shercliff <mark@arikal.com>
 */

namespace Arikal\DemandwareXmlConverter;

class ProductVariationData
{
    /**
     * @var string
     */
    protected $productId;

    /**
     * Collection of attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     " @var bool
     */
    protected $default;

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
     * Sets the attributes.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets the attributes.
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Adds an attribute.
     *
     * @param string $name
     * @param string $value
     *
     * @return $this
     */
    public function addAttribute(string $name, string $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * Sets the default flag.
     *
     * @param string $default
     *
     * @return $this
     */
    public function setDefault(bool $default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * Gets the default flag.
     *
     * @return string
     */
    public function getDefault(): bool
    {
        return $this->default;
    }

    /**
     * Converts the product variation to XML.
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

        $attributes = $xml->createElement('custom-attributes');
        $root->appendChild($attributes);

        foreach ($this->getAttributes() as $name => $value) {
            $attribute = $xml->createElement('custom-attribute', $value);
            $attributeId = $xml->createAttribute('attribute-id');
            $attributeId->value = $name;
            $attribute->appendChild($attributeId);
            $attributes->appendChild($attribute);
        }

        return $root;
    }
}
