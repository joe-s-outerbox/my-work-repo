<?php 
function add_dynamic_category_schema() {
    if (is_category()) { 
        $category = get_queried_object(); 
        
        // Get category details
        $category_name = $category->name;
        $category_url = get_category_link($category->term_id);
        $category_description = category_description($category->term_id) ?: 'Browse our posts on ' . $category_name . '.';

        // Site-wide details
        $site_name = get_bloginfo('name');
        $site_url = get_bloginfo('url');
        $custom_logo_id = get_theme_mod('custom_logo');
        $site_logo = $custom_logo_id ? wp_get_attachment_url($custom_logo_id) : '';


        $social_links = [
            "https://x.com/authentix_inc",
            "http://www.linkedin.com/company/authentix",
            "https://www.youtube.com/authentix1"
        ];

        $services = [
            [
                "@type" => "Service",
                "serviceType" => "Authentication Solutions for " . $category_name,
                "description" => $category_description,
                "url" => $category_url
            ]
        ];

        $schema = [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => $category_name,
            "url" => $category_url,
            "logo" => $site_logo,
            "description" => "Partner with the leaders in authentication solutions at Authentix. We offer innovative anti-counterfeiting solutions to help organizations prevent fraud and detect counterfeit products in the supply chain. Our advanced brand protection solutions include online brand protection, digital, and physical security. Safeguard the integrity of your organization with authentication solutions from Authentix.",
            "contactPoint" => [
                "@type" => "ContactPoint",
                "telephone" => "(469) 737-4400",
                "contactType" => "customer service",
                "areaServed" => "US",
                "availableLanguage" => "en"
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

        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
}
add_action('wp_head', 'add_dynamic_category_schema');
