// ------------------------------------------------------------
// STOP THEME JS FROM RUNNING INSIDE THE GUTENBERG EDITOR IFRAME
// ------------------------------------------------------------
if (window !== window.parent) {
    console.log('Theme scripts disabled inside Gutenberg iframe');
} else {

    // add nav style on scroll
    document.addEventListener('DOMContentLoaded', () => {

        window.onscroll = () => {
            scrollFunction();
        };

        function scrollFunction() {
            const nav = document.querySelector('.top-nav');
            const logo = document.querySelector('.top-nav__logo');

            if (!nav || !logo) return;

            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                nav.classList.add('top-nav--bg');
                logo.classList.add('top-nav__logo--shrink');
            } else {
                nav.classList.remove('top-nav--bg');
                logo.classList.remove('top-nav__logo--shrink');
            }
        }

        // Cookie popup
        const cookieCard = document.getElementById('cookieCard');
        let cookieConsent = getCookie('user_cookie_consent');

        if (cookieCard) {
            if (cookieConsent === '' && !sessionStorage.getItem('einzweidinge')) {
                cookieCard.style.display = 'block';
            } else {
                cookieCard.style.display = 'none';
            }
        }

        // Lazy background images
        let cssList = [
            '.blog-article__image,',
            '.blog__card__img,',
            '.services__card__top,',
            '.services__card__top--kleiderschrank,',
            '.services__card__top--homeoffice,',
            '.services__card__top--umzug,',
            '.questions__overview__icon,',
            '.angebot__list__img,',
            '.angebot--kleidershrank',
            '.angebot__list__img,',
            '.angebot--homeoffice',
            '.angebot__list__img,',
            '.angebot--umzug',
            '.angebot__list__img,',
            '.angebot--umzug',
            '.angebot__list__img,',
            '.services__row--erstgespraech',
            '.services__row__visual,',
            '.services__row__visual,',
            '.services__row--design',
            '.services__row__visual,',
            '.uber-mich__list__img--book,',
            '.uber-mich__list__img.uber-mich__list__img--book,',
            '.media-gallery__images__img,',
            '.uber-mich__list__img,',
            '.uber-mich__list__img__pic'
        ];

        let lazyBackgrounds = document.querySelectorAll(cssList.join(' '));

        if (lazyBackgrounds.length > 0) {
            lazyBackgrounds.forEach((entry) => {
                entry.classList.add('remove-bg-img');
                entry.classList.add('zero-opacity');
            });

            if ('IntersectionObserver' in window) {
                let lazyBackgroundObserver = new IntersectionObserver((entries) => {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.remove('remove-bg-img');
                            entry.target.classList.add('animate-lazy-bg-img');
                            lazyBackgroundObserver.unobserve(entry.target);
                        }
                    });
                });

                lazyBackgrounds.forEach((lazyBackground) => {
                    lazyBackgroundObserver.observe(lazyBackground);
                });
            }
        }
    });

    // Show and hide the hamburger menu
    window.showHamburgerMenu = function () {
        const body = document.body;
        const overlay = document.querySelector('.ham-menu');

        if (!overlay) return;

        body.classList.add('body__no-scroll');
        overlay.style.transform = 'translateY(0)';
    };

    window.closeHamburgerMenu = function () {
        const body = document.body;
        const overlay = document.querySelector('.ham-menu');

        if (!overlay) return;

        body.classList.remove('body__no-scroll');
        overlay.style.transform = 'translateY(-100%)';
    };

    // Create cookie
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = 'expires=' + d.toUTCString();
        document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
    }

    // Delete cookie
    function deleteCookie(cname) {
        const d = new Date();
        d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
        let expires = 'expires=' + d.toUTCString();
        document.cookie = cname + '=;' + expires + ';path=/';
    }

    // Read cookie
    function getCookie(cname) {
        let name = cname + '=';
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return '';
    }

    // Set cookie consent (GLOBAL)
    window.acceptCookieConsent = function (event) {
        event.stopPropagation();
        event.preventDefault();
        deleteCookie('user_cookie_consent');
        setCookie('user_cookie_consent', 1, 30);
        window.closeCookiePopup(event);
    };

    // Close cookie popup (GLOBAL)
    window.closeCookiePopup = function (event) {
        if (event) {
            event.stopPropagation();
            event.preventDefault();
        }

        const cookieCard = document.getElementById('cookieCard');
        if (cookieCard) {
            cookieCard.style.display = 'none';
        }

        if (!sessionStorage.getItem('einzweidinge')) {
            sessionStorage.setItem('einzweidinge', 'true');
        }
    };

    // silly click nav thing
    window.goToBlogPost = function (url) {
        document.location.href = url;
    };

    wp.domReady(() => {
        if (!wp?.blocks) return;

        wp.blocks.unregisterBlockStyle('core/button', 'outline');
        wp.blocks.unregisterBlockStyle('core/button', 'fill');

        wp.blocks.registerBlockStyle('core/button', {
            name: 'primary-button',
            label: 'Primary',
            isDefault: true
        });

        wp.blocks.registerBlockStyle('core/button', {
            name: 'secondary-button',
            label: 'Secondary'
        });
    });

} // END iframe guard
