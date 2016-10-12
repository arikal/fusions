<?php
/**
 * @TODO
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
     * @var string
     */
    protected $colour;

    /**
     * @var string
     */
    protected $size;

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
     * Sets the colour.
     *
     * @param string $colour
     *
     * @return $this
     */
    public function setColour(string $colour)
    {
        $this->colour = $colour;
        return $this;
    }

    /**
     * Gets the colour.
     *
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * Sets the size.
     *
     * @param string $size
     *
     * @return $this
     */
    public function setSize(string $size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * Gets the size.
     *
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
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
}
