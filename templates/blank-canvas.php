<?php
/**
 * Template Name: Blank Canvas (No Header or Footer)
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
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
        <?php
        /*
        No wp_title() as Yeost adds one!
         <!--title>< wp_title();></title -->
        */
        ?>
        <meta property="og:image" content="https://einzweidinge.de/wp-content/uploads/2025/01/einzweidinge-jasmin-seikowsky-ordnungscoach.webp">
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
        <link
        rel="preload"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&family=Oswald:wght@200;300;400&display=swap"
        as="style"
        onload="this.onload=null;this.rel='stylesheet'">
</head>

<body <?php body_class('body'); ?>>

<main class="blank-main">
    <div class="wp-block-group">
        <?php the_content(); ?>
    </div>
</main>

<?php wp_footer(); ?>
</body>
</html>
