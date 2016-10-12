# fusions

## Notes:

- I avoided using any libraries that could have made the job much easier (particularly, creating an XML document)
- I tried to take an object-oriented approach (see below)
- The output XML validates against the schema
-- xmllint --schema schema.xsd output.csv
- The challenge took me 2 hours 5 minutes to complete

## Areas for improvement:

- Abstract the XML rendering away from ProductData/ProductVariationData
- Find a better way of creating the XML document
-- Note - in the past I've just rendered a template, passing it the relevant info
- Use symfony/console for the CLI
- Written unit tests
