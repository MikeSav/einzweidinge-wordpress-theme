<!-- footer -->
<div class="footer">
    <div class="footer__wrapper">
        <div class="footer__row">
            <div>
                <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/logos/ein-zwei-dinge.svg"
                class="footer__logo"
                alt="einzweidinge logo">
            </div>
            <div class="footer__certificates">
				<a href="https://ordnungswelt.com/Ordnungsexperten/jasmin-seikowsky" target="_blank">
                    <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/certificates/banner_expertin-ordnungswelt_web.webp"
                    alt="ordnungswelt Zertifikat"
                    class="footer__certificate">
                </a>
            </div>
        </div>
        <div class="footer__row">
            <div class="footer__links">
             <?php wp_nav_menu(array(
                'menu' => 'footerMenu',
                'menu_class' => 'footer__list',
                'container' => 'ul',
                'container_class'=> 'footer__list',
                'add_a_class' => 'text-link')); ?>
                <div class="footer__social">
                    <ul>
                        <li>
                            <a href="https://www.instagram.com/ein2dinge/" target="_blank">
                                <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/instagram.svg" alt="einzweidinge instagram">
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/message/OPZNGPFZWTVQN1" target="_blank">
                                <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/whatsapp.svg" alt="einzweidinge whatsapp">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/jasmin-seikowsky-einzweidinge-80710613b/" target="_blank">
                                <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/linkedin.svg" alt="einzweidinge LinkedIn">
                             </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/ein2Dinge" target="_blank">
                                <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/twitter.svg" alt="einzweidinge twitter">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <address>Prenzlauer Berg, 10439 Berlin</address>
            <div class="footer__copy">
                &copy; <?php echo date("Y"); ?>
            </div>
        </div>
    </div>
</div>

<!-- cookie -->
<div class="cookie" id="cookieCard">
    <div class="cookie__card">
        <div class="cookie__card__col cookie__card__col--text">
            <h3 class="cookie__card__header">🍪 Hello, would you like a cookie?</h3>
            Ich verwende Cookies auf meiner Website, um zu sehen, wie du mit ihr interagierst. Indem du dies akzeptierst,
            stimmst du deren Verwendung zu.  <a href="https://einzweidinge.de/datenschutz/" class="text-link text-link--primary" target="_blank">Mehr dazu hier</a>
        </div>
        <div class="cookie__card__col cookie__card__col--controls">
            <a href="#" onclick="acceptCookieConsent(event);" class="button-link button-link--ja">Ja Bitte</a>
            <a href="#" onclick="closeCookiePopup(event)" class="button-link button-link--nein">Nein Danke</a>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>

