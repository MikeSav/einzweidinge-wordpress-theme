<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9HCSY6F9GQ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-9HCSY6F9GQ');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NNKMXWB');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="p:domain_verify" content="e18aa334f3e705cd9138d87f1767436e">
    <meta name="twitter:image" value="https://einzweidinge.de/wp-content/uploads/2023/05/einzweiding-website-shot.webp" />
    <?php wp_head(); ?>
    <title><?php wp_title(); ?></title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri() ?>/assets/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
</head>
<body class="body">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NNKMXWB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- menu -->
<div class="ham-menu">
    <div class="ham-menu__close">
        <i class="icon-fa-circle-xmark" onclick="closeHamburgerMenu()"></i>
    </div>
    <div class="ham-menu__items">
    <?php wp_nav_menu(array(
       'menu' => 'TopNavMenu',
       'menu_class' => 'ham-menu__items__list',
       'container' => 'ul',
       'container_class'=> 'ham-menu__items__list',
       'add_a_class' => 'ham-menu__link')); ?>

        <!-- we need social icon -->
        <div>
            <ul class="ham-menu__items__social-list">
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
</div>
<!-- navigation -->
<div class="top-nav">
    <div class="top-nav__wrapper">
        <div>
            <a href="https://einzweidinge.de">
                <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/logos/ein-zwei-dinge.svg" class="top-nav__logo" alt="einzweidinge logo">
            </a>
        </div>
        <div class="top-nav__wrapper__links">
            <i class="icon-bars" onclick="showHamburgerMenu()"></i>
            <!-- social -->
            <ul class="top-nav__wrapper__links__list">
                <li>
                    <a href="https://www.instagram.com/ein2dinge/" target="_blank" title="einzweidinge instagram">
                        <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/instagram.svg" alt="einzweidinge instagram">
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/message/OPZNGPFZWTVQN1" target="_blank" title="einzweidinge whatsapp">
                        <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/whatsapp.svg" alt="einzweidinge whatsapp">
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/jasmin-seikowsky-einzweidinge-80710613b/" target="_blank" title="einzweidinge linkedin">
                        <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/linkedin.svg" alt="einzweidinge linkedin">
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/ein2Dinge" target="_blank" title="einzweidinge twitter">
                        <img src="<?php echo get_template_directory_uri()?>/assets/css/css-images/social-icons/twitter.svg" alt="einzweidinge twitter">
                    </a>
                </li>
            </ul>
            <!-- links and the like -->
               <?php wp_nav_menu(array(
                       'menu' => 'TopNavMenu',
                       'menu_class' => 'top-nav__wrapper__links__list',
                       'container' => 'ul',
                       'container_class'=> 'top-nav__wrapper__links__list',
                       'add_a_class' => 'text-link')); ?>
        </div>
    </div>
</div>
