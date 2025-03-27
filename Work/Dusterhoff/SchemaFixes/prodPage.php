<?php

function replace_valid_through_and_remove_zero($data) {
    // Ensure this only runs on product pages
    if (!is_product()) {
        return $data; // Exit if not on a product page
    }

    // Check and modify offers schema
    if (isset($data['offers']) && is_array($data['offers'])) {
        $currentYear = date('Y');
        $priceValidUntil = "{$currentYear}-12-31";

        foreach ($data['offers'] as &$offer) {
            // Replace validThrough with priceValidUntil
            if (isset($offer['priceSpecification'])) {
                // Remove '0' key from priceSpecification
                if (isset($offer['priceSpecification'][0])) {
                    unset($offer['priceSpecification'][0]);
                }

                // Replace validThrough with priceValidUntil in priceSpecification
                if (isset($offer['priceSpecification']['validThrough'])) {
                    $offer['priceSpecification']['priceValidUntil'] = $priceValidUntil;
                    unset($offer['priceSpecification']['validThrough']);
                }
            }
        }
    }

    return $data;
}

// Apply the filter to Yoast schema for product pages
add_filter('wpseo_schema_product', 'replace_valid_through_and_remove_zero', 10, 1);