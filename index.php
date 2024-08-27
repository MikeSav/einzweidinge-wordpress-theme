<?php get_header(); ?>
<style>
.page-intro {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: 50vh;
  justify-content: end;
  align-items: center;
  box-sizing: border-box;
  background-size: cover;
  background-image: url('https://einzweidinge.de/wp-content/themes/einzweidinge/assets/css/css-images/blog/einzweidinge-header-default-1024x682.webp');
}

.page-intro .intro__strap {
  animation: imgFade .5s ease-in-out .9s 1 forwards;
  color: #fff !important;
  font-family: var(--handwriting) !important;
  font-size: var(--h1-font-size);
  font-weight: 700 !important;
  letter-spacing: .05rem;
  margin: 0 1rem;
  opacity: 0;
  text-align: center;
  text-transform: none !important;
  margin-bottom: 1rem;
  text-shadow: 2px 2px 2px rgba(0,0,0,0.3);
}
</style>
<div class="page-intro">
    <div>
        <h1 class="intro__strap">ein, zwei Blogartikel...</h1>
    </div>
</div>
<div class="blog">
      <div class="blog__wrapper">
          <div class="blog__header">
              <h2 class="blog__header__heading">Ordnungscoach Blog Artikel</h2>
          </div>
          <div class="blog__row--intro">
            In regelmäßigen Abständen findest du hier neue Blog Artikel zu Themen wie Ausmisten, Ordnung und Struktur zu Hause schaffen, Ordnungshelfer, Interior Design und mehr.
            Setze dir ein Lesezeichen für diese Seite, um keinen neuen Artikel zu verpassen.
            <br><br>
            Wenn du eigene Vorschläge für Themen hast, die dich interessieren, dann <a href="https://einzweidinge.de/kontakt/">schreib mir gern über das Kontaktformular</a>.
            <br><br>
            Viel Spass beim Lesen!
          </div>
          <div class="blog__row blog__row--wrap">
            <?php
              if (have_posts()) {
                  while(have_posts()) {
              ?>
                <div class="blog__card blog__card--wrap">
                    <?php the_post(); ?>
                    <div class="blog__card__details">
                        <div class="blog__card__details__header"><?php the_title(); ?></div>
                        <div class="blog__card__details__teaser">
                           <?php the_excerpt(); ?>
                        </div>
                        <div class="blog__card__details__date"><?php the_date('d/m/Y'); ?></div>
                        <div class="blog__card__details__control">
                            <a href="<?php the_permalink();?>" class="button-link">weiter lesen</a>
                        </div>
                    </div>
                    <div class="blog__card__img" style="background-image: url('<?php the_post_thumbnail_url(); ?>')" onClick="goToBlogPost('<?php the_permalink();?>')">
                    </div>
                </div>
            <?php
                  }
              }
            ?>
          </div>
    </div>
</div>
<?php get_footer(); ?>
