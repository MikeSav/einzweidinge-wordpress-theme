function showHamburgerMenu(){document.getElementsByTagName("body")[0].classList.add("body__no-scroll");document.querySelector(".ham-menu").style.transform="translateY(0)"}function closeHamburgerMenu(){document.getElementsByTagName("body")[0].classList.remove("body__no-scroll");document.querySelector(".ham-menu").style.transform="translateY(-100%)"}function setCookie(e,o,t){let s=new Date;s.setTime(s.getTime()+864e5*t);let i="expires="+s.toUTCString();document.cookie=e+"="+o+";"+i+";path=/"}function deleteCookie(e){let o=new Date;o.setTime(o.getTime()+864e5);let t="expires="+o.toUTCString();document.cookie=e+"=;"+t+";path=/"}function getCookie(e){let o=e+"=",t=decodeURIComponent(document.cookie).split(";");for(let s=0;s<t.length;s++){let i=t[s];for(;" "==i.charAt(0);)i=i.substring(1);if(0==i.indexOf(o))return i.substring(o.length,i.length)}return""}function acceptCookieConsent(e){e.stopPropagation(),e.preventDefault(),deleteCookie("user_cookie_consent"),setCookie("user_cookie_consent",1,30),closeCookiePopup(e)}function closeCookiePopup(e){e.stopPropagation(),e.preventDefault(),document.getElementById("cookieCard").style.display="none"}function goToBlogPost(e){document.location.href=e}document.addEventListener("DOMContentLoaded",()=>{function e(){document.body.scrollTop>100||document.documentElement.scrollTop>100?(document.querySelector(".top-nav").classList.add("top-nav--bg"),document.querySelector(".top-nav__logo").classList.add("top-nav__logo--shrink")):(document.querySelector(".top-nav").classList.remove("top-nav--bg"),document.querySelector(".top-nav__logo").classList.remove("top-nav__logo--shrink"))}window.onscroll=()=>{e()};""===getCookie("user_cookie_consent")?document.getElementById("cookieCard").style.display="block":document.getElementById("cookieCard").style.display="none";let o=[".blog-article__image,",".blog__card__img,",".services__card__top,",".services__card__top--kleiderschrank,",".services__card__top--homeoffice,",".services__card__top--umzug,",".questions__overview__icon,",".angebot__list__img,",".angebot--kleidershrank",".angebot__list__img,",".angebot--homeoffice",".angebot__list__img,",".angebot--umzug",".angebot__list__img,",".angebot--umzug",".angebot__list__img,",".services__row--erstgespraech",".services__row__visual,",".services__row__visual,",".services__row--design",".services__row__visual,",".uber-mich__list__img--book,",".uber-mich__list__img.uber-mich__list__img--book"],t=[].slice.call(document.querySelectorAll(o.join(" ")));if(t.forEach(e=>{e.classList.add("remove-bg-img"),e.classList.add("zero-opacity")}),"IntersectionObserver"in window){let s=new IntersectionObserver((e,o)=>{e.forEach(function(e){e.isIntersecting&&(e.target.classList.remove("remove-bg-img"),e.target.classList.add("animate-lazy-bg-img"),s.unobserve(e.target))})});t.forEach(e=>{s.observe(e)})}});