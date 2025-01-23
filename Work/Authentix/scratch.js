    <script>
    var schema = document.createElement('script');
    schema.type = 'application/ld+json';

    var id = window.location.href;
    var title = document.querySelector('.entry-title').innerHTML;
    var description = document.querySelector('.entry-content').children[1].innerHTML;
    var hero = document.querySelector(".hero"); 
    var backgroundImage = window.getComputedStyle(hero).getPropertyValue('background-image');
    var backgroundImageUrl = backgroundImage.match(/url\(["']?([^"']*)["']?\)/)[1]; 

    
    
    // Create overarching Schema object
    var blogSchema = {
        "@context": "https://schema.org/",
        "@type": "BlogPosting",
        "@id": id,
        "headline": title,
        "description": description,
        "image": backgroundImageUrl,
        "author": {
            "@type": "Organization",
            "name": "Authentix",
            "url": "https://authentix.com/knowledge-center/"
        },  
        "publisher": {
            "@type": "Organization",
            "name": "Authentix",
            "logo": {
            "@type": "ImageObject",
            "url": 
            }
        },

    };
    console.log(blogSchema);
    blogSchema = JSON.stringify(blogSchema);
    // Add schema to Script
    schema.text = blogSchema;
    
    // Set head variable with browser fallback
    var head = document.head || document.getElementsByTagName("head")[0];
    
    // Add to head 
    head.appendChild(schema);
    </script>

