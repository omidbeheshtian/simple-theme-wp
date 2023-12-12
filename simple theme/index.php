<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <article class="post">
            <h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>
            <?php the_content(); ?>
        </article>
<?php
    endwhile;
else :
    echo esc_html__('Nothing found!', 'your-text-domain');
    // Remember to replace 'your-text-domain'
endif;

get_footer();
?>

