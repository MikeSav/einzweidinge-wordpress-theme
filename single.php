<?php get_header();?>
<?php
  if (have_posts()) {
    the_post();
    // last publish
    // the_date();
    // the_tags();
    the_content();
  }
?>
<?php get_footer();?>
