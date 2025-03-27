<?php //do not copy

add_filter( 'wpseo_json_ld_output', 'disable_yoast_schema_on_category_pages', 10, 1 );

function disable_yoast_schema_on_category_pages( $data ) {
    if ( is_product_category() ) {
        return false; // This disables Yoast's schema output completely
    }
    return $data;
}
function inject_product_schema() {
    ?>
    <script>
    window.addEventListener("load", function() {
    const injectSchema = (products) => {
        const categoryName = document.querySelector(".cat-top-content h1")?.textContent.trim();
        if (!categoryName) {
            console.log("Category name not found.");
            return;
        }

        const currentYear = new Date().getFullYear();
        const priceValidUntil = `${currentYear}-12-31`;

        const schemaData = {
            "@context": "https://schema.org",
            "@type": "CollectionPage",
            "name": categoryName,
            "description": "Buy performance air intakes at Dusterhoff Racing. We have performance cold air intakes manufactured with high-grade components backed by 30-day returns. Order performance air intake systems today and get free shipping on most parts.",
            "url": window.location.href,
            "mainEntity": {
                "@type": "ItemList",
                "numberOfItems": products.length,
                "itemListElement": []
            }
        };

        products.forEach(product => {
            const name = product.querySelector(".qec-results__generic-product-title")?.textContent.trim();
            const image = product.querySelector("img")?.src;
            const priceElement = product.querySelector(".woocommerce-Price-amount bdi");
            const price = priceElement ? priceElement.textContent.replace(/[^0-9.]/g, "") : null;
            const currencySymbol = product.querySelector(".woocommerce-Price-currencySymbol")?.textContent.trim();
            const currency = currencySymbol === "$" ? "USD" : "UNKNOWN";
            const url = product.querySelector("a.qec-results__generic-product-product-link")?.href;

            if (name && price && url) {
                schemaData.mainEntity.itemListElement.push({
                    "@type": "Product",
                    "name": name,
                    "image": image,
                    "description": name,
                    "offers": {
                        "@type": "Offer",
                        "priceCurrency": currency,
                        "price": price,
                        "priceValidUntil": priceValidUntil,
                        "itemCondition": "https://schema.org/NewCondition",
                        "availability": "https://schema.org/InStock"
                    }
                });
            }
        });

        const scriptTag = document.createElement("script");
        scriptTag.type = "application/ld+json";
        scriptTag.textContent = JSON.stringify(schemaData, null, 2);
        document.head.appendChild(scriptTag);

        console.log("✅ SEO: Schema Injected Successfully!");
    };

    const intervalCheck = setInterval(() => {
        const productContainer = document.querySelector(".qec-results__container");
        if (productContainer) {
            const products = productContainer.querySelectorAll(".qec-results__product");
            if (products.length > 0) {
                clearInterval(intervalCheck);
                console.log("✅ SEO: Product container and products found!");
                injectSchema(products);
            } else {
                console.log("⏳ SEO: Waiting for products to load...");
            }
        } else {
            console.log("⏳ SEO: Waiting for product container...");
        }
    }, 500); // Check every 500ms
});

    </script>
    <?php
}
add_action('wp_head', 'inject_product_schema');