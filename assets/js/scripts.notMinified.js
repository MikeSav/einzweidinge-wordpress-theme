// add nav style on scroll
document.addEventListener('DOMContentLoaded', () => {

    window.onscroll = () => {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.querySelector('.top-nav').classList.add('top-nav--bg');
            document.querySelector('.top-nav__logo').classList.add('top-nav__logo--shrink');
        } else {
            document.querySelector('.top-nav').classList.remove('top-nav--bg');
            document.querySelector('.top-nav__logo').classList.remove('top-nav__logo--shrink');
        }
    }

    // Now the cookie stuff
    let cookieConsent = getCookie('user_cookie_consent');
    if (cookieConsent === '') {
        document.getElementById('cookieCard').style.display = 'block';
    } else {
        document.getElementById('cookieCard').style.display = 'none';
    }

    // Experiment Code To Lazy Load CSS BG Images
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
        '.uber-mich__list__img.uber-mich__list__img--book'
    ];

    let lazyBackgrounds = [].slice.call(document.querySelectorAll(cssList.join(' ')));

    // now set the background image prop to none
    lazyBackgrounds.forEach((entry) => {
        entry.classList.add('remove-bg-img');
        entry.classList.add('zero-opacity');
    });

    if ('IntersectionObserver' in window) {
        let lazyBackgroundObserver = new IntersectionObserver((entries, observer) => {
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
});

//Show and hide the hamburger menu
function showHamburgerMenu() {
    document.getElementsByTagName('body')[0].classList.add('body__no-scroll');
    let overlay = document.querySelector('.ham-menu');
    overlay.style.transform = 'translateY(0)';
}

function closeHamburgerMenu() {
    document.getElementsByTagName('body')[0].classList.remove('body__no-scroll');
    let overlay = document.querySelector('.ham-menu');
    overlay.style.transform = 'translateY(-100%)';
}

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
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return '';
}

// Set cookie consent
function acceptCookieConsent(event) {
    event.stopPropagation();
    event.preventDefault();
    deleteCookie('user_cookie_consent');
    setCookie('user_cookie_consent', 1, 30);
    closeCookiePopup(event);
}

function closeCookiePopup(event) {
    event.stopPropagation();
    event.preventDefault();
    document.getElementById('cookieCard').style.display = 'none';
}

// silly click nav thing
function goToBlogPost(url) {
    document.location.href = url;
}
