document.addEventListener("DOMContentLoaded", function() {
    const url = new URL(window.location.href);
    const variantParam = url.searchParams.get("variant");
    const prodVariants = document.getElementById('product-variants');
    if(prodVariants.querySelector('.selector-wrapper')) {
        console.log('got it');
    }
});
    // Check if variant exists in URL but has only one variant
    // if (variantParam && prodVariants.) {
    //   url.searchParams.delete("variant");
    //   window.history.replaceState({}, document.title, url.toString());
    // }
    document.addEventListener("DOMContentLoaded", function() {
        const url = new URL(window.location.href);
        const variantParam = url.searchParams.get("variant");
        const prodVariants = document.getElementById('product-variants');
        const selectorWrapper = prodVariants.querySelector('.selector-wrapper')
        console.log('ProdVariants is loading');
        console.log(selectorWrapper);
        if(selectorWrapper.style.display === 'none') {
          console.log('got it');
      }
  
      });
  