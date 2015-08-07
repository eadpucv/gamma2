<?php get_header(); ?>
<?php 
    global $_site;
    $settings = $_site->settings;
 ?>

<div id="index">
	<?php get_template_part('inc/partials/home','carousel'); ?>
	<?php get_template_part('inc/partials/home','docencia'); ?>
	<?php get_template_part('inc/partials/home','eventos'); ?>
	<?php get_template_part('inc/partials/home','noticias'); ?>
	<?php get_template_part('inc/partials/home','enlaces'); ?>
	<?php get_template_part('inc/partials/home','publicaciones'); ?>
</div>
<?php get_footer(); ?>