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
            <br><br>
            Wenn du eigene Vorschläge für Themen hast, die dich interessieren, dann <a href="https://einzweidinge.de/kontakt/">schreib mir gern über das Kontaktformular</a>.
            <br><br>
            Viel Spass beim Lesen!
        </div>

        <?php
            // Custom query with pagination
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            $args = [
                'post_type'      => 'post',
                'posts_per_page' => 10,
                'paged'          => $paged
            ];

            $query = new WP_Query($args);
        ?>

        <div class="blog__row blog__row--wrap">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="blog__card blog__card--wrap">
                        <div class="blog__card__details">
                            <div class="blog__card__details__header"><?php the_title(); ?></div>
                            <div class="blog__card__details__teaser"><?php the_excerpt(); ?></div>
                            <div class="blog__card__details__date"><?php the_date('d/m/Y'); ?></div>
                            <div class="blog__card__details__control">
                                <a href="<?php the_permalink(); ?>" class="button-link">weiter lesen</a>
                            </div>
                        </div>
                        <div class="blog__card__img" onClick="goToBlogPost('<?php the_permalink(); ?>')">
                            <img src="<?php the_post_thumbnail_url(); ?>"
                                 loading="lazy"
                                 alt="<?php the_title(); ?>"
                                 class="blog__card__img__pic" />
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <!-- Infinite scroll sentinel -->
        <div id="infinite-scroll-anchor"
             data-max-pages="<?php echo $query->max_num_pages; ?>">
        </div>

        <?php wp_reset_postdata(); ?>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    let currentPage = <?php echo $paged; ?>;
    const maxPages = parseInt(document.getElementById('infinite-scroll-anchor').dataset.maxPages);
    const container = document.querySelector('.blog__row--wrap');
    const anchor = document.getElementById('infinite-scroll-anchor');

    let loading = false;
    const pageCache = new Map();

    const loadNextPage = () => {
        if (loading || currentPage >= maxPages) return;
        loading = true;

        const nextPage = currentPage + 1;

        if (pageCache.has(nextPage)) {
            appendPosts(pageCache.get(nextPage));
            currentPage++;
            loading = false;
            return;
        }

        fetch(`<?php echo home_url(); ?>/blog/page/${nextPage}/`)
            .then(res => res.text())
            .then(html => {
                pageCache.set(nextPage, html);
                appendPosts(html);
                currentPage++;
            })
            .finally(() => loading = false)
            .catch(err => console.error(err));
    };

    const appendPosts = (html) => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, "text/html");
        const newPosts = doc.querySelectorAll('.blog__card');

        newPosts.forEach(post => container.appendChild(post));
    };

    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            loadNextPage();
        }
    }, {
        rootMargin: "300px 0px",
        threshold: 0
    });

    observer.observe(anchor);
});
</script>

<?php get_footer(); ?>
