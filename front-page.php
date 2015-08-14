<?php get_header(); ?>
<?php 
    global $_site;
    $settings = $_site->settings;
 ?>

<div id="index">
	<?php get_template_part('inc/partials/home','carousel'); ?>
	<?php dynamic_sidebar( 'home' ); ?>
</div>
<?php get_footer(); ?>