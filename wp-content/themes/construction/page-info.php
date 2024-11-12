<?php wp_head(); ?>

    <?php get_header(); ?>

        <?php the_title('<h1 class="info-h1">', '</h1>'); ?>

        <?php echo do_shortcode('[contact-form-7 id="547bfa5" title="Contact form 1"]'); ?>

    <?php get_footer(); ?>
    
<?php wp_footer(); ?>