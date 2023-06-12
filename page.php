<?php get_header();?>
<?php
  if (have_posts()) {
    the_post();
    get_template_part( 'template-parts/content/content-page' );
  }
?>
<?php get_footer();?>
