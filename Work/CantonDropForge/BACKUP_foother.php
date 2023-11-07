<footer>



<div id="footer-wrapper">



    <div class="container">



        <div class="row">



            <div class="eighteen columns">



                    <div class="footer-heading">MARKETS</div>



                    <?php wp_nav_menu( array(



                            'theme_location' => 'footer-markets',



                            'menu_class' => 'footer-nav')



                    ); ?>



            </div>







            <div class="eighteen columns">







                <div class="eleven columns alpha">



                    <div class="footer-heading">CAPABILITIES</div>



                    <?php wp_nav_menu( array(



                            'theme_location' =>'footer-capabilities',



                            'menu_class' => 'footer-nav')



                    ); ?>



                </div>







                <div class="seven columns omega">



                    <div class="footer-heading">ABOUT CDF</div>



                    <?php wp_nav_menu( array(



                            'theme_location' =>'footer-about',



                            'menu_class' => 'footer-nav')



                    ); ?>



                </div>



            </div>



        </div>







    </div>







</div>







<div id="footer-bottom">



    <div class="container">



        



        <div class="five columns info">



                <div class="logo"><span>&nbsp;</span></div>



                <div class="vcard row">



                    <div class="adr">



                        <div class="street-address">4575 Southway St. SW</div>



                        <span class="locality">Canton</span>



                        ,



                        <span class="region">OH</span>







                        <span class="postal-code">44706</span>



                    </div>



                    <a href="tel:+13304774511" class="tel">(330) 477-4511</a>



                </div>



        </div>



        <div class="eight columns certs">



            <span>See Our Certifications &amp; Accreditations</span>



            <div><a href="https://cantondropforge.com/quality-systems/certifications/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/img/nadcap.jpg" alt="Nadcap Certified American Forging Company" /></a><a href="https://cantondropforge.com/quality-systems/certifications/"><img width="50" height="50" src="https://cantondropforge.com/wp-content/uploads/2017/01/as_jisq_9100_2016_en_9100_2018_certified_seal-150x150.jpg" alt="SRI Certified Forging Company"/></a></div>



        </div>



        <div class="four columns footer-bottom">



            <a href="https://www.linkedin.com/company/canton-drop-forge-inc-" class="linkedin">Follow us on LinkedIn</a>



            <div id="copy" class="row">



                <span>&copy;<?php echo Date("Y")?> Copyright CDF</span><br/>



                <span>Design by <a href="http://www.outerboxsolutions.com">Outerbox</a></span>



            </div>



        </div>



    </div>







</div>











</footer>



</body>











<?php wp_footer(); ?>



</html>