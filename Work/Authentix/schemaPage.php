function add_dynamic_page_schema() {
    if (is_page()) { 
        global $post;

        
        $page_title = get_the_title($post->ID);
        $page_url = get_permalink($post->ID);
        $page_description = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true) ?: wp_trim_words(strip_tags($post->post_content), 30);

        
        $site_name = get_bloginfo('name');
        $site_url = get_bloginfo('url');
        $custom_logo_id = get_theme_mod('custom_logo');
        $site_logo = $custom_logo_id ? wp_get_attachment_url($custom_logo_id) : '';

        
        $telephone = '(469) 737-4400'; 
        $contact_type = 'customer service';
        $area_served = 'US';
        $available_language = 'en';

        // Social Media Links
        $social_links = [
            "https://x.com/authentix_inc",
            "http://www.linkedin.com/company/authentix",
            "https://www.youtube.com/authentix1"
        ];

        // Example services (customize or fetch dynamically if needed)
        $services = [
            [
                "@type" => "Service",
                "serviceType" => "Authentication Solutions for " . $page_title,
                "description" => $page_description,
                "url" => $page_url
            ]
        ];

        // Build the schema array
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => $site_name,
            "url" => $site_url,
            "logo" => $site_logo,
            "description" => $page_description,
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
                "streetAddress" => "4355 Excel Parkway, Ste. 100",
                "addressLocality" => "Addison",
                "addressRegion" => "TX",
                "postalCode" => "75001",
                "addressCountry" => "US"
            ],
            "service" => $services
        ];

        // Output the schema as JSON-LD
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
}
add_action('wp_head', 'add_dynamic_page_schema');
