<?php
/**
* Plugin Name: Yoast Schema Extender 
* Plugin URI: https://journeylite.com
* Description: Add custom data to Yoast schema
* Version: 1.0
* Author: OuterBox
* Author URI: https://journeylite.com
**/
if (is_single()) {
    add_filter( ‘yoast_seo_development_mode’, ‘__return_true’ );
    add_filter( ‘wpseo_schema_person’, ‘add_to_author’ );

    function add_to_author($data) {
        $data['author'][] = array(
            "@type"=>"Person",
            "name"=>"Dr. Trace Curry",
            "description"=>"Dr. Trace Curry is the Medical Director of JourneyLite Surgery Center and JourneyLite Physicians. With locations in Ohio, Kentucky, and Indiana, he has a comprehensive obesity treatment team offering surgical weight loss, gastric balloon, and treatment with weight loss medications.",
        );
        return $data;
    }
}
