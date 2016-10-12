<?php
/**
 * @TODO
 *
 * @author Mark Shercliff <mark@arikal.com>
 */

if (!isset($argv[1])) {
    throw new RuntimeException('No input file specified.');
}

$inputFile = $argv[1];
if (!file_exists($argv[1]) || !is_readable($argv[1])) {
    throw new RuntimeException('Input file could not be opened.');
}

require_once __DIR__ . '/vendor/autoloader.php';
