<?php

function add_dynamic_organization_schema() {
    // Get site details
    $site_name = get_bloginfo('name');
    $site_url = get_bloginfo('url');
    $site_description = get_bloginfo('description');
    
    // Get logo URL
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo_url = $custom_logo_id ? wp_get_attachment_url($custom_logo_id) : '';
    
    // Contact Information
    $telephone = '(469) 737-4400'; // Replace with dynamic or hardcoded value
    $contact_type = 'customer service';
    $area_served = 'US';
    $available_language = 'en';
    
    // Address Information
    $street_address = '4355 Excel Parkway, Ste. 100';
    $address_locality = 'Addison';
    $address_region = 'TX';
    $postal_code = '75001';
    $address_country = 'US';
    
    // Social Media Links
    $social_links = [
        "https://x.com/authentix_inc",
        "http://www.linkedin.com/company/authentix",
        "https://www.youtube.com/authentix1"
    ];
    
    // Services
    $services = [
        [
            "@type" => "Service",
            "serviceType" => "Authentication Solutions for Governments",
            "description" => "Authentix enables governments to gain confidence through authentication solutions that sustain revenue growth & competitive advantage.",
            "url" => "https://authentix.com/governments/"
        ]
    ];
    
    // Build schema array
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "name" => $site_name,
        "url" => $site_url,
        "logo" => $logo_url,
        "description" => $site_description,
        "contactPoint" => [
            "@type" => "ContactPoint",
            "telephone" => $telephone,
            "contactType" => $contact_type,
            "areaServed" => $area_served,
            "availableLanguage" => $available_language
        ],
        "sameAs" => $social_links,
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => $street_address,
            "addressLocality" => $address_locality,
            "addressRegion" => $address_region,
            "postalCode" => $postal_code,
            "addressCountry" => $address_country
        ],
        "service" => $services
    ];
    
    // Output the JSON-LD schema
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}
add_action('wp_head', 'add_dynamic_organization_schema');
