/* add nav style on scroll */
document.addEventListener('DOMContentLoaded', function () {
  let observer = new IntersectionObserver(function (entries) {
    if (!entries[0].isIntersecting) {
      document.querySelector('.top-nav').classList.add('top-nav--bg');
      document.querySelector('.top-nav__logo').classList.add('top-nav__logo--shrink');
    } else {
      document.querySelector('.top-nav').classList.remove('top-nav--bg');
      document.querySelector('.top-nav__logo').classList.remove('top-nav__logo--shrink');
    }
  }, { threshold: [0.01] });
  observer.observe(document.querySelector('.intro') || document.querySelector('.page-intro') || document.querySelector('.four-oh-four'));

  /* Now the cookie stuff */
  let cookieConsent = getCookie('user_cookie_consent');
  if (cookieConsent === '') {
    document.getElementById('cookieCard').style.display = 'block';
  } else {
    document.getElementById('cookieCard').style.display = 'none';
  }

});

/**
 * Show and hide the hamburger menu
 */
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

