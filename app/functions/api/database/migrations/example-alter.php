<?php

try {
    $comparisons = $database::statement('SELECT dni FROM wp_examples');
} catch (Exception $e) {
    $database::statement('ALTER TABLE wp_examples
        ADD COLUMN category VARCHAR(50) NULL AFTER title
    ');
}
