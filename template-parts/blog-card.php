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
