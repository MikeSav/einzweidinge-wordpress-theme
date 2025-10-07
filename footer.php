<!-- footer -->
<div class="footer">
    <div class="footer__wrapper">
        <div class="footer__row">
            <div>
                <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/logos/ein-zwei-dinge.svg"
                class="footer__logo"
                alt="einzweidinge logo"
                loading="lazy">
            </div>
            <div class="footer__certificates">
            <!-- jj -->
            <a href="https://jjtrainings.de/finde-einen-aufraeumcoach-in-deiner-naehe/" target="_blank">
                <img src="https://einzweidinge.de/wp-content/uploads/2023/11/jj-training-zertifikat.webp"
                alt="JJ Trainings Zertifikat"
                class="footer__certificate--jj"
                loading="lazy">
            </a>
            <!-- Ordnungswelt -->
				<a href="https://ordnungswelt.com/Ordnungsexperten/jasmin-seikowsky" target="_blank">
                    <img src="https://einzweidinge.de/wp-content/uploads/2025/01/ordnungscoach_expertin_ordnungswelt_web-1.webp"
                    alt="Ordnungswelt Zertifikat"
                    class="footer__certificate--ow"
                    loading="lazy">
                </a>
				<!-- https://betidy.io/ -->
				<a href="https://betidy.io/"  target="_blank">
				 	<img src="https://einzweidinge.de/wp-content/uploads/2023/12/betidy_logo_quer_rosa.png"
                   	 	alt="betidy.io"
                    	class="footer__certificate"
                    	loading="lazy">
				</a>
            </div>
        </div>
        <div class="footer__row">
            <div class="footer__links">
               <div>
                <?php wp_nav_menu(array(
                               'menu' => 'footerMenu',
                               'menu_class' => 'footer__list',
                               'container' => 'menu',
                               'container_class'=> 'footer__list',
                               'add_a_class' => 'text-link')); ?>
               </div>

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
                            <a href="https://bsky.app/profile/ein2dinge.bsky.social" target="_blank">
                                <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/bluesky.svg" alt="einzweidinge bluesky">
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <address>Prenzlauer Berg, 10439 Berlin</address>

                </div>
            </div>
        </div>
		<div class="footer__row">
			<div class="footer__copy">
                &copy; Jasmin Seikowsky - Aufräumcoach & Ordnungscoach - <?php echo date("Y"); ?>
            </div>
            <div id="wcb" class="carbonbadge wcb-d"></div>
            <script src="https://unpkg.com/website-carbon-badges@1.1.3/b.min.js" defer></script>
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